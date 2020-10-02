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
 * @property Staff1[] $staff_1
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
            [['dep_name', 'dep_desciption', 'created_at', 'updated_at'], 'required', 'message' => '{attribute} không được để trống'],
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
            'dep_name' => 'Tên phòng ban',
            'dep_desciption' => 'Thông tin thêm',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }

    /**
     * Gets query for [[Staff1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff1::className(), ['dep_id' => 'id']);
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
