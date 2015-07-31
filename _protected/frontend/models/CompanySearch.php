<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\COMPANIES;

/**
 * CompanySearch represents the model behind the search form about `app\models\COMPANIES`.
 */
class CompanySearch extends COMPANIES
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COMPANY_ID'], 'integer'],
            [['COMPANY_NAME'], 'safe'],
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
        $query = COMPANIES::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'COMPANY_ID' => $this->COMPANY_ID,
        ]);

        $query->andFilterWhere(['like', 'COMPANY_NAME', $this->COMPANY_NAME]);

        return $dataProvider;
    }
}
