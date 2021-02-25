<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module_users".
 *
 * @property int $id
 * @property int $group_id
 * @property string $FIO
 * @property string $mail
 * @property int $role
 * @property string $login
 * @property string $password
 *
 * @property ModuleAditionalInfo[] $moduleAditionalInfos
 * @property ModuleLessons[] $moduleLessons
 * @property ModuleGroup $group
 */
class ModuleUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'FIO', 'mail', 'role', 'login', 'password'], 'required'],
            [['group_id', 'role'], 'integer'],
            [['FIO', 'mail', 'login', 'password'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => ModuleGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'FIO' => 'Fio',
            'mail' => 'Mail',
            'role' => 'Role',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[ModuleAditionalInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModuleAditionalInfos()
    {
        return $this->hasMany(ModuleAditionalInfo::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ModuleLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModuleLessons()
    {
        return $this->hasMany(ModuleLessons::className(), ['teacher_id' => 'id']);
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
}
