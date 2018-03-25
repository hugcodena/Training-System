<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="" style="text-align:center; border: 1px solid #787878">
<table border="0" width="100%">
<tr>
	<td style="text-align:center;" >
		<img src="<?php echo Yii::$app->request->baseUrl.'/uploads/org/'.$logo ;?>" alt="" width="100px">
	</td>
</tr>
<tr>
	<td style="padding-top:20px;text-align:center;font-size:40px;font-weight:bold;">
		<?= $org_name; ?>
	</td>
</tr>
</table>

<table border="0" width="100%" >
	<tr>
		<td style="text-align:center;font-size:25px; font-weight:bold;" colspan ="2">
			ขอมอบเกียรติบัตรฉบับนี้ เพื่อแสดงว่า
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size:35px;font-weight:bold;color:#FF9800" colspan ="2">
			<strong><?= Yii::$app->utilityComponent->getInitialName($model_regis->regis_code).
			$model_regis->name." ". $model_regis->lastname; ?></strong>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size:25px; font-weight:bold;" colspan ="2">
            ได้ผ่านการ<?= $model_course->name; ?>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size:30px; font-weight:bold;" colspan ="2">
		<? 	$dateDiff = 0;
			$strDate = "";
			$date = "";
			$dateDiff = Yii::$app->utilityComponent->getDateDiff($model_course->date_open,$model_course->date_end);
			if($dateDiff == 0){
				$strDate = "วันที่";
				$date = explode('-',$model_course->date_open);
				$date = $date[2];
			}else{ $strDate = "ระหว่างวันที่";
				$dateBegin = explode('-',$model_course->date_open );
				$dateEnd = explode('-',$model_course->date_end);
				$date = $dateBegin[2]."-".$dateEnd[2];
			}
		?>
			 <?= $strDate." ". $date." ".
			  Yii::$app->utilityComponent->convertThaiFormatDate($model_course->date_open); ?>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size:25px; font-weight:bold;" colspan ="2">
            ขอให้ประสบความสำเร็จในการนำความรู้ไปพัฒนาการจัดการเรียนการสอนสืบไป <br>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size:25px; font-weight:bold;" colspan ="2">
			ให้ไว้ ณ วันที่  <?= date('d')." ".
			"เดือน". Yii::$app->utilityComponent->getMonthThaiFormat(date('m'))." ".
			"พุทธศักราช"." ". Yii::$app->utilityComponent->getYearThaiFormat(date('Y')) ?>
		</td>
	</tr>
	<tr>
		<td style="text-align:center;font-size:25px" colspan ="2">
			<br><br><br><br><br>
			(<?= $authurize_name; ?>)<br>
			<?= $position_name; ?>
		</td>
	</tr>
</table>
</div>





