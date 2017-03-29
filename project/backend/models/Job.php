<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%job}}".
 *
 * @property string $job_id
 * @property string $job_name
 * @property string $job_company_id
 * @property string $job_nature
 * @property string $job_trade
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
 * @property string $job_hot
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_name', 'job_company_id', 'job_nature', 'job_trade', 'job_district', 'job_tag', 'job_education', 'job_experience', 'job_wage', 'job_contents', 'job_email', 'job_addtime'], 'required'],
            [['job_company_id', 'job_addtime', 'job_status'], 'integer'],
            [['job_contents'], 'string'],
            [['job_name', 'job_nature'], 'string', 'max' => 30],
            [['job_trade', 'job_tag', 'job_education', 'job_experience'], 'string', 'max' => 50],
            [['job_city', 'job_district', 'job_email', 'job_hot'], 'string', 'max' => 255],
            [['job_wage'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => '职位 ID',
            'job_name' => '职位 名称',
            'job_company_id' => '职位 公司 ID',
            'job_nature' => '职位 工作性质',
            'job_trade' => '职位 分类',
            'job_city' => '职位 城市',
            'job_district' => '职位 地址',
            'job_tag' => '职位 优势',
            'job_education' => '职位 学历',
            'job_experience' => '职位 工作经验',
            'job_wage' => '职位 Wage',
            'job_contents' => '职位 内容',
            'job_email' => '职位 Email',
            'job_addtime' => '职位 添加时间',
            'job_status' => '职位 状态',
            'job_hot' => '热门 职位',
        ];
    }
}
