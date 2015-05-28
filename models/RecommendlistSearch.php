<?php

namespace xiuchanghu\recommend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use xiuchanghu\recommend\models\RecommendList;

/**
 * RecommendlistSearch represents the model behind the search form about `xiuchanghu\recommend\models\RecommendList`.
 */
class RecommendlistSearch extends RecommendList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lid', 'fontnum', 'width', 'height'], 'integer'],
            [['name', 'filedir'], 'safe'],
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
        $query = RecommendList::find();

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
            'lid' => $this->lid,
            'fontnum' => $this->fontnum,
            'width' => $this->width,
            'height' => $this->height,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'filedir', $this->filedir]);

        return $dataProvider;
    }
}
