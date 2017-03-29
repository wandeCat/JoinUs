<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Job;

/**
 * JobSearch represents the model behind the search form about `app\models\Job`.
 */
class JobSearch extends Job
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'job_company_id', 'job_addtime', 'job_status'], 'integer'],
            [['job_name', 'job_nature', 'job_trade', 'job_city', 'job_district', 'job_tag', 'job_education', 'job_experience', 'job_wage', 'job_contents', 'job_email', 'job_hot'], 'safe'],
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
        $query = Job::find();

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
            'job_id' => $this->job_id,
            'job_company_id' => $this->job_company_id,
            'job_addtime' => $this->job_addtime,
            'job_status' => $this->job_status,
        ]);

        $query->andFilterWhere(['like', 'job_name', $this->job_name])
            ->andFilterWhere(['like', 'job_nature', $this->job_nature])
            ->andFilterWhere(['like', 'job_trade', $this->job_trade])
            ->andFilterWhere(['like', 'job_city', $this->job_city])
            ->andFilterWhere(['like', 'job_district', $this->job_district])
            ->andFilterWhere(['like', 'job_tag', $this->job_tag])
            ->andFilterWhere(['like', 'job_education', $this->job_education])
            ->andFilterWhere(['like', 'job_experience', $this->job_experience])
            ->andFilterWhere(['like', 'job_wage', $this->job_wage])
            ->andFilterWhere(['like', 'job_contents', $this->job_contents])
            ->andFilterWhere(['like', 'job_email', $this->job_email])
            ->andFilterWhere(['like', 'job_hot', $this->job_hot]);

        return $dataProvider;
    }
}
