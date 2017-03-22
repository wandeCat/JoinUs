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

}