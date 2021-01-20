<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "laboratories".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 */
class Laboratory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::class, ['id' => 'employee_id'])->viaTable('employee_laboratory', ['laboratory_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getLabTypes()
    {
        return $this->hasMany(LabType::class, ['id' => 'lab_type_id'])->viaTable('laboratory_laboratory_types', ['laboratory_id' => 'id']);
    }

    public function getAnalyzes()
    {
        return $this->hasMany(Analysis::class, ['laboratory_id' => 'id']);
    }
}
