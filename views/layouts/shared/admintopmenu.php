<?
use yii\helpers\Url;
$session = new \yii\web\Session();
$session->open();
?>
<header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>Online</b>Training</span>
      <span class="logo-lg"><b>สมัครอบรม</b>ออนไลน์</span>
    </a>
    <nav class="navbar navbar-static-top">
     <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a> -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <? if (empty($session['username']))  { ?>
          <li>
            <a href="<?php echo Url::to(['site/index']); ?>" >
                <span class="hidden-xs">หน้าแรก  </span>
              </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['login/index']); ?>" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">สำหรับเจ้าหน้าที่  </span>
              </a>
          </li>
        <? } else { ?>
          <li>
            <a href="<?php echo Url::to(['site/index']); ?>" >
                <span class="hidden-xs">หน้าแรก  </span>
              </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['courses/index','type'=>'add']); ?>" >
                <span class="hidden-xs">หลักสูตรอบรม  </span>
              </a>
          </li>
          <li>
            <a href="<?php echo Url::to(['courses/index','type'=>'list']); ?>" >
                <span class="hidden-xs">พิมพ์เกียรติบัตร  </span>
              </a>
          </li>
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"> ตั้งค่า</i>
            </a>
            <ul class="dropdown-menu">
              <li class="header">ข้อมูลทั่วไป</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="<?php echo Url::to(['organization/index']); ?>">
                      <h3>
                        ข้อมูลหน่วยงาน
                      </h3>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <strong><?php echo $session['account_name']; ?>  </strong>
            </a>
          </li>
			<li>
			<a href="index.php?r=login/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>
				<strong>ออกจากระบบ</strong>
			</a>
			</li>
          <? } ?>
        </ul>
      </div>
    </nav>
  </header>