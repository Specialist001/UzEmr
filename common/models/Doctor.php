<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "doctors".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $speciality_id
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Specialty $speciality
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'speciality_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 100],
            [['user_id'], 'unique'],
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
            'speciality_id' => 'Speciality ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getSpeciality()
    {
        return $this->hasOne(Specialty::class, ['id' => 'speciality_id']);
    }

    public function getReceptions()
    {
        return $this->hasMany(Reception::class, ['doctor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getClinics()
    {
        return $this->hasMany(Clinic::class, ['id' => 'clinic_id'])->viaTable('clinic_doctor', ['doctor_id' => 'id']);
    }
}
