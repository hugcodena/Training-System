<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'หลักสูตรอบรม', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning" >
    <div class="box-header with-border">
        <h3 class="box-title"><strong>หลักสูตร : <?= Html::encode($this->title) ?></strong></h3>
        <div class="pull-right">
            <div class="btn-group">
                <?= Html::a(' ลงทะเบียน', ['registration/create','id' => $model->code], ['class' => 'btn btn-flat bg-maroon glyphicon glyphicon-check']) ?>
            </div>
          
        </div>
    </div>
    <div class="box-body">
      <div class="col-md-12">
        <strong>รายละเอียดหลักสูตร</strong>
      </div>
      <div class="col-md-12">
            <?= $model->detail; ?> <br>
      </div>  
      <div class="col-md-12">
        <strong>วันที่อบรม</strong>
      </div>
      <div class="col-md-12">
      <? 	$dateDiff = 0;
			$strDate = "";
			$date = "";
			$dateDiff = Yii::$app->utilityComponent->getDateDiff($model->date_open, $model->date_end);
			if($dateDiff == 0){
				$strDate = "วันที่";
				$date =  $strDate." ".Yii::$app->utilityComponent->getThaiFormatDate($model->date_open);
			}else{ $strDate = "ระหว่างวันที่";
				$dateBegin =   Yii::$app->utilityComponent->getThaiFormatDate($model->date_open);
				$dateEnd =   Yii::$app->utilityComponent->getThaiFormatDate($model->date_end);
				$date = $strDate." ". $dateBegin." ถึง ".$dateEnd;
			}
		?>
			 <?= $date; ?> <br><br>
      </div>
      <div class="col-md-12">
        <strong>จำนวนที่รับ</strong>
      </div>
      <div class="col-md-12">
        <?= $model->seat_num; ?> <br><br>
      </div>
      <div class="col-md-12">
        <strong>สถานที่</strong>
      </div>
      <div class="col-md-12">
        <?= $model->place; ?> <br><br>
      </div>
      <div class="col-md-12">
        <strong>เนื้อหาการอบรม</strong>
      </div>
      <div class="col-md-12">
        <?= $model->course_outline; ?>
      </div>
</div>
</div>