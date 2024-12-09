<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;

    public $email;
    public $confirmPassword;

    public $VerificationCode;
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'confirmPassword', 'email', 'VerificationCode'], 'required'],
            // password is validated by validatePassword()
            ['username', 'string', 'min' => 4, 'max' => 20, 'tooShort' => '用户名应输入6-20个字符或数字', 'tooLong' => '用户名应输入6-20个字符或数字'],
            ['password', 'string', 'min' => 8, 'max' => 30, 'tooShort' => '密码应输入6-20个字符或数字', 'tooLong' => '密码应输入6-20个字符或数字'],
            ['email', 'validateEmail'],
            ['username', 'validateUsername'],
            ['password', 'validatePassword'],
            ['confirmPassword', 'Verification'],
            ['VerificationCode', 'validateCode']
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($user == true) {
                $this->addError($attribute, '用户名已存在');
            }
        }
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
        if ($exists) {
            $this->addError($attribute, '邮箱已经被使用');
        }
    }


    public function validateUsername($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($user == true) {
                $this->addError($attribute, '用户名已存在');
            }
        }
    }

    public function validateCode($attribute, $params)
    {
        $cachedCode = Yii::$app->cache->get($this->email . '_verification_code');
        if (empty($attribute)) {
            $this->addError($attribute, 'enter the code.');
        } else if ($cachedCode && trim($cachedCode) != trim($this->VerificationCode)) {
            $this->addError($attribute, 'worng code');
        }
    }

    public function Verification($attribute, $params)
    {
        if ($this->password != $this->confirmPassword) {
            $this->addError($attribute, '密码输入不一致');
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function Register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->setPassword($this->password);
            $user->email = $this->email;
            $user->role = 1;
            $user->save();
            if (!$user->save()) {
                $user->refresh();
                var_dump($user->getErrors());
                exit;
            }

            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {

        $this->_user = User::findByUsername($this->username);
        return $this->_user;
    }
}
