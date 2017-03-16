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

	public function create($data){//DAO模式
        $sql = "insert into yii_person(person_email,person_password,type)values('{$data['email']}','{$data['password']}','{$data['type']}')";
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

    public function getOne3($data)
    {
        $sql = "select * from yii_person where person_email='".$data['email']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->queryOne();
    }

    public function getOne4($data)
    {
        $sql = "select * from yii_company where company_email='".$data['email']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->queryOne();
    }

}