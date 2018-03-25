<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Courses;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $courses = Courses::find()
        ->where(['status' => '1'])
        ->orderBy('code DESC')
        ->all();

        return $this->render('//frontend/site/index',[
            'model' => $courses,
            'title' => 'หลักสูตรอบรม',
            'num_course' => count($courses)
        ]);
    }
}
