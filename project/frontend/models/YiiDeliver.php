<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%yii_deliver}}".
 *
 * @property integer $deliver_id
 * @property string $deliver_job_name
 * @property integer $deliver_job_id
 * @property integer $deliver_company_id
 * @property integer $deliver_resume_id
 * @property integer $deliver_time
 * @property integer $deliver_handle_time
 * @property integer $deliver_status
 * @property integer $deliver_del
 */
class YiiDeliver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yii_deliver}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deliver_job_name', 'deliver_job_id', 'deliver_company_id', 'deliver_resume_id', 'deliver_time'], 'required'],
            [['deliver_job_id', 'deliver_company_id', 'deliver_resume_id', 'deliver_time', 'deliver_handle_time', 'deliver_status', 'deliver_del'], 'integer'],
            [['deliver_job_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'deliver_id' => 'Deliver ID',
            'deliver_job_name' => 'Deliver Job Name',
            'deliver_job_id' => 'Deliver Job ID',
            'deliver_company_id' => 'Deliver Company ID',
            'deliver_resume_id' => 'Deliver Resume ID',
            'deliver_time' => 'Deliver Time',
            'deliver_handle_time' => 'Deliver Handle Time',
            'deliver_status' => 'Deliver Status',
            'deliver_del' => 'Deliver Del',
        ];
    }
}
