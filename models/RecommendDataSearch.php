<?php

namespace xiuchanghu\recommend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use xiuchanghu\recommend\models\RecommendData;

/**
 * RecommendDataSearch represents the model behind the search form about `xiuchanghu\recommend\models\RecommendData`.
 */
class RecommendDataSearch extends RecommendData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lid', 'pubtime'], 'integer'],
            [['subject', 'summary', 'img', 'url'], 'safe'],
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
        $query = RecommendData::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'lid' => $this->lid,
            'pubtime' => $this->pubtime,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
