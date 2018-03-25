<?php

use yii\helpers\Url;

$this->title = 'ระบบสมัครอบรมออนไลน์';
?>

<div class="site-index">
    <? echo $this->render('baner'); ?>
</div>
    <div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>หลักสูตรที่เปิดอบรม</strong></h3>
        <div class="pull-right">
            <div>
            จำนวน <span class="badge bg-green"><? echo $num_course; ?></span> หลักสูตร
             </div>
        </div>
    </div>
    <div class="box-body">
    <div class="body-content">
    <div class="row">
      <? foreach($model as $v_course) : ?>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="<?php echo Yii::$app->request->baseUrl.'/uploads/courses/'.$v_course->img_path; ?>">
              <div class="caption">
                <span>
                    <strong>
                    <? echo $v_course->name; ?>      
                    </strong>
                </span> <br>
                <span style="text-align:left">
                      ระยะเวลา:
                        <? $countDate = Yii::$app->utilityComponent->getDateDiff($v_course->date_open, $v_course->date_end);
                        if($countDate == 0){
                          echo "1";
                        } else {
                          echo $countDate;
                        }
                        ?> 
                        วัน <br>
                      วันที่อบรม: 
                      <? echo Yii::$app->utilityComponent->getThaiFormatDate($v_course->date_open); ?>
                             - 
                      <? echo Yii::$app->utilityComponent->getThaiFormatDate($v_course->date_end); ?> <br>
                </span> 
                <p> 
                <br>
                    <a href="<? echo Url::to(['courses/view','id' => $v_course->code]); ?>"  class="btn btn-flat bg-olive"> รายละเอียด </a>
                    <a href="<? echo Url::to(['registration/create','id' => $v_course->code]); ?>"  class="btn btn-flat bg-orange"> ลงทะเบียน </a>
         
                </p>
            </div>
          </div>
        </div>
        <? endforeach; ?>
      </div><!-- End row -->
    </div>

</div>
</div>
