<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "initial".
 *
 * @property int $initial_id
 * @property string $initial_name
 */
class Initial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'initial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['initial_name'], 'required'],
            [['initial_name'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'initial_id' => 'Initial ID',
            'initial_name' => 'Initial Name',
        ];
    }
}
