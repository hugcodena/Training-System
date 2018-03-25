<?php

namespace app\models;

use Yii;

class Courses extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return 'courses';
    }

    public function rules()
    {
        return [
            [['name', 'initial_id', 'speaker_name', 'lastname', 'detail', 'course_outline', 
                'date_open', 'date_end', 'place', 'seat_num', 'cost'], 'required'],
            [['detail', 'course_outline', 'comment'], 'string'],
            [['date_open', 'date_end'], 'safe'],
            [['seat_num'], 'integer'],
            [['cost'], 'number'],
            [['name', 'place'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => 'รหัสหลักสูตร',
            'name' => 'ชื่อหลักสูตร',
            'initial_id'=> 'คำนำหน้าชื่อ',
            'speaker_name' => 'ชื่อวิทยากร ',
            'lastname' => 'นามสกุลวิทยากร ',
            'img_path' => 'รูปภาพ',
            'detail' => 'เกี่ยวกับหลักสูตร',
            'course_outline' => 'เนื้อหาที่อบรม',
            'date_open' => 'วันที่เปิด',
            'date_end' => 'วันที่สิ้นสุด',
            'place' => 'สถานที่',
            'seat_num' => 'จำนวนที่รับ',
            'cost' => 'ราคา',
            'file' => 'เอกสารแนบ',
            'comment' => 'หมายเหตุ',
        ];
    }
}
