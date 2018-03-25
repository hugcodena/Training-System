<?php

namespace app\controllers;

use Yii;
use app\models\Initial;
use app\models\Registration;
use app\models\SearchRegistration;
use app\models\Courses;
use app\models\UsedTemplate;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\Expression;

class RegistrationController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    protected function authen()
    {
        $check =  Yii::$app->utilityComponent->checkLogin();
        if($check == '0') {
            return $this->redirect('index.php?r=login/index');
        }
    }

    public function actionIndex($id)
    {
        $modelCertTemplate = new UsedTemplate();
        $searchModel = new SearchRegistration();
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);
        return $this->render('//frontend/registration/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'course_name' => $this->findModelCourse($id),
            'count_regis' => count($this->countRegis($id)),
            'id' =>  $id,
            'certTemplate' => $modelCertTemplate
        ]);
    }

    public function actionView($id)
    {
        return $this->render('//frontend/registration/view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate($id)
    {
        $model = new Registration();
        $initial = Initial::find()->orderBy('initial_id')->all();
        $arr_initial = ArrayHelper::map($initial, 'initial_id', 'initial_name');
        
        if ($model->load(Yii::$app->request->post())) {
            $model->course_code = $id;
            $model->regis_date = new Expression('NOW()');
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->regis_code]);
            }
           
        }

        return $this->render('//frontend/registration/_form', [
            'model' => $model,
            'initial' => $arr_initial,
            'course_name' => $this->findModelCourse($id)
        ]);
    }

    public function actionUpdate($id)
    {
        $this->authen();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->regis_code]);
        }

        return $this->render('_form', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->authen();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Registration::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelCourse($id)
    {
        if (($model = Courses::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

    protected function countRegis($course_code)
    {
        $model = Registration::find()
        ->where(['course_code' => $course_code])
        ->all();
        return $model;
    }
}
