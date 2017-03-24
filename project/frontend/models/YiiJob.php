<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yii_job}}".
 *
 * @property string $job_id
 * @property string $job_name
 * @property string $job_company_id
 * @property string $job_nature
 * @property integer $job_amount
 * @property integer $job_trade
 * @property string $job_city
 * @property string $job_district
 * @property string $job_tag
 * @property string $job_education
 * @property string $job_experience
 * @property string $job_wage
 * @property string $job_contents
 * @property string $job_email
 * @property string $job_addtime
 * @property integer $job_status
 */
class YiiJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_name', 'job_company_id', 'job_nature', 'job_trade', 'job_district', 'job_tag', 'job_education', 'job_experience', 'job_wage', 'job_contents', 'job_email', 'job_addtime'], 'required'],
            [['job_company_id','job_addtime'], 'integer'],
            [['job_contents'], 'string'],
            [['job_name', 'job_nature'], 'string', 'max' => 30],
            [['job_city', 'job_district', 'job_email'], 'string', 'max' => 255],
            [['job_tag', 'job_education', 'job_experience'], 'string', 'max' => 50],
            
        ];
    }

    /**
     * @inheritdoc
     */
    // public function attributeLabels()
    // {
    //     return [
    //         'job_id' => 'Job ID',
    //         'job_name' => 'Job Name',
    //         'job_company_id' => 'Job Company ID',
    //         'job_nature' => 'Job Nature',
            
    //         'job_trade' => 'Job Trade',
    //         'job_city' => 'Job City',
    //         'job_district' => 'Job District',
    //         'job_tag' => 'Job Tag',
    //         'job_education' => 'Job Education',
    //         'job_experience' => 'Job Experience',
    //         'job_wage' => 'Job Wage',
    //         'job_contents' => 'Job Contents',
    //         'job_email' => 'Job Email',
    //         'job_addtime' => 'Job Addtime',
    //         'job_status' => 'Job Status',
    //     ];
    // }
}
