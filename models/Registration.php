<?php

namespace app\models;

use Yii;

class Registration extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'registration';
    }

    public function rules()
    {
        return [
            [['initial_id', 'name', 'lastname', 'email', 'tel'], 'required'],
            [['name', 'lastname'], 'string', 'max' => 50],
            ['email', 'email'],
            [['tel'], 'string', 'max' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
            'regis_code' => 'รหัสการลงทะเบียน',
            'initial_id' => 'คำนำหน้าชื่อ',
            'name' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'email' => 'อีเมล์',
            'tel' => 'เบอร์โทรศัพท์',
        ];
    }

    public function getInitialName() {
		return $this->hasOne(Initial::className(),
			['initial_id'=>'initial_id']);
	}
}
