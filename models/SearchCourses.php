<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Courses;

class SearchCourses extends Courses
{
   
    public function rules()
    {
        return [
            [['code', 'name', 'detail', 'course_outline', 'date_open', 'date_end', 'place',  'comment'], 'safe'],
            [['seat_num'], 'integer'],
            [['cost'], 'number'],
        ];
    }

  
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Courses::find()
        ->where(['status' => '1']);

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
            'date_open' => $this->date_open,
            'date_end' => $this->date_end,
            'seat_num' => $this->seat_num,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'course_outline', $this->course_outline])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
