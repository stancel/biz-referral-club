<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LEADERSHIPROLES;

/**
 * RoleSearch represents the model behind the search form about `app\models\LEADERSHIPROLES`.
 */
class RoleSearch extends LEADERSHIPROLES
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LEADERSHIP_ROLE_ID'], 'integer'],
            [['ROLE_NAME', 'ROLE_DESCRIPTION'], 'safe'],
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
        $query = LEADERSHIPROLES::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'LEADERSHIP_ROLE_ID' => $this->LEADERSHIP_ROLE_ID,
        ]);

        $query->andFilterWhere(['like', 'ROLE_NAME', $this->ROLE_NAME])
            ->andFilterWhere(['like', 'ROLE_DESCRIPTION', $this->ROLE_DESCRIPTION]);

        return $dataProvider;
    }
}
