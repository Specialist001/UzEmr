<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "analyzes".
 *
 * @property int $id
 * @property int|null $reception_id
 * @property int|null $laboratory_id
 * @property int $employee_id
 * @property int $lab_type_id
 * @property int $patient_id
 * @property string|null $description
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Analysis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'analyzes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reception_id', 'laboratory_id', 'employee_id', 'lab_type_id', 'patient_id', 'created_at', 'updated_at'], 'integer'],
            [['employee_id', 'lab_type_id', 'patient_id'], 'required'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reception_id' => 'Reception ID',
            'laboratory_id' => 'Laboratory ID',
            'employee_id' => 'Employee ID',
            'lab_type_id' => 'Lab Type ID',
            'patient_id' => 'Patient ID',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
