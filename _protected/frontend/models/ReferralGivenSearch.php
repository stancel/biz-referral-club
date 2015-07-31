<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\REFERRALGIVEN;

/**
 * ReferralGivenSearch represents the model behind the search form about `app\models\REFERRALGIVEN`.
 */
class ReferralGivenSearch extends REFERRALGIVEN
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GIVEN_ID', 'MEMBER_ID', 'REFERRAL_ID', 'MEETING_ID'], 'integer'],
            [['GIVEN_YOUR_CARD', 'TOLD_THEM_YOU_WOULD_CALL', 'COMMENTS'], 'safe'],
        ];
    }

    //'referralName',
    
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
        //$query = REFERRALGIVEN::find();
        $query = REFERRALGIVEN::find()->joinWith(['rEFERRAL']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        /**
        * Setup your sorting attributes
        * Note: This is setup before the $this->load($params) 
        * statement below
        */
        $dataProvider->setSort([
            'attributes' => [
                'GIVEN_ID',
                'MEMBER_ID',
                'referralName' => [
                    'asc' => ['REFERRAL.REFERRAL_NAME' => SORT_ASC],
                    'desc' => ['REFERRAL.REFERRAL_NAME' => SORT_DESC],
                    'label' => 'Referral Name'
                ],
                'MEETING_ID'
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            //Brad
            //$query->joinWith(['rEFERRAL']);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'GIVEN_ID' => $this->GIVEN_ID,
            'MEMBER_ID' => $this->MEMBER_ID,
            'REFERRAL_ID' => $this->REFERRAL_ID,
            'MEETING_ID' => $this->MEETING_ID,
        ]);

        $query->andFilterWhere(['like', 'GIVEN_YOUR_CARD', $this->GIVEN_YOUR_CARD])
            ->andFilterWhere(['like', 'TOLD_THEM_YOU_WOULD_CALL', $this->TOLD_THEM_YOU_WOULD_CALL])
            ->andFilterWhere(['like', 'COMMENTS', $this->COMMENTS]);
        
        // filter by Referral name - Brad
//        $query->joinWith(['rEFERRAL'=>function ($q) {
//            $q->where('rEFERRAL.REFERRAL_NAME LIKE "%' .
//                $this->referralName . '%"');
//        }]);

        return $dataProvider;
    }
}
