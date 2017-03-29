<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%job_education}}".
 *
 * @property integer $job_education_id
 * @property string $job_education_val
 */
class JobEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job_education}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_education_val'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_education_id' => 'Job Education ID',
            'job_education_val' => 'Job Education Val',
        ];
    }
}
