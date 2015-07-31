<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ATTENDANCE;

/**
 * AttendanceSearch represents the model behind the search form about `app\models\ATTENDANCE`.
 */
class AttendanceSearch extends ATTENDANCE
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ATTENDANCE_ID', 'MEMBER_ID', 'MEETING_ID'], 'integer'],
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
        $query = ATTENDANCE::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ATTENDANCE_ID' => $this->ATTENDANCE_ID,
            'MEMBER_ID' => $this->MEMBER_ID,
            'MEETING_ID' => $this->MEETING_ID,
        ]);

        return $dataProvider;
    }
}
