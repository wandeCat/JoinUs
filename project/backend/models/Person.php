<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%person}}".
 *
 * @property integer $person_id
 * @property string $person_email
 * @property string $person_password
 * @property integer $type
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%person}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['person_email', 'person_password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => '个人用户 ID',
            'person_email' => '个人用户 邮箱',
            'person_password' => '个人用户 密码',
            'type' => 'Type',
        ];
    }
    
}
