<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><strong> ผลการลงทะเบียน </strong></h3>
    </div>
    <div class="box-body">
       <div style="text-align:center">
            <h3>ลงทะเบียนเรียบร้อยแล้ว</h3>
        </div>
        <div style="text-align:center">
            <br><br>
            <?= Html::a(' กลับหน้าหลัก', ['site/index'], ['class' => 'btn btn-flat bg-maroon glyphicon glyphicon-menu-left']) ?>
        </div>
    </div>
</div>
</div>
