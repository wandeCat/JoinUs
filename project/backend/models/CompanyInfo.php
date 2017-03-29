<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%company_info}}".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_desc
 * @property string $company_address
 * @property string $company_phone
 * @property string $company_index
 * @property string $company_type
 * @property string $company_scale
 * @property string $company_radio
 * @property string $company_logo
 */
class CompanyInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%company_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'company_name'], 'required'],
            [['company_id'], 'integer'],
            [['company_name', 'company_index', 'company_type', 'company_scale', 'company_radio'], 'string', 'max' => 50],
            [['company_desc', 'company_address'], 'string', 'max' => 250],
            [['company_phone'], 'string', 'max' => 20],
            [['company_logo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => '公司 ID',
            'company_name' => '公司 名称',
            'company_desc' => '公司 描述',
            'company_address' => '公司 地址',
            'company_phone' => '公司 电话',
            'company_index' => '公司 主页',
            'company_type' => '公司 性质',
            'company_scale' => '公司 规模',
            'company_radio' => '公司 阶段',
            'company_logo' => '公司 Logo',
        ];
    }
}
