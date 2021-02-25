<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module_lessons".
 *
 * @property int $id
 * @property string $lasson_name
 * @property int $group_id
 * @property int $weekday
 * @property int $lesson_order
 * @property int $teacher_id
 * @property int $cab
 *
 * @property ModuleGroup $group
 * @property ModuleUsers $teacher
 * @property ModulePassedLessons[] $modulePassedLessons
 */
class ModuleLessons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module_lessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lasson_name', 'group_id', 'weekday', 'lesson_order', 'teacher_id', 'cab'], 'required'],
            [['group_id', 'weekday', 'lesson_order', 'teacher_id', 'cab'], 'integer'],
            [['lasson_name'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModuleGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModuleUsers::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lasson_name' => 'Lasson Name',
            'group_id' => 'Group ID',
            'weekday' => 'Weekday',
            'lesson_order' => 'Lesson Order',
            'teacher_id' => 'Teacher ID',
            'cab' => 'Cab',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(ModuleGroup::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(ModuleUsers::className(), ['id' => 'teacher_id']);
    }

    /**
     * Gets query for [[ModulePassedLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModulePassedLessons()
    {
        return $this->hasMany(ModulePassedLessons::className(), ['lessons_id' => 'id']);
    }
}
