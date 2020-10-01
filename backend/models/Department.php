<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $dep_name
 * @property string $dep_desciption
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Staff[] $staff
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dep_name', 'dep_desciption', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['dep_name', 'dep_desciption'], 'string', 'max' => 255],
            [['dep_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dep_name' => 'Dep Name',
            'dep_desciption' => 'Dep Desciption',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::className(), ['dep_id' => 'id']);
    }

    public function getAllActive(){
        $data = Department::find()->where(['status' => '1'])->all();
        return $data;
    }

    public function getOne($id){
        $data = Department::findOne($id);
        return $data;
    }

}
