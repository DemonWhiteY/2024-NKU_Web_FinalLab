<?php
// views/site/d3demo2.php

// 引入必要的库
$this->registerJsFile('https://d3js.org/d3.v7.min.js');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/d3-cloud/1.2.5/d3.layout.cloud.min.js');
?>

<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="assets/img/photos/bg2.webp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 m-auto">
                    <div class="page-title-content text-center">
                        <h2 class="title">注册</h2>
                        <div class="bread-crumbs"><a href="index.html"> 主页</a><span class="breadcrumb-sep"> //
                            </span><span class="active">注册</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay3"></div>
    </section>
    <!--== End Page Title Area ==-->

<div class="container">
    <div class="input-area">
        <div class="feedback-selection">
            <select id="feedback-select">
                <option value="">选择单个留言...</option>
                <?php foreach ($feedbacks as $feedback): ?>
                <option value="<?= $feedback['id'] ?>"><?= htmlspecialchars($feedback['author_name']) ?>的留言</option>
                <?php endforeach; ?>
            </select>
            <button id="generate-from-all">使用所有留言生成</button>
        </div>
        <div class="custom-input">
            <textarea id="text-input" rows="5" placeholder="或者在这里输入自定义文本..."></textarea>
            <button id="generate-custom">生成自定义词云</button>
        </div>
    </div>
    <div id="word-cloud"></div>
</div>

<style>
.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
}

.input-area {
    margin-bottom: 20px;
}

.feedback-selection {
    margin-bottom: 15px;
    display: flex;
    gap: 10px;
}

#feedback-select {
    flex: 1;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.custom-input {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

#text-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

button {
    padding: 8px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

#word-cloud {
    width: 800px;
    height: 400px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 4px;
}
</style>

<?php
// 将 PHP 数据转换为 JavaScript 变量
$feedbacksJson = json_encode($feedbacks);

$js = <<<JS
// 配置参数
const width = 800;
const height = 400;
const fontFamily = "sans-serif";
const fontScale = 15;

// 停用词列表
const stopwords = new Set("i,me,my,myself,we,us,our,ours,ourselves,you,your,yours,yourself,yourselves,he,him,his,himself,she,her,hers,herself,it,its,itself,they,them,their,theirs,themselves,what,which,who,whom,whose,this,that,these,those,am,is,are,was,were,be,been,being,have,has,had,having,do,does,did,doing,will,would,should,can,could,ought,i'm,you're,he's,she's,it's,we're,they're,i've,you've,we've,they've,i'd,you'd,he'd,she'd,we'd,they'd,i'll,you'll,he'll,she'll,we'll,they'll,isn't,aren't,wasn't,weren't,hasn't,haven't,hadn't,doesn't,don't,didn't,won't,wouldn't,shan't,shouldn't,can't,cannot,couldn't,mustn't,let's,that's,who's,what's,here's,there's,when's,where's,why's,how's,a,an,the,and,but,if,or,because,as,until,while,of,at,by,for,with,about,against,between,into,through,during,before,after,above,below,to,from,up,upon,down,in,out,on,off,over,under,again,further,then,once,here,there,when,where,why,how,all,any,both,each,few,more,most,other,some,such,no,nor,not,only,own,same,so,than,too,very,say,says,said,shall".split(","));

// 从 PHP 传递的数据
const feedbacks = {$feedbacksJson};

// 创建词云函数
function createWordCloud(text) {
    // 清空现有的词云
    d3.select("#word-cloud").selectAll("*").remove();
    
    // 文本处理
    const words = text.split(/[\s.]+/g)
        .map(w => w.replace(/^["'"\-—()$$\]{}]+/g, ""))
        .map(w => w.replace(/[;:.!?()\[\${},"''"\-—]+$/g, ""))
        .map(w => w.toLowerCase())
        .filter(w => w && !stopwords.has(w));

    // 统计词频
    const wordFreq = d3.rollups(words, v => v.length, w => w)
        .sort(([, a], [, b]) => d3.descending(a, b))
        .slice(0, 250)
        .map(([text, size]) => ({text, size}));

    // 创建SVG
    const svg = d3.select("#word-cloud")
        .append("svg")
        .attr("width", width)
        .attr("height", height)
        .attr("font-family", fontFamily)
        .attr("text-anchor", "middle");

    // 创建词云布局
    const layout = d3.layout.cloud()
        .size([width, height])
        .words(wordFreq)
        .padding(5)
        .rotate(() => (~~(Math.random() * 6) - 3) * 30)
        .font(fontFamily)
        .fontSize(d => Math.sqrt(d.size) * fontScale)
        .on("end", draw);

    // 绘制词云
    function draw(words) {
        const g = svg.append("g")
            .attr("transform", `translate(\${width/2},\${height/2})`);

        g.selectAll("text")
            .data(words)
            .join("text")
            .style("font-size", d => `\${d.size}px`)
            .style("fill", () => d3.schemeCategory10[Math.floor(Math.random() * 10)])
            .attr("transform", d => `translate(\${d.x},\${d.y}) rotate(\${d.rotate})`)
            .text(d => d.text)
            .on("mouseover", function() {
                d3.select(this)
                    .style("opacity", 0.7)
                    .style("cursor", "pointer");
            })
            .on("mouseout", function() {
                d3.select(this)
                    .style("opacity", 1);
            });
    }

    // 开始生成词云
    layout.start();
}

// 选择单个留言时生成词云
document.getElementById("feedback-select").addEventListener("change", function() {
    const selectedId = this.value;
    if (!selectedId) return;

    // 从已有数据中找到对应的留言
    const selectedFeedback = feedbacks.find(f => f.id == selectedId);
    if (selectedFeedback) {
        createWordCloud(selectedFeedback.content);
    }
});

// 使用所有留言生成词云
document.getElementById("generate-from-all").addEventListener("click", function() {
    const allText = feedbacks.map(f => f.content).join(" ");
    createWordCloud(allText);
});

// 使用自定义文本生成词云
document.getElementById("generate-custom").addEventListener("click", function() {
    const text = document.getElementById("text-input").value;
    if (text.trim() === "") {
        alert("请输入文本！");
        return;
    }
    createWordCloud(text);
});

// 初始化时显示提示信息
createWordCloud("请选择留言或输入文本来生成词云");
JS;

$this->registerJs($js);
?>