<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลหน่วยงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><strong><? echo $title; ?></strong></h3>
        <div class="pull-right">
            <div class="btn-group">
            
             </div>
        </div>
    </div>
    <div class="box-body">
<div class="organization-form">
    <?php $form = ActiveForm::begin([
            'action' => Url::toRoute('organization/create'),
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-1',
                    'wrapper' => 'col-sm-9',
                    'error' => '',
                    'hint' => '',
                ],
            ],
    ]); ?>

    <?= $form->field($model, 'org_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

   
    <?= $form->field($model, 'img_logo[]')->widget(FileInput::classname(),
			['options'=>['multiple'=>true],
				'pluginOptions' => [
					'uploadUrl' => Url::to(['/site/file-upload']),
					'uploadExtraData' => [
						'album_id' => 20,
						'cat_id' => 'Nature'
						],
					'maxFileCount' => 1
				]
			]);	?>
     <?= $form->field($model, 'org_code')->hiddenInput(['maxlength' => true])->label(false) ?>

    <div class="col-md-12">
		<div style="text-align:center">
                <?= Html::submitButton($model->isNewRecord ? ' บันทึก' : ' บันทึก', ['class' => $model->isNewRecord ? 'btn bg-olive btn-flat glyphicon glyphicon-floppy-disk' : 'btn bg-maroon btn-flat glyphicon glyphicon-floppy-disk']) ?>
			    <?= Html::resetButton(' ล้างข้อมูล', ['class' => 'btn btn-flat bg-orange glyphicon glyphicon-refresh']) ?>
 		</div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
