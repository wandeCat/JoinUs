<?php
	
namespace app\models;

use Yii;
use yii\base\Model;

class User_Person extends Model{

	public $person_email;
	public $person_password;

	public static function tableName()
    {
        return '{{%person}}';
    }

    public function attributeLabels()
    {
        return [
            'person_email' => 'email',
            'person_password' => 'password',
        ];
    }

	public function create1($data){//DAO模式
        $sql = "insert into yii_person(person_email,person_password,type)values('{$data['email']}','{$data['password']}','{$data['type']}')";
        yii::$app->db->createCommand($sql)->execute();
        return yii::$app->db->getLastInsertID();
    }

    public function create2($data){//DAO模式
        $sql = "insert into yii_company(company_email,company_password,type)values('{$data['email']}','{$data['password']}','{$data['type']}')";
        yii::$app->db->createCommand($sql)->execute();
        return yii::$app->db->getLastInsertID();
    }

    public function getOne1($data)
    {
        //print_r($data);die;
        $sql = "select * from yii_person where person_email='".$data['email']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->queryOne();
    }

    public function getOne2($data)
    {
        $sql = "select * from yii_company where company_email='".$data['email']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->queryOne();
    }

    public function update1($data){
        $sql = "update yii_person set person_password='".$data['password']."' where person_email = '".$data['email']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->execute();
    }

    public function update2($data){
        $sql = "update yii_company set company_password='".$data['password']."' where company_email = '".$data['email']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->execute();
    }

}