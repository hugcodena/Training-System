<?php

namespace app\models;

use Yii;

class Organization extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'organization';
    }

    public function rules()
    {
        return [
            [['org_name', 'address', 'tel'], 'required'],
            [['org_name'], 'string', 'max' => 80],
            [['address'], 'string', 'max' => 130],
            [['tel'], 'string', 'max' => 20]
        ];
    }

    public function attributeLabels()
    {
        return [
            'org_code' => 'รหัสองค์กร',
            'org_name' => 'ชื่อองค์กร',
            'address' => 'ที่ตั้ง',
            'tel' => 'เบอร์โทรศัพท์',
            'img_logo' => 'โลโก้องค์กร',
        ];
    }
}
