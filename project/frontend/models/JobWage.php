<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%job_wage}}".
 *
 * @property integer $job_wage_id
 * @property string $job_wage_val
 */
class JobWage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%job_wage}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_wage_val'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_wage_id' => 'Job Wage ID',
            'job_wage_val' => 'Job Wage Val',
        ];
    }
}
