<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MEMBERS;

/**
 * MemberSearch represents the model behind the search form about `app\models\MEMBERS`.
 */
class MemberSearch extends MEMBERS
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEMBER_ID', 'COMPANY_ID'], 'integer'],
            [['FIRST_NAME', 'LAST_NAME', 'PHONE_NUMBER', 'POSITION', 'IS_ACTIVE', 'EMAIL_ADDRESS', 'PASSWORD', 'JOINED_DATE', 'LEFT_DATE'], 'safe'],
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
        $query = MEMBERS::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'MEMBER_ID' => $this->MEMBER_ID,
            'JOINED_DATE' => $this->JOINED_DATE,
            'LEFT_DATE' => $this->LEFT_DATE,
            'COMPANY_ID' => $this->COMPANY_ID,
        ]);

        $query->andFilterWhere(['like', 'FIRST_NAME', $this->FIRST_NAME])
            ->andFilterWhere(['like', 'LAST_NAME', $this->LAST_NAME])
            ->andFilterWhere(['like', 'PHONE_NUMBER', $this->PHONE_NUMBER])
            ->andFilterWhere(['like', 'POSITION', $this->POSITION])
            ->andFilterWhere(['like', 'IS_ACTIVE', $this->IS_ACTIVE])
            ->andFilterWhere(['like', 'EMAIL_ADDRESS', $this->EMAIL_ADDRESS])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD]);

        return $dataProvider;
    }
}
