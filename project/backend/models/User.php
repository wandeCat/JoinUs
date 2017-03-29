<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $add_time
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['add_time'], 'safe'],
            [['username'], 'string', 'max' => 32],
            [['password', 'email'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'add_time' => 'Add Time',
        ];
    }

    public function getOne($data)
    {
        $sql = "select * from user where username='".$data['username']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->queryOne();
    }
    public function getTwo($data)
    {
        $sql = "select * from user where password='".$data['password']."' and 1=1 or 0=1";
        return yii::$app->db->createCommand($sql)->queryOne();
    }
}
