<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Session;
use app\models\Users;

class LoginController extends Controller
{
    public $layout = 'main_login';

  public function actionIndex() {
    $account = new Users();
    if (!empty($_POST)) {
      $account = Users::find()
      ->where('username = :username AND password = :password', [
        ':username' => $_POST['Users']['username'],
        ':password' => $_POST['Users']['password']
        ])
      ->one();
      if (!empty($account)) {
        $session = new \yii\web\Session();
        $session->open();
        $session['account_id'] = $account->id;
        $session['username'] = $account->username;
      //  Yii::$app->session->displayUserLogin($account->id,$account->name);
        
        $session['account_name'] = $account->name;
        return $this->redirect(['home']);
      } else {
        $account = new Users();
        $account->username= $_POST['Users']['username'];
        $account->password = $_POST['Users']['password'];
        $session = new \yii\web\Session();
        $session->open();
        $session->setFlash('message_login', 'ชื่อผู้ใช้งานและรหัสผ่านไม่ถูกต้อง');
      }
    }
    return $this->render('index', ['account' => $account]);
  }

  public function actionHome() {
    return $this->redirect(['courses/index','type' => 'add']);
  }

  public function actionLogout() {
    $session = new \yii\web\Session();
    $session->open();
    unset($session['account_id']);
    unset($session['username']);
    unset($session['account_name']);
    unset($session['message_login']);
    return $this->redirect('index.php?r=site/index');
  }
}
