<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MEETINGS;

/**
 * MeetingSearch represents the model behind the search form about `app\models\MEETINGS`.
 */
class MeetingSearch extends MEETINGS
{
    
//    public function convertDate($date) 
//    {
//         //$savedDate = date_create_from_format("MM-dd-yyyy HH:mm", $date);
//         return date("m-d-Y g:i a", $date);
//    }
    
    
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEETING_ID'], 'integer'],
            [['MEETING_PLACE', 'DATE_AND_TIME'], 'safe'],
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
        $query = MEETINGS::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'MEETING_ID' => $this->MEETING_ID,
            'DATE_AND_TIME' => $this->DATE_AND_TIME,
        ]);

        $query->andFilterWhere(['like', 'MEETING_PLACE', $this->MEETING_PLACE]);

        return $dataProvider;
    }
}
