<?php


namespace backend\models;
use common\models\Comment;
use common\models\Post;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class CommentSearch extends Comment
{
    public function rules()
    {
        return
        [
            [['id','user_id','post_id'],'integer'],
            ['comment','safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Comment::find();

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
                    'user' => [
                        'asc' => ['user_id' => SORT_ASC],
                        'desc' => ['user_id' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'User',
                    ],
                    'post' => [
                        'asc' => ['post_id' => SORT_ASC],
                        'desc' => ['post_id' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'Post',
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
            'user_id' => $this->user_id,
            'post_id' => $this->post_id,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

//        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }


}