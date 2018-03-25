<?php

namespace app\controllers;

use Yii;
use app\models\UsedTemplate;
use app\models\SearchUsedTemplate;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;

class UsedTemplateController extends Controller
{
    public function actionSaveAjaxCert() 
	{ 
		\Yii::$app->response->format = Response::FORMAT_JSON;
        $sql = Yii::$app->db->createCommand(" TRUNCATE TABLE used_template ")->execute();
        $model = new UsedTemplate();
		if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				$data['result'] ="บันทึกข้อมูลเรียบร้อยแล้ว";
			}else{
				$data['result'] ="ไม่สามารถบันทึกข้อมูลได้";
			}
		} 
		echo Json::encode($data);
	}
}
