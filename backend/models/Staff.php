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
 * @property string $dep_name
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Department $depName
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
            [['staff_name', 'staff_email', 'staff_tel', 'dep_name', 'created_at', 'updated_at'], 'required', 'message' => '{attribute} không được để trống!'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['staff_name', 'staff_email', 'staff_tel', 'dep_name'], 'string', 'max' => 255],
            [['staff_email'], 'unique', 'message' => '{attribute} không được trùng!'],
            [['dep_name'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['dep_name' => 'dep_name']],
            [
                ['staff_name'] , 'filter', 'filter' => function($value) {
                    return trim(htmlentities(strip_tags($value), ENT_QUOTES, 'UTF-8'));
                }
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'staff_name' => Yii::t('app', 'Tên nhân viên'),
            'staff_email' => Yii::t('app', 'Email'),
            'staff_tel' => Yii::t('app', 'Số điện thoại'),
            'dep_name' => Yii::t('app', 'Phòng ban'),
            'status' => Yii::t('app', 'Trạng thái'),
            'created_at' => Yii::t('app', 'Ngày tạo'),
            'updated_at' => Yii::t('app', 'Ngày cập nhật'),
        ];
    }

    /**
     * Gets query for [[DepName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepName()
    {
        return $this->hasOne(Department::className(), ['dep_name' => 'dep_name']);
    }
}
