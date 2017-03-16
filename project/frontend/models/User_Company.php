<?php
	
namespace app\models;

use Yii;
use yii\base\Model;

class User_Company extends Model{

	public $company_email;
	public $company_password;
	
	public static function tableName()
    {
        return '{{%company}}';
    }

    public function attributeLabels()
    {
        return [
            'company_email' => 'email',
            'company_password' => 'password',
        ];
    }

	public function create($data){//DAO模式
        $sql = "insert into yii_company(company_email,company_password,type)values('{$data['email']}','{$data['password']}','{$data['type']}')";
        return yii::$app->db->createCommand($sql)->execute();
    }

    public function getOne1($data)
    {
        $sql = "select * from yii_person where person_email='".$data['email']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->queryOne();
    }

    public function getOne2($data)
    {
        $sql = "select * from yii_company where company_email='".$data['email']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->queryOne();
    }

}