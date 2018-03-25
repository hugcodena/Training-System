<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Organization;

/**
 * SearchOrganization represents the model behind the search form of `app\models\Organization`.
 */
class SearchOrganization extends Organization
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_code'], 'integer'],
            [['org_name', 'address', 'tel', 'img_logo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Organization::find();

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
            'org_code' => $this->org_code,
        ]);

        $query->andFilterWhere(['like', 'org_name', $this->org_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'img_logo', $this->img_logo]);

        return $dataProvider;
    }
}
