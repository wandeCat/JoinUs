<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%advert}}".
 *
 * @property integer $advert_id
 * @property string $advert_company
 * @property string $advert_log
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%advert}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['advert_company'], 'string', 'max' => 255],
            [['file'],'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'advert_id' => '广告 ID',
            'advert_company' => '广告发布 公司',
            'file' => '广告 Log',
        ];
    }
}
