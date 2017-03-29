<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%job_experience}}".
 *
 * @property integer $job_experience_id
 * @property string $job_experience_val
 */
class JobExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job_experience}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_experience_val'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_experience_id' => 'Job Experience ID',
            'job_experience_val' => 'Job Experience Val',
        ];
    }
}
