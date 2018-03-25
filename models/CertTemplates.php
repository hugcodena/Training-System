<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cert_templates".
 *
 * @property int $template_id
 * @property string $name
 * @property int $status
 */
class CertTemplates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cert_templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'template_id' => 'Template ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
}
