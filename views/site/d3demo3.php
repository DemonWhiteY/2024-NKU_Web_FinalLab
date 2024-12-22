<?php
// views/site/moonphase.php

$this->registerJsFile('https://d3js.org/d3.v6.min.js');
$this->registerJsFile('https://unpkg.com/suncalc@1/suncalc.js');
?>

<div class="moon-phase-container">
    <div class="controls">
        <div class="control-group">
            <label for="year-select">选择年份：</label>
            <select id="year-select">
                <?php 
                $currentYear = date('Y');
                for($y = $currentYear - 10; $y <= $currentYear + 10; $y++): 
                ?>
                <option value="<?= $y ?>" <?= $y == $currentYear ? 'selected' : '' ?>><?= $y ?>年</option>
                <?php endfor; ?>
            </select>
        </div>
        
        <div class="control-group">
            <label for="location-select">选择位置：</label>
            <select id="location-select">
                <option value="39.0851,117.1993">天津</option>
                <option value="39.9042,116.4074">北京</option>
                <option value="31.2304,121.4737">上海</option>
                <option value="22.5431,114.0579">深圳</option>
                <option value="30.5728,104.0668">成都</option>
            </select>
            <div class="custom-location">
                <input type="number" id="latitude" placeholder="纬度" step="0.0001" min="-90" max="90">
                <input type="number" id="longitude" placeholder="经度" step="0.0001" min="-180" max="180">
                <button id="apply-location">应用自定义位置</button>
            </div>
        </div>
    </div>
    
    <div id="moon-chart"></div>
</div>

<style>
.moon-phase-container {
    max-width: 975px;
    margin: 20px auto;
    padding: 20px;
}

.controls {
    margin-bottom: 20px;
    display: flex;
    gap: 20px;
    align-items: start;
}

.control-group {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.control-group label {
    font-weight: bold;
}

select, input {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.custom-location {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

button {
    padding: 8px 16px;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background: #45a049;
}

#moon-chart {
    width: 975px;
    height: 480px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 4px;
}
</style>

<?php
$js = <<<'JS'
// 当前选择的年份和位置
let selectedYear = new Date().getFullYear();
let selectedLocation = {
    lat: 39.0851,
    lng: 117.1993
};

// 创建月相图的函数
function createMoonPhase(year, location) {
    // 清除现有图表
    d3.select("#moon-chart").selectAll("*").remove();
    
    const width = 975;
    const height = 480;
    const margin = {top: 0, right: 0, bottom: 0, left: 60};

    // 创建投影
    const projection = d3.geoOrthographic()
        .translate([0, 0])
        .scale(10);

    // 创建路径生成器
    const path = d3.geoPath(projection);

    // 创建半球
    const hemisphere = d3.geoCircle()();

    // 创建日期比例尺
    const dayScale = (() => {
        const scale = d3.scalePoint()
      .domain(d3.range(1, 40))
      .range([margin.left, width - margin.right])
      .padding(1);
  return d => {
    const start = d3.timeMonth(d);
    const offset = start.getDay() || 7;
    return scale(d.getDate() + offset);
  };
    })();

    // 创建月份比例尺
    const monthScale = (() => {
        const scale = d3.scalePoint()
      .domain(d3.range(12))
      .range([margin.top, height - margin.bottom])
      .padding(1);
  return d => scale(d.getMonth());
    })();

    // 生成日期数据
    const days = (() => {
        const now = new Date(year, 0, 1);
        const start = d3.timeYear(now);
        return d3.timeDays(start, d3.timeYear.offset(start, 1));
    })();

    // 生成月份数据
    const months = (() => {
        const now = new Date(year, 0, 1);
        const start = d3.timeYear(now);
        return d3.timeMonths(start, d3.timeYear.offset(start, 1));
    })();

    // 创建SVG
    const svg = d3.select("#moon-chart")
        .append("svg")
        .attr("width", width)
        .attr("height", height)
        .attr("viewBox", [0, 0, width, height]);

    // 添加月份标签
    svg.append("g")
        .attr("font-family", "sans-serif")
        .attr("font-size", 10)
        .selectAll("text")
        .data(months)
        .join("text")
        .attr("x", margin.left - 5)
        .attr("y", d => monthScale(d))
        .attr("dy", "0.32em")
        .attr("text-anchor", "end")
        .text(d => d.toLocaleString("zh-CN", {month: "long"}));

    // 为每一天创建月相
    svg.append("g")
        .selectAll("g")
        .data(days)
        .join("g")
        .attr("transform", d => "translate(" + dayScale(d) + "," + monthScale(d) + ")")
        .each(function(date) {
            const g = d3.select(this);
            
            // 计算月相和位置
            const moonIllum = SunCalc.getMoonIllumination(date);
            const moonPos = SunCalc.getMoonPosition(date, location.lat, location.lng);
            
            // 绘制月球基础圆形
            g.append("circle")
                .attr("r", 10)
                .attr("fill", "#000");
            
            // 根据月相绘制照明部分
            if (moonIllum.phase !== 0 && moonIllum.phase !== 1) {
                const rotation = moonIllum.phase <= 0.5 ? -90 : 90;
                const s = moonIllum.phase <= 0.5 ? 1 : 0;
                const phi = Math.PI * 2 * (moonIllum.phase <= 0.5 ? moonIllum.phase : 1 - moonIllum.phase);
                const x = 10 * Math.sin(phi);
                
                g.append("path")
                    .attr("d", "M0,-10 A10,10 0 0," + s + " 0,10 A" + x + ",10 0 0," + (1-s) + " 0,-10")
                    .attr("fill", "#fff")
                    .attr("transform", "rotate(" + rotation + ")");
            } else if (moonIllum.phase === 1) {
                g.append("circle")
                    .attr("r", 10)
                    .attr("fill", "#fff");
            }
            
            // 如果月球在地平线以下，添加灰色遮罩
            if (moonPos.altitude < 0) {
                g.append("circle")
                    .attr("r", 10)
                    .attr("fill", "#ccc")
                    .attr("opacity", 0.5);
            }
        });

    // 添加当前日期指示器
    if (year === new Date().getFullYear()) {
        const today = new Date();
        svg.append("circle")
            .attr("cx", dayScale(today))
            .attr("cy", monthScale(today))
            .attr("r", 12)
            .attr("fill", "none")
            .attr("stroke", "red")
            .attr("stroke-width", 2);
    }
}

// 初始化事件监听器
document.getElementById('year-select').addEventListener('change', function() {
    selectedYear = parseInt(this.value);
    createMoonPhase(selectedYear, selectedLocation);
});

document.getElementById('location-select').addEventListener('change', function() {
    const [lat, lng] = this.value.split(',').map(Number);
    selectedLocation = { lat, lng };
    createMoonPhase(selectedYear, selectedLocation);
});

document.getElementById('apply-location').addEventListener('click', function() {
    const lat = parseFloat(document.getElementById('latitude').value);
    const lng = parseFloat(document.getElementById('longitude').value);
    
    if (isNaN(lat) || isNaN(lng) || lat < -90 || lat > 90 || lng < -180 || lng > 180) {
        alert('请输入有效的经纬度值！');
        return;
    }
    
    selectedLocation = { lat, lng };
    createMoonPhase(selectedYear, selectedLocation);
});

// 初始化月相图
createMoonPhase(selectedYear, selectedLocation);
JS;

$this->registerJs($js);
?>