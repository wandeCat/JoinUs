<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $recom
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userinfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','file'], 'required'],
            ['tel','match','pattern'=>'/^1[3,8,7]\d{9}$/','message'=>'{attribute}必须为1开头的11位纯数字'],
            [['email'],'email'],
    
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'tel' => 'tel',
            'email' => 'email',
            'file' => 'file',
        ];
    }
}
