<?php
namespace app\components;
 
use Yii;
use DateTime;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use app\models\CertTemplates;
use app\models\Initial;
use app\models\Certificates;

class UtilityComponent extends Component
{	
    public function getDateDiff($dateStart, $dateEnd)
    {
        $strDateStart =  new Datetime($dateStart);
        $strDateEnd =  new Datetime($dateEnd);
        return $strDateStart->diff($strDateEnd)->days;
    }

    public function getNumberFormat($number)
    {
       return Yii::$app->formatter->asInteger($number);
    }
    
    protected function getDateFormatForDB($date)
    {
        $date = new DateTime($date);
        $dateFormat = date_format($date,'Y-m-d');
        return $dateFormat;
    }
    
    public function getThaiFormatDate($date)
    {
        Yii::$app->formatter->locale = 'th_TH';
        return Yii::$app->formatter->asDate($date, 'medium');
    }

    public function getThaiFormatDateLong($date)
    {
        Yii::$app->formatter->locale = 'th_TH';
        return Yii::$app->formatter->asDate($date, 'long');
    }

    public function convertThaiFormatDate($date)
    {
        $dateExplode = explode('-',$date);
        return $this->getMonthThaiFormat($dateExplode[1])." ".
            $this->getYearThaiFormat($dateExplode[0]);
    }

	public function getYearThaiFormat($strYearEng)
	{
		return $strYearEng+543;
    }

    protected function insertZero($inputValue, $digit)
    {
        $str = "" . $inputValue;
        while (strlen($str) < $digit){
            $str = "0" . $str;
        }
        return $str;
    }

    public function getMonthThaiFormat($strMonth)
	{
		$month = array("01"=>"มกราคม",  
                "02"=>"กุมภาพันธ์",  
                "03"=>"มีนาคม",  
                "04"=>"เมษายน",  
                "05"=>"พฤษภาคม",  
                "06"=>"มิถุนายน",  
                "07"=>"กรกฎาคม",  
                "08"=>"สิงหาคม",  
                "09"=>"กันยายน", 
                "10"=>"ตุลาคม", 
                "11"=>"พฤศจิกายน", 
                "12"=>"ธันวาคม" );
		return $month[$strMonth];
    }
    
    public function genCertCode()
    {
        $currentYear = date("Y");
        $currentMonth = date("m");

        $certCode = Certificates::find()
        ->where(['substr(cert_code,1,4)' => $currentYear])
        ->andWhere(['substr(cert_code,5,2)' => $currentMonth])
        ->orderBy('cert_code')
        ->count();
        
        if ($certCode == 0) {
            $res_sn = 1;
        } else {
            $res_sn = $certCode+1;
        }

        return $this->insertZero($res_sn,4);
    }

    public function checkLogin() 
    {
        $session = new \yii\web\Session();
        $session->open();
        if (empty($session->get('account_id'))) {
           return '0'; 
        }
    }

   
    public function getCertTemplate()
    {
        $certTemplate = CertTemplates::find()->orderBy('name')->all();
        $arrCertTemplate = ArrayHelper::map($certTemplate, 'template_id', 'name');
        return $arrCertTemplate;
    }

    protected function queryScalar($sql) 
    {
        $sql = Yii::$app->db->createCommand($sql); 
        $data = $sql->queryScalar();
        return $data;              
    }

    public function getCertTemplateName() 
    {
        $sql = " SELECT file_name FROM cert_templates
                    left JOIN used_template
                    on cert_templates.template_id = used_template.template_id ";  
        return $this->queryScalar($sql);         
    }

    public function getInitialName($regisCode)
    {
        $sql = " SELECT initial_name FROM Initial
                    left JOIN registration
                    on registration.initial_id = Initial.initial_id
                    WHERE registration.regis_code = $regisCode ";  
        return $this->queryScalar($sql);  
    }

    public function getSomeField($field, $tableName)
    {
        $sql = " SELECT $field FROM $tableName ";
        return $this->queryScalar($sql);
    }

    public function getInitial()
    {
        return ArrayHelper::map(Initial::find()->all(), 'initial_id', 'initial_name');
    }
}

?>