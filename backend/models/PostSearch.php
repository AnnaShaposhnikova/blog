<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;//чтоб находить все посты с deleted at

/**
 * UserSearch represents the model behind the search form of `common\models\User`.
 */
class PostSearch extends Post
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'content',  'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' =>10
            ],
            'sort' =>[
                'attributes'=>[
                    'created_at' =>[
                        'asc' =>['created_at'=>SORT_ASC],
                        'desc' =>['created_at'=>SORT_DESC],
                        'label' =>'created_at',
                    ],
                    'name' => [
                        'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                        'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'Name',
                    ],

                ]
            ]

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

        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'deleted_at' => $this->deleted_at,
    ]);

    $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
