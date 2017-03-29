<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%resume}}".
 *
 * @property integer $resume_id
 * @property string $resume_name
 * @property string $resume_sex
 * @property string $resume_education
 * @property string $resume_experience
 * @property string $resume_phone
 * @property string $resume_email
 * @property string $resume_status
 * @property string $resume_head
 * @property string $resume_workE
 * @property string $resume_projectE
 * @property string $resume_educational
 * @property string $resume_introduction
 * @property string $resume_production
 * @property integer $resume_acquiesce
 * @property string $resume_expectW
 * @property integer $person_id
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%resume}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resume_acquiesce', 'person_id'], 'integer'],
            [['resume_name', 'resume_education', 'resume_experience'], 'string', 'max' => 10],
            [['resume_sex'], 'string', 'max' => 2],
            [['resume_phone'], 'string', 'max' => 12],
            [['resume_email', 'resume_status'], 'string', 'max' => 50],
            [['resume_head', 'resume_workE', 'resume_projectE', 'resume_educational', 'resume_introduction', 'resume_production', 'resume_expectW'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resume_id' => '个人简历 ID',
            'resume_name' => '个人简历 名字',
            'resume_sex' => '个人简历 性别',
            'resume_education' => '个人简历 学历',
            'resume_experience' => '个人简历 经验',
            'resume_phone' => '个人简历 电话',
            'resume_email' => '个人简历 邮箱',
            'resume_status' => '个人简历 状态',
            'resume_head' => '个人简历 Head',
            'resume_workE' => '个人简历 Work E',
            'resume_projectE' => '个人简历 Project E',
            'resume_educational' => '个人简历 Educational',
            'resume_introduction' => '个人简历 Introduction',
            'resume_production' => '个人简历 Production',
            'resume_acquiesce' => '个人简历 Acquiesce',
            'resume_expectW' => '个人简历 Expect W',
            'person_id' => 'Person ID',
        ];
    }
}
