<?php

namespace app\models;
use Yii;
use yii\base\InvalidArgumentException;

class EmailForm extends \yii\base\Model
{
    public $email;
    public $code;

    public $rememberMe = true;

    public $_user = false;

    public function rules()
    {
        return [
            // username and password are both required
            [['email'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            ['code', 'validateCode'],
            ['email', 'validateEmail']

        ];
    }

    // 发送验证码到指定的邮箱
    public function sendVerificationCode()
    {
        $this->code = Yii::$app->security->generateRandomString(6);  // 生成6位验证码

        // 将验证码保存到缓存或数据库
        Yii::$app->cache->set($this->email . '_verification_code', $this->code, 300); // 5分钟有效

        // 发送邮件
        return Yii::$app->mailer->compose()
            ->setFrom('demonwhitey@163.com')
            ->setTo($this->email)
            ->setSubject('Your Verification Code')
            ->setTextBody('Your verification code is: ' . $this->code)
            ->send();


    }
    public function validateEmail($attribute, $params)
    {
        // 1. 验证邮箱格式是否有效
        if (!filter_var($this->$attribute, FILTER_VALIDATE_EMAIL)) {
            $this->addError($attribute, '无效的邮箱地址');
            return;
        }

        // 2. 检查邮箱是否已存在于数据库中
        $exists = User::find()->where([$attribute => $this->$attribute])->exists();
        if (!$exists) {
            $this->addError($attribute, '邮箱不存在');
        }
    }
    // 验证用户输入的验证码
    public function validateCode($attribute, $params)
    {
        $user = $this->getUser();
        $cachedCode = Yii::$app->cache->get($this->email . '_verification_code');
        if (empty($attribute)) {
            $this->addError($attribute, 'enter the code.');
        } else if ($cachedCode && trim($cachedCode) != trim($this->code)) {
            $this->addError($attribute, 'worng code');
        }
    }
    public function login()
    {
        if ($this->validate()) {


            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
