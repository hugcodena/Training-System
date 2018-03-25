<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;

$uploadUrl = '@web/uploads';

$this->params['breadcrumbs'][] = ['label' => 'หลักสูตรอบรม', 'url' => ['index','type'=>'add']];
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
<div class="courses-form">

    <?php $form = ActiveForm::begin([
		'action' => Url::toRoute('courses/create')
	]); ?>
		
	<div class="col-md-4">
		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	</div>

		<div class="col-md-2">
		<?= $form->field($model, 'initial_id')->dropdownList($initial,
										[
											'id'=>'ddl-initial',
											'prompt'=>'กรุณาเลือก'
											]); ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'speaker_name')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
		</div>
	

   	<div class="col-md-12">
   		<?= $form->field($model, 'img_path[]')->widget(FileInput::classname(),
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
   	</div>
	<div class="col-md-12">
	<?= $form->field($model, 'detail')->widget(TinyMce::className(), [
                'options' => ['rows' => 7],
                'language' => 'th',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
                ]
            ]);?>
	</div>
	<div class="col-md-12">
		<?= $form->field($model, 'course_outline')->widget(TinyMce::className(), [
                'options' => ['rows' => 13],
                'language' => 'th',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
                ]
            ]);?>
	</div>
	<div class="col-md-2">
		<?= $form->field($model, 'date_open')->widget(DatePicker::classname(), [
			'options' => ['placeholder' => ''],
			'removeButton' => false,
			'type' => DatePicker::TYPE_COMPONENT_APPEND,
			'pluginOptions' => [
				'autoclose'=>true,
                'format' => 'yyyy/mm/dd',
                'todayHighlight' => true
			]
		]); ?>
	</div>
	<div class="col-md-2">
		<?= $form->field($model, 'date_end')->widget(DatePicker::classname(), [
			'options' => ['placeholder' => ''],
			'removeButton' => false,
			'type' => DatePicker::TYPE_COMPONENT_APPEND,
			'pluginOptions' => [
				'autoclose'=>true,
				'format' => 'yyyy/mm/dd',
				'todayHighlight' => true
			]
		]); ?>
	</div>
	<div class="col-md-2">
		<?= $form->field($model, 'seat_num')->textInput(); ?>
	</div>
	<div class="col-md-2">
		<?= $form->field($model, 'cost')->textInput(['maxlength' => true]); ?>
	</div>

	<div class="col-md-4">
		<?= $form->field($model, 'place')->textInput(['maxlength' => true]); ?>
	</div>
	
	<div class="col-md-12">
		<?= $form->field($model, 'comment')->textarea(['rows' => 6]); ?>
	</div>
	<?= $form->field($model, 'code')->hiddenInput(['maxlength' => true])->label(false); ?>
	<div class="col-md-12">
		<div class="form-group" style="text-align:center">
			<?= Html::submitButton($model->isNewRecord ? ' บันทึก' : ' บันทึก', ['class' => $model->isNewRecord ? 'btn bg-olive btn-flat glyphicon glyphicon-floppy-disk' : 'btn bg-maroon btn-flat glyphicon glyphicon-floppy-disk']) ?>
			<?= Html::resetButton(' ล้างข้อมูล', ['class' => 'btn btn-flat bg-orange glyphicon glyphicon-refresh']) ?>
 		</div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>