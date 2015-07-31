<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\OFFICELOCATIONS;

/**
 * OfficeLocationSearch represents the model behind the search form about `app\models\OFFICELOCATIONS`.
 */
class OfficeLocationSearch extends OFFICELOCATIONS
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OFFICE_LOCATION_ID', 'COMPANY_ID'], 'integer'],
            [['STREET_ADDRESS', 'CITY', 'STATE', 'ZIP', 'PHONE', 'FAX', 'BRANCH_NUMBER'], 'safe'],
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
        $query = OFFICELOCATIONS::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'OFFICE_LOCATION_ID' => $this->OFFICE_LOCATION_ID,
            'COMPANY_ID' => $this->COMPANY_ID,
        ]);

        $query->andFilterWhere(['like', 'STREET_ADDRESS', $this->STREET_ADDRESS])
            ->andFilterWhere(['like', 'CITY', $this->CITY])
            ->andFilterWhere(['like', 'STATE', $this->STATE])
            ->andFilterWhere(['like', 'ZIP', $this->ZIP])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE])
            ->andFilterWhere(['like', 'FAX', $this->FAX])
            ->andFilterWhere(['like', 'BRANCH_NUMBER', $this->BRANCH_NUMBER]);

        return $dataProvider;
    }
}
