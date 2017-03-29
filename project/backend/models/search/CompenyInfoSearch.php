<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CompanyInfo;

/**
 * CompenyInfoSearch represents the model behind the search form about `app\models\CompanyInfo`.
 */
class CompenyInfoSearch extends CompanyInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id'], 'integer'],
            [['company_name', 'company_desc', 'company_address', 'company_phone', 'company_index', 'company_type', 'company_scale', 'company_radio', 'company_logo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CompanyInfo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_desc', $this->company_desc])
            ->andFilterWhere(['like', 'company_address', $this->company_address])
            ->andFilterWhere(['like', 'company_phone', $this->company_phone])
            ->andFilterWhere(['like', 'company_index', $this->company_index])
            ->andFilterWhere(['like', 'company_type', $this->company_type])
            ->andFilterWhere(['like', 'company_scale', $this->company_scale])
            ->andFilterWhere(['like', 'company_radio', $this->company_radio])
            ->andFilterWhere(['like', 'company_logo', $this->company_logo]);

        return $dataProvider;
    }
}
