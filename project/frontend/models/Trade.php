<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%trade}}".
 *
 * @property string $trade_id
 * @property string $trade_name
 * @property integer $trade_pid
 */
class Trade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */  

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trade_pid'], 'integer'],
            [['trade_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trade_id' => 'Trade ID',
            'trade_name' => 'Trade Name',
            'trade_pid' => 'Trade Pid',
        ];
    }
}
