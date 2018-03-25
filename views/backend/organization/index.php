<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

$this->title = 'แสดงข้อมูลหน่วยงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning" style="height:500px;">
    <div class="box-header with-border">
        <h3 class="box-title"><strong><?= Html::encode($this->title) ?></strong></h3>
    </div>
    <div class="box-body">
<div class="courses-index">
<br>
<br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'org_name',
            'address',
            'tel',
            ['class' => 'yii\grid\ActionColumn',
            'template'=>  ' {update} ',
                'buttons'=>[
                    'update' => function ($url, $dataProvider, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$dataProvider->org_code], 
                                    ['class' => 'btn btn-success btn-xs']); 
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
