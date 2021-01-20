<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lab_types".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $type
 */
class LabType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    public function getAnalyzes()
    {
        return $this->hasMany(Analysis::class, ['lab_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getLaboratories()
    {
        return $this->hasMany(Laboratory::class, ['id' => 'laboratory_id'])->viaTable('laboratory_laboratory_types', ['lab_type_id' => 'id']);
    }
}
