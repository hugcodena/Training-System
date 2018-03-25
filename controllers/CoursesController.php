<?php
namespace app\controllers;

use Yii;
use app\models\Initial;
use app\models\Courses;
use app\models\SearchCourses;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

class CoursesController extends Controller
{
    protected function authen()
    {
        $check =  Yii::$app->utilityComponent->checkLogin();
        if($check == '0') {
            return $this->redirect('index.php?r=login/index');
        }
    }

    public function actionIndex($type)
    {
        $this->authen();
        $searchModel = new SearchCourses();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('//backend/courses/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'type' => $type
        ]);
    }

    public function actionView($id)
    {
        return $this->render('//backend/courses/view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $this->authen();
        $model = new Courses();
      
        if (isset($_POST['Courses'])) {  
            if (!empty($_POST['Courses']['code'])) {
				$id = $_POST['Courses']['code'];
				$model =  $this->findModel($id);
			}
			
            $model->load($_POST);
              
            Yii::$app->params['uploadsPath'] = Yii::getAlias('@app/web/uploads/courses/');
			$path = Yii::$app->params['uploadsPath'];
			$strFile = UploadedFile::getInstances($model,'img_path');
			$new_filename =[];
			foreach ($strFile as $file) {
				$file->saveAs($path .time()."_".$file->basename.".".$file->extension);
				$filename = time()."_".$file->basename.".".$file->extension;
				$new_filename[] = $filename;
            }
            
		    $fileImages = implode(',', $new_filename);
   
			if (!empty($fileImages)) {
				$model->img_path = $fileImages; 
			} else{
				$model->img_path =  $model->img_path; 
			}
                    
              $model->status = '1';
			if ($model->save()) {
				return $this->redirect(['index','type'=>'add']);
			} else {
				 // Yii::$app->session->setFlash('error', 'Model could not be saved');
			}
        }

        return $this->render('//backend/courses/_form', [
            'model' => $model,
            'initial' => $this->getInitial(),
            'title' => 'เพิ่มหลักสูตรอบรม'
        ]);
    }

    public function actionUpdate($id)
    {
        $this->authen();
        $model = $this->findModel($id);

        return $this->render('//backend/courses/_form', [
            'model' => $model,
            'initial' => $this->getInitial(),
        ]);
    }

    public function actionDelete($id)
    {
        $this->authen();
        $this->findModel($id)->delete();

        return $this->redirect(['index','type'=>'list']);
    }

    protected function findModel($id)
    {
        if (($model = Courses::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function getInitial()
    {
        $initial = Initial::find()->orderBy('initial_id')->all();
        $arr_initial = ArrayHelper::map($initial, 'initial_id', 'initial_name');
        return $arr_initial;
    }
}
