<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

$this->title = 'หลักสูตรอบรม';
$columns = "";
if(($type == 'add')) {
    $columns = "{update} {delete}";
} else {
    $columns = "{view}";
}
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-warning" style="height:500px;">
    <div class="box-header with-border">
        <h3 class="box-title"><strong><?= Html::encode($this->title) ?></strong></h3>
        <div class="pull-right">
            <div class="btn-group">
            <? if(($type == 'add')) { ?>
                <?= Html::a(' เพิ่มใหม่', ['create'], ['class' => 'btn btn-flat bg-olive glyphicon glyphicon-plus']) ?>
             </div>
            <? } ?>
        </div>
    </div>
    <div class="box-body">
<div class="courses-index">
<br>
<? echo $this->render('_search', ['model' => $searchModel,'type'=>$type]); ?>
<br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'date_open:date',
            'date_end:date',
            'seat_num',
            'cost',
            ['class' => 'yii\grid\ActionColumn',
            'template'=> $columns,
                'buttons'=>[
                    'update' => function ($url, $dataProvider, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$dataProvider->code], 
                                    ['class' => 'btn btn-success btn-xs']); 
                    },
                    'view' => function ($url, $dataProvider, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"> ดูรายชื่อ</span>', ['registration/index', 'id'=>$dataProvider->code], 
                                    ['class' => 'btn btn-success btn-xs']); 
                    },
                    'delete' => function ($url, $dataProvider, $key) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                            'class'       => 'btn btn-danger btn-xs  popup-modal',
                            'data-toggle' => 'modal',
                            'data-target' => '#modal-delete',
                            'data-id'     => $dataProvider->code,
                            'data-name'   => $dataProvider->code,
                            'id'          => 'popupModal'
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
</div>
</div>
</div>
<?php Modal::begin([
    'header' => '<h2 class="modal-title">ยืนยัน</h2>',
    'id'     => 'modal-delete'
]); 
 echo "
		  <div class='modal-body'>
			<p>คุณต้องการลบข้อมูลใช่หรือไม่?</p>
		  </div>
		  <div class='modal-footer'>
            <button type='button' id='delete-confirm' name='delete-confirm' class='btn btn-danger'>ใช่</button>
			<button type='button' class='btn btn-default' data-dismiss='modal'>ยกเลิก</button> 
		  </div>
		"; ?>
<?php Modal::end(); ?>

<script type="text/javascript">

$(document).ready(function() { 
    $(".popup-modal").click(function(e) {
        e.preventDefault();
        var that = $(this);
        var id = that.data("id");
        var name = that.data("name");	
        $("#modal-delete").show();	
        $("#delete-confirm").click(function(e) {
            e.preventDefault();
            window.location = 'index.php?r=courses/delete&id='+id;
        });
    });

});
</script>

