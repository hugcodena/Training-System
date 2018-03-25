<?php
namespace app\controllers;

use Yii;
use app\models\Courses;
use app\models\Registration;
use app\models\CertTemplates;
use app\models\UsedTemplate;
use app\models\Certificates;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\db\Expression;
use kartik\mpdf\Pdf;

class PrintCertController extends Controller
{
    protected function authen()
    {
        $check =  Yii::$app->utilityComponent->checkLogin();
        if($check == '0') {
            return $this->redirect('index.php?r=login/index');
        }
    }

    protected function getCertTemplateName() 
    {
       return Yii::$app->utilityComponent->getCertTemplateName();           
    }

    public function actionInsertCert($course_code, $regis_code) 
    {
        $this->authen();
        $currentYear = date("Y");
        $currentMonth = date("m");

        $model = new Certificates();
        $model->load($_POST);
        $certCode = $currentYear . $currentMonth .  Yii::$app->utilityComponent->genCertCode();
        $model->cert_code =  $certCode;
        $model->regis_code = $regis_code;
        $model->print_status = '1';
       
        if($model->save()) 
        {
           return $this->printCert($course_code, $regis_code, $certCode );
        } 
    }

    protected function printCert($course_code, $regis_code, $certCode) 
    {
        $modelRegis = Registration::find()
                    ->where(['regis_code' => $regis_code])
                    ->one();

        $modelCourse = Courses::find()
                    ->where(['code' => $course_code])
                    ->one();

        $orgName = Yii::$app->utilityComponent->getSomeField("org_name", "used_template");
        $authurizeName = Yii::$app->utilityComponent->getSomeField("authurize_name", "used_template");
        $positionName = Yii::$app->utilityComponent->getSomeField("position_name","used_template");
        $logo = Yii::$app->utilityComponent->getSomeField("img_logo","organization");

        $content = $this->renderPartial('//backend/print-cert/'.$this->getCertTemplateName(), [
            'model_course' => $modelCourse,
            'model_regis' => $modelRegis,
            'org_name' => $orgName,
            'authurize_name' => $authurizeName,
            'position_name' => $positionName,
            'logo' => $logo,
            'cert_no' => $certCode
        ]);

        return  $this->printPDF($content);
        
    }

    public function printPDF($content)
    {
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
            'cssInline' => '
                        .print {
                             background: url("../web/cert_templates/6.jpg") 100% 0 no-repeat;
                           
                        }
                        .bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
            'options' => ['title' => 'Preview Report Case: ',
                         //   'showWatermarkText'=>true,
                        ],
            'methods' => [
               /* 'SetHeader'=>[''],
                'SetFooter'=>['{PAGENO}'],
                'SetHeader'=>['<div class=col-md-12 >'
                .'<div class=col-md-6  style=margin-top:-30px>'
                .'</div><div class=col-md-6  style=margin-top:-15px><p></p></div>'], 
                'SetFooter'=>['{PAGENO}'],
                'SetWatermarkText'=>['Draft'],
                'SetWatermarkImage'=>['../web/cert_templates/cert1.jpg',0.10, 'P', 'F' ], */
            ]
        ]);
        return $pdf->render();
    }
}
