<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "receptions".
 *
 * @property int $id
 * @property int $clinic_id
 * @property int $patient_id
 * @property int $doctor_id
 * @property int $employee_id
 * @property int|null $laboratory_id
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Reception extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clinic_id', 'patient_id', 'doctor_id', 'employee_id'], 'required'],
            [['clinic_id', 'patient_id', 'doctor_id', 'employee_id', 'laboratory_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clinic_id' => 'Clinic ID',
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'employee_id' => 'Employee ID',
            'laboratory_id' => 'Laboratory ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getClinic()
    {
        return $this->hasOne(Clinic::class, ['id' => 'clinic_id']);
    }

    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['id' => 'patient_id']);
    }

    public function getDoctor()
    {
        return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
    }

    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

    public function getLaboratory()
    {
        return $this->hasOne(Laboratory::className(), ['id' => 'laboratory_id']);
    }

    /**
     * Analyzes of receptions
     * @return \yii\db\ActiveQuery
     */
    public function getAnalyzes()
    {
        return $this->hasMany(Analysis::class, ['reception_id' => 'id']);
    }
}
