<?php

namespace app\models;

use Yii;
use app\models;

/**
 * This is the model class for table "yii_company_info".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_describe
 * @property string $company_address
 * @property string $company_phone
 * @property string $company_index
 * @property string $company_type
 * @property string $company_logo
 */
class YiiCompanyInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_company_info';
    }
     public function create($data)//AR模式1
    {
         
        $this->setAttributes($data);//载入数据
        return $this->insert();//返回结果
         
    } 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'company_name'], 'required'],
            [['company_id'], 'integer'],
            [['company_name', 'company_index', 'company_type','company_scale','company_radio'], 'string', 'max' => 255],
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
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_desc' => 'Company Describe',
            'company_address' => 'Company Address',
            'company_phone' => 'Company Phone',
            'company_index' => 'Company Index',
            'company_type' => 'Company Type',
            'company_logo' => 'Company Logo',
        ];
    }
    //查询公司详情
    public function select($id)
    {
        return YiiCompanyInfo::find()->where(['company_id' => $id])->asarray()->one();
    }
}
