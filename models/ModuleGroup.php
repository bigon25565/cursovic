<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module_group".
 *
 * @property int $id
 * @property string $number
 * @property string $spec
 *
 * @property ModuleLessons[] $moduleLessons
 * @property ModuleUsers[] $moduleUsers
 */
class ModuleGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'spec'], 'required'],
            [['number', 'spec'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'spec' => 'Spec',
        ];
    }

    /**
     * Gets query for [[ModuleLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModuleLessons()
    {
        return $this->hasMany(ModuleLessons::className(), ['group_id' => 'id']);
    }

    /**
     * Gets query for [[ModuleUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModuleUsers()
    {
        return $this->hasMany(ModuleUsers::className(), ['group_id' => 'id']);
    }
}
