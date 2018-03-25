<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Account;
use yii\web\Session;
$session = new Session();
$session->open();
?>

<div class="login-page1">
  <div class="form">
  <div>
      <img class="profile-img" src="images/logo/hugcode.png" alt="">
  </div><br>
  <div style="color:white;"><h2>ระบบบริหารจัดการสมัครอบรมออนไลน์</h2></div>
  <div style="color:white;"><strong>(HUG - TRAINING V1.0)</strong></div>
  <br><br>
    <?php $f = ActiveForm::begin(); ?>
      <?= $f->field($account, 'username')->textInput(['placeholder'=>'ชื่อผู้ใช้งาน'])->label(false); ?>
      <?= $f->field($account, 'password')->textInput(['placeholder'=>'รหัสผ่าน'])->label(false); ?>
      <?= Html::submitButton('เข้าสู่ระบบ' , ['class' => 'button']) ?>
    <?php ActiveForm::end(); ?>
  </div>
</div>