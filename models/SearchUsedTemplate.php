<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsedTemplate;

/**
 * SearchUsedTemplate represents the model behind the search form of `app\models\UsedTemplate`.
 */
class SearchUsedTemplate extends UsedTemplate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['template_selected_id', 'is_used', 'template_id'], 'integer'],
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
        $query = UsedTemplate::find();

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
            'template_selected_id' => $this->template_selected_id,
            'is_used' => $this->is_used,
            'template_id' => $this->template_id,
        ]);

        return $dataProvider;
    }
}
