<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

$this->title = $course_name->name;
$this->params['breadcrumbs'][] = ['label' => 'หลักสูตรอบรม', 'url' => ['courses/index','type'=> 'list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning" style="height:500px;">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>รายชื่อผู้ลงทะเบียนหลักสูตร : <? echo $course_name->name; ?></strong></h3>
        <div class="pull-right">
            <div class="btn-group">
                <?= Html::a(' กำหนดเทมเพลต', ['#'], ['data-toggle' => 'modal',
                                                        'data-target' => '#modal-setting-cert-template',
                                                        'class' => 'btn btn-flat bg-orange glyphicon glyphicon-cog']) ?>
            </div>
        </div>
    </div>
    <div class="box-body">
<div class="col-md-12">
<br>
    <?php  echo $this->render('_search', ['model' => $searchModel, 'id'=>$id]); ?>
    <div class="pull-right">
        จำนวนผู้ลงทะเบียน <span class="badge bg-green"> <? echo $count_regis; ?> </span> คน
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                [
                    'label'=>'ชื่อ-นามสกุล',
                    'format'=>'raw',
                    'value'=>function ($model) {
                        return $model->initialName->initial_name . $model->name. " ".$model->lastname;
                    },
                    'contentOptions'=>['style'=>'max-width:20px;']
                ],
                [
                    'label'=>'อีเมล์',
                    'format'=>'raw',
                    'value'=>function ($model) {
                        return $model->email;
                    },
                    'contentOptions'=>['style'=>'max-width:20px;']
                ],
                [
                    'label'=>'เบอร์โทรศัพท์',
                    'format'=>'raw',
                    'value'=>function ($model) {
                        return $model->tel;
                    },
                    'contentOptions'=>['style'=>'max-width:20px;']
                ],
                ['class' => 'yii\grid\ActionColumn',
                'template'=> ' {print} ',
                'buttons'=>[
                    'print' => function ($url, $dataProvider, $key) {
                        return Html::a('<span class="glyphicon glyphicon-print"> พิมพ์</span>', 
                                        ['print-cert/insert-cert', 'course_code'=>$dataProvider->course_code,
                                            'regis_code'=>$dataProvider->regis_code
                                        ],
                                        [
                                            'target' => '_blank',
                                            'class' => 'btn btn-success btn-xs linksWithTarget']
                                    ); 
                                },
                    ]
                ],
            ],
    ]); ?>
</div>
</div>
</div>

<?php Modal::begin([
    'header' => '<h4 class="modal-title"><strong> ตั้งค่าเทมเพลต </strong></h4>',
    'id'     => 'modal-setting-cert-template'
]); 
 echo "<div class='modal-body'>".
           $this->render('//backend/used-template/_form',[
               'model'=> $certTemplate
           ]);
		  ?>
<?php Modal::end(); ?>


