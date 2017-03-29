<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resume;

/**
 * ResumeSearch represents the model behind the search form about `app\models\Resume`.
 */
class ResumeSearch extends Resume
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resume_id', 'resume_acquiesce', 'person_id'], 'integer'],
            [['resume_name', 'resume_sex', 'resume_education', 'resume_experience', 'resume_phone', 'resume_email', 'resume_status', 'resume_head', 'resume_workE', 'resume_projectE', 'resume_educational', 'resume_introduction', 'resume_production', 'resume_expectW'], 'safe'],
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
        $query = Resume::find();

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
            'resume_id' => $this->resume_id,
            'resume_acquiesce' => $this->resume_acquiesce,
            'person_id' => $this->person_id,
        ]);

        $query->andFilterWhere(['like', 'resume_name', $this->resume_name])
            ->andFilterWhere(['like', 'resume_sex', $this->resume_sex])
            ->andFilterWhere(['like', 'resume_education', $this->resume_education])
            ->andFilterWhere(['like', 'resume_experience', $this->resume_experience])
            ->andFilterWhere(['like', 'resume_phone', $this->resume_phone])
            ->andFilterWhere(['like', 'resume_email', $this->resume_email])
            ->andFilterWhere(['like', 'resume_status', $this->resume_status])
            ->andFilterWhere(['like', 'resume_head', $this->resume_head])
            ->andFilterWhere(['like', 'resume_workE', $this->resume_workE])
            ->andFilterWhere(['like', 'resume_projectE', $this->resume_projectE])
            ->andFilterWhere(['like', 'resume_educational', $this->resume_educational])
            ->andFilterWhere(['like', 'resume_introduction', $this->resume_introduction])
            ->andFilterWhere(['like', 'resume_production', $this->resume_production])
            ->andFilterWhere(['like', 'resume_expectW', $this->resume_expectW]);

        return $dataProvider;
    }
}
