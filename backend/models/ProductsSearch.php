<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `backend\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quantity', 'price', 'promotional_price', 'id_category', 'id_brand', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'describe', 'detail_des', 'image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'promotional_price' => $this->promotional_price,
            'id_category' => $this->id_category,
            'id_brand' => $this->id_brand,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'describe', $this->describe])
            ->andFilterWhere(['like', 'detail_des', $this->detail_des])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
