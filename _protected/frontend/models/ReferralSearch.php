<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\REFERRALS;

/**
 * ReferralSearch represents the model behind the search form about `app\models\REFERRALS`.
 */
class ReferralSearch extends REFERRALS
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['REFERRAL_ID'], 'integer'],
            [['REFERRAL_NAME', 'ADDRESS', 'CITY', 'STATE', 'ZIP', 'EMAIL', 'PHONE', 'COMMENTS'], 'safe'],
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
        $query = REFERRALS::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'REFERRAL_ID' => $this->REFERRAL_ID,
        ]);

        $query->andFilterWhere(['like', 'REFERRAL_NAME', $this->REFERRAL_NAME])
            ->andFilterWhere(['like', 'ADDRESS', $this->ADDRESS])
            ->andFilterWhere(['like', 'CITY', $this->CITY])
            ->andFilterWhere(['like', 'STATE', $this->STATE])
            ->andFilterWhere(['like', 'ZIP', $this->ZIP])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE])
            ->andFilterWhere(['like', 'COMMENTS', $this->COMMENTS]);

        return $dataProvider;
    }
}
