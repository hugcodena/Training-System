<?php
use yii\helpers\Html;
?>

<div class="" style="text-align:center; border: 2px solid #787878">
<table border="0" width="100%">
<tr>
		<td style="text-align:center;" width="15%">
			<img src="<?php echo Yii::$app->request->baseUrl.'/uploads/org/'.$logo ;?>" alt="" width="80px">
		</td>
		<td style="padding:20px;text-align:center;font-size:50px;font-weight:bold;" width="85%">
			Certificate of Completion 
		</td>
		<td width="10%">
		</td>
	</tr>
</table>
<table border="0" width="100%" >
	<tr>
		<td style="padding:20px;text-align:center;font-size:25px; font-weight:bold;" colspan ="2">
			is hereby granted to:
		</td>
	</tr>
	<tr>
		<td style="padding:15px;text-align:center;font-size:30px; font-weight:bold;color:#FF9800" colspan ="2">
		<strong><?= Yii::$app->utilityComponent->getInitialName($model_regis->regis_code).
			$model_regis->name." ". $model_regis->lastname; ?></strong>
		</td>
	</tr>
	<tr>
		<td style="padding:15px;text-align:center;font-size:25px; font-weight:bold;" colspan ="2">
			for
		</td>
	</tr>
	<tr>
		<td style="padding:15px;text-align:center;font-size:30px; font-weight:bold;" colspan ="2">
			<?= $model_course->name; ?>
		</td>
	</tr>
	<tr>
		<td style="padding-top:15px;text-align:center;font-size:20px; font-weight:bold;" colspan ="2">
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
		<td style="padding-top:50px;text-align:center">
		<br><br><br><br>
			<span style="font-size:30px">..............................</span><br>
			<span style="font-size:20px"><?= $authurize_name; ?></span><br>
			<span style="font-size:20px"><?= $position_name; ?></span>
		</td>
		<td style="padding-top:50px;text-align:center">
		<br><br><br><br>
			<span style="font-size:30px"></span><br>
			<span style="font-size:20px"><?= $cert_no; ?></span><br>
			<span style="font-size:20px">certificate number</span><br>
			
		</td> 
	</tr>
</table>
</div>





