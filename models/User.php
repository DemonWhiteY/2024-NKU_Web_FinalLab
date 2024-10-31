<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $UserID
 * @property int $UserName
 * @property string $Password
 * @property int $UserPhone
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UserID', 'UserName', 'Password', 'UserPhone'], 'required'],
            [['UserID', 'UserName', 'UserPhone'], 'integer'],
            [['Password'], 'string', 'max' => 20],
            [['UserPhone'], 'unique'],
            [['UserID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UserID' => 'User ID',
            'UserName' => 'User Name',
            'Password' => 'Password',
            'UserPhone' => 'User Phone',
        ];
    }

    public static function findIdentity($UserID)
    {
        return isset(self::$users[$UserID]) ? new static(self::$users[$UserID]) : null;
    }

    /**
     * {@inheritdoc}
     */


    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($UserName)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['UserName'], $UserName) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->UserID;
    }






    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->Password === $password;
    }
}
