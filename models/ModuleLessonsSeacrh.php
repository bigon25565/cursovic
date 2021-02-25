<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ModuleLessons;

/**
 * ModuleLessonsSeacrh represents the model behind the search form of `app\models\ModuleLessons`.
 */
class ModuleLessonsSeacrh extends ModuleLessons
{
    /**
     * {@inheritdoc}
     */
    public $FIO;
    public $number;

    public function rules()
    {
        return [
            [['id', 'group_id', 'weekday', 'lesson_order', 'teacher_id', 'cab'], 'integer'],
            [['lasson_name','FIO','number'], 'safe'],
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
        $query = ModuleLessons::find();
        $query->joinWith['Teacher'];
        $query->joinWith['Group'];

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['FIO'] = [
            'asc' => [ModuleUsers::tableName().'.FIO' => SORT_ASC],
            'desc' => [ModuleUsers::tableName().'.FIO' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['number'] = [
            'asc' => [ModuleGroup::tableName().'.number' => SORT_ASC],
            'desc' => [ModuleGroup::tableName().'.number' => SORT_DESC],
        ];

        $query->andFilterWhere(['like', ModuleUsers::tableName().'id', $this->teacher_id])
            ->andFilterWhere(['like', ModuleUsers::tableName().'.FIO', $this->FIO]);

        $query->andFilterWhere(['like', ModuleGroup::tableName().'id', $this->group_id])
            ->andFilterWhere(['like', ModuleGroup::tableName().'.number', $this->number]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'group_id' => $this->group_id,
            'weekday' => $this->weekday,
            'lesson_order' => $this->lesson_order,
            'teacher_id' => $this->teacher_id,
            'cab' => $this->cab,
        ]);

        $query->andFilterWhere(['like', 'lasson_name', $this->lasson_name]);

        return $dataProvider;
    }
}
