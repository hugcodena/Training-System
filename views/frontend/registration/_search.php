<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="row">
    <?php $form = ActiveForm::begin([
        'action' => ['index','id'=>$id, 'type'=>"search"],
        'method' => 'get',
    ]); ?>
<div class="col-md-5">
    <?=$form->field($model, 'name',[
				'template' => '<div class="input-group">{input}<span class="input-group-btn">' .
                    Html::submitButton('<i class="glyphicon glyphicon-search"> ค้นหา</i>', 
                                ['class' => 'btn btn-flat bg-maroon']) .
                        '</span>
                            </div>'])
                            ->textInput(['placeholder' => 'กรอกชื่อผู้สมัคร...'])
                            ->label(false);?>
</div>
    <?php ActiveForm::end(); ?>

</div>
