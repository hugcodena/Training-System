<?php

namespace app\controllers;

use Yii;
use app\models\Organization;
use app\models\SearchOrganization;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class OrganizationController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SearchOrganization();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('//backend/organization/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Organization();
        if (isset($_POST['Organization'])) {
            if (!empty($_POST['Organization']['org_code'])) {
                $id = $_POST['Organization']['org_code'];
                $model =  $this->findModel($id);
            }
			
            $model->load($_POST);
              
            Yii::$app->params['uploadsPath'] = Yii::getAlias('@app/web/uploads/org/');
			$path = Yii::$app->params['uploadsPath'];
			$strFile = UploadedFile::getInstances($model,'img_logo');
			$new_filename =[];
			foreach ($strFile as $file) {
				$file->saveAs($path .time()."_".$file->basename.".".$file->extension);
				$filename = time()."_".$file->basename.".".$file->extension;
				$new_filename[] = $filename;
            }
            
		    $fileImages = implode(',', $new_filename);
   
			if (!empty($fileImages)) {
				$model->img_logo = $fileImages; 
			} else{
				$model->img_logo =  $model->img_logo; 
			}
                    
			if ($model->save()) {
				return $this->redirect(['index']);
			} else {
				 // Yii::$app->session->setFlash('error', 'Model could not be saved');
			}
        } else {
            return $this->render('//backend/organization/_form', [
                'model' => $model,
                'title' => 'เพิ่มข้อมูลหน่วยงาน'
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->render('//backend/organization/_form', [
            'model' => $model,
            'title' => 'ข้อมูลหน่วยงาน'
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Organization::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
