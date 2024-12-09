<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $role
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * 表名映射
     */
    public static function tableName()
    {
        return 'user'; // 映射到数据库中的 user 表
    }

    /**
     * 根据 ID 查找用户
     *
     * @param integer $id 用户 ID
     * @return User|null 返回 User 对象或 null
     */
    public static function findIdentity($id)
    {
        return static::findOne($id); // 通过 ID 查找用户
    }

    /**
     * 根据 access token 查找用户身份
     *
     * @param string $token Access Token
     * @param mixed $type 类型
     * @return User|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // 如果没有使用 token，可以返回 null
        return null;
    }

    /**
     * 获取用户 ID
     *
     * @return int 用户 ID
     */
    public function getId()
    {
        return $this->id; // 返回用户 ID
    }


    /**
     * 获取 auth_key
     *
     * @return string auth_key
     */
    public function getAuthKey()
    {
        return $this->auth_key; // 返回用户的 auth_key
    }

    public function getRole()
    {

        return $this->role; // 返回用户的 auth_key

    }

    /**
     * 验证 auth_key
     *
     * @param string $authKey
     * @return bool 是否验证通过
     */


    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey; // 比对存储的 auth_key 和传入的是否一致
    }

    /**
     * 在用户创建时生成 auth_key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString(); // 使用 Yii 安全组件生成随机字符串
    }

    /**
     * 生成密码哈希并保存密码
     *
     * @param string $password 明文密码
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password); // 使用 Yii 安全组件生成密码哈希
    }

    /**
     * 校验密码是否正确
     *
     * @param string $password 明文密码
     * @return bool 密码是否正确
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash); // 校验密码哈希是否匹配
    }

    /**
     * 定义验证规则
     *
     * @return array 验证规则
     */

    public static function findByUsername($UserName)
    {
        $user = static::findOne(['username' => $UserName]);
        if ($user)
            return $user; // 从数据库查询用户
        else
            return null;
    }


    public static function findByEmail($Email)
    {
        $user = static::findOne(['email' => $Email]);
        if ($user)
            return $user; // 从数据库查询用户
        else
            return null;
    }
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'auth_key', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role' => 'Role'
        ];
    }

    /**
     * 事件：在保存之前生成 auth_key 和密码哈希
     */
    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->generateAuthKey(); // 为新用户生成 auth_key
            $this->created_at = time(); // 设置创建时间
        }

        $this->updated_at = time(); // 设置更新时间
        return parent::beforeSave($insert);
    }
}

