<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $staff_name
 * @property string $staff_email
 * @property string $staff_tel
 * @property string $staff_depart
 * @property int|null $dep_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Department $dep
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_name', 'staff_email', 'staff_tel', 'created_at', 'updated_at'], 'required'],
            [['dep_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['staff_name', 'staff_email', 'staff_tel'], 'string', 'max' => 255],
            [['staff_email'], 'unique'],
            [['dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['dep_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staff_name' => 'Staff Name',
            'staff_email' => 'Staff Email',
            'staff_tel' => 'Staff Tel',
            'dep_id' => 'Dep ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Dep]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDep()
    {
        return $this->hasOne(Department::className(), ['id' => 'dep_id']);
    }
}
