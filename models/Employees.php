<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $name
 * @property string $tickname
 * @property string $pic_src
 * @property string $fron_src
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $email
 * @property string|null $bio
 * @property string|null $project1_name
 * @property string|null $project1_github_link
 * @property string|null $project2_name
 * @property string|null $project2_github_link
 * @property string|null $project3_name
 * @property string|null $project3_github_link
 * @property string|null $project4_name
 * @property string|null $project4_github_link
 * @property string $created_at
 * @property string $updated_at
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tickname', 'pic_src', 'fron_src'], 'required'],
            [['bio'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'project1_name', 'project2_name', 'project3_name', 'project4_name'], 'string', 'max' => 100],
            [['tickname', 'pic_src', 'fron_src'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['address', 'project1_github_link', 'project2_github_link', 'project3_github_link', 'project4_github_link'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'tickname' => 'Tickname',
            'pic_src' => 'Pic Src',
            'fron_src' => 'Fron Src',
            'phone' => 'Phone',
            'address' => 'Address',
            'email' => 'Email',
            'bio' => 'Bio',
            'project1_name' => 'Project1 Name',
            'project1_github_link' => 'Project1 Github Link',
            'project2_name' => 'Project2 Name',
            'project2_github_link' => 'Project2 Github Link',
            'project3_name' => 'Project3 Name',
            'project3_github_link' => 'Project3 Github Link',
            'project4_name' => 'Project4 Name',
            'project4_github_link' => 'Project4 Github Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
