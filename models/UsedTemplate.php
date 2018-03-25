<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

class UsedTemplate extends \yii\db\ActiveRecord
{
    public $logo_path;
    public static function tableName()
    {
        return 'used_template';
    }

    public function rules()
    {
        return [
            [['template_id','org_name','authurize_name','position_name'], 'required'],
            [['template_id'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'template_selected_id' => 'รหัสเทมเพลต',
            'template_id' => 'เทมเพลต',
            'org_name' => 'ชื่อหน่วยงาน',
            'authurize_name' => 'ชื่อผู้มีอำนาจเซ็น',
            'position_name' => 'ตำแหน่ง'
        ];
    }

}
