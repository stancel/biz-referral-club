<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\REFERRALRECEIVED;

/**
 * ReferralReceivedSearch represents the model behind the search form about `app\models\REFERRALRECEIVED`.
 */
class ReferralReceivedSearch extends REFERRALRECEIVED
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RECEIVED_ID', 'MEMBER_ID', 'REFERRAL_ID'], 'integer'],
            [['COMMENTS'], 'safe'],
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
        $query = REFERRALRECEIVED::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'RECEIVED_ID' => $this->RECEIVED_ID,
            'MEMBER_ID' => $this->MEMBER_ID,
            'REFERRAL_ID' => $this->REFERRAL_ID,
        ]);

        $query->andFilterWhere(['like', 'COMMENTS', $this->COMMENTS]);

        return $dataProvider;
    }
}
