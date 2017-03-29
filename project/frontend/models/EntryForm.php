<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $sex;
    public $hobby;

    public function rules()
    {
        return [
            [['name', 'email','sex','hobby'], 'required'],
            ['email', 'email'],
        ];
    }
}
