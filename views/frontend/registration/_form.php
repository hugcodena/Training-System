<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'ลงทะเบียนอบรม'];
$this->params['breadcrumbs'][] = $title;
?>
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><strong> ลงทะเบียนอบรม : หลักสูตร <? echo $course_name->name; ?></strong></h3>
        <div class="pull-right">
            <div class="btn-group">
            
             </div>
        </div>
    </div>
    <div class="box-body">
<div class="col-md-6">
<?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'offset' => 'col-sm-offset-1',
                'wrapper' => 'col-sm-9',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>
    <div class="col-md-12">
        <?= $form->field($model, 'initial_id')->dropdownList($initial,
									[
										'id'=>'ddl-initial',
										'prompt'=>'เลือกคำนำหน้าชื่อ'
										]); ?>
    </div>
    <div class="col-md-12">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
		<div style="text-align:center">
                <?= Html::submitButton($model->isNewRecord ? ' บันทึก' : ' บันทึก', ['class' => $model->isNewRecord ? 'btn bg-olive btn-flat glyphicon glyphicon-floppy-disk' : 'btn bg-maroon btn-flat glyphicon glyphicon-floppy-disk']) ?>
			    <?= Html::resetButton(' ล้างข้อมูล', ['class' => 'btn btn-flat bg-orange glyphicon glyphicon-refresh']) ?>
 		</div>
	</div>
    <?php ActiveForm::end(); ?>
    
</div>
</div>
<br><br><br><br>
</div>
