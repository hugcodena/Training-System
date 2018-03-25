<?php

namespace app\models;

use Yii;

class Users extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'username', 'password', 'user_type'], 'required'],
            [['user_type'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อ',
            'username' => 'ชื่อผู้ใช้งาน',
            'password' => 'รหัสผ่าน',
            'email' => 'อีเมล์',
            'user_type' => 'ประเภทผู้ใช้งาน',
            'images' => 'รูปภาพ'
        ];
    }
}
