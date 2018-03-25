<?php

namespace app\models;

use Yii;

class Certificates extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'certificates';
    }

    public function rules()
    {
        return [
            [['cert_code', 'regis_code', 'print_status'], 'required'],
            [['regis_code', 'print_status'], 'integer'],
            [['cert_code'], 'string', 'max' => 10],
            [['cert_code'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cert_code' => 'Cert Code',
            'regis_code' => 'Regis Code',
            'print_status' => 'Status',
        ];
    }
}
