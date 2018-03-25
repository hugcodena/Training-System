<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="<?php echo Yii::$app->request->baseUrl.'/js/jquery-3.2.1.js';?> "></script>
</script>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-purple sidebar-mini" style= "background:#EEEEEE;">
<?php $this->beginBody() ?>

<div class="wrap">
   <? echo $this->render('shared/admintopmenu'); ?>

<div class="container content">
    <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; HUGCODE <?= date('Y') ?></p>

        <p class="pull-right">Powered by <a href = "www.hugcode.co.th" target="_blank">hugcode co.ltd.,</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
