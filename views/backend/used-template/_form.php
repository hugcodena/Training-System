<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
?>
<script  src="<?php echo Yii::$app->request->baseUrl.'/js/ajax_data.js'; ?>"></script>
<div class="used-template-form">
    <?php $form = ActiveForm::begin([
         'layout' => 'horizontal',
         'id' => 'f_cert',
         'method'=> 'post',
    ],
    ['options' => [
        'enctype' => 'multipart/form-data']
    ]); ?>
    <?= $form->field($model, 'template_id')->dropdownList(Yii::$app->utilityComponent->getCertTemplate(),
									[   'id'=>'ddl-template',
									    'prompt'=>'เลือกรูปแบบเทมเพลต'
									]); ?>
    <?= $form->field($model, 'org_name')->TextInput() ?>
    <?= $form->field($model, 'authurize_name')->TextInput() ?>
    <?= $form->field($model, 'position_name')->TextInput() ?>
    <?= $form->field($model, 'template_selected_id')->hiddenInput()->label(false) ?>
    <div class="form-group">
        <div style="text-align:center">
            <?= Html::Button(' บันทึก', [ 'class' => 'btn bg-olive btn-flat glyphicon glyphicon-floppy-disk',
                    'onclick' =>'saveCertTemplate()',
                    'id' => '' ]); ?>
 			<?= Html::resetButton(' ล้างข้อมูล', ['class' => 'btn btn-flat bg-orange glyphicon glyphicon-refresh']) ?>
         </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
