<?php
    namespace app\models;
    use yii\base\Model;
    use yii\web\UploadedFile;
    /**
    * UploadForm is the model behind the upload form.
    */
    class UploadForm extends Model
    {
        /**
         * @var UploadedFile file attribute
         */
        public $company_logo;
        /**
         * @return array the validation rules.
         */
        public function rules()
        {
            return [
                [['company_logo'], 'file'],
            ];
        }
    }