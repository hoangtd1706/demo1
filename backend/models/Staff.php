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
 * @property int $dep_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Admin $admin
 * @property Department $dep
 * @property Staffnclub[] $staffnclubs
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
            [['staff_name', 'staff_email', 'staff_tel', 'dep_id', 'created_at', 'updated_at'], 'required', 'message'=>'{attribute} không được để trống!'],
            [['dep_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['staff_name', 'staff_email', 'staff_tel'], 'string', 'max' => 255],
            [['staff_email'], 'unique', 'message'=> '{attribute} đã tồn tại ở nhân viên khác!'],
            [['dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['dep_id' => 'id']],
            [
                ['staff_name'], 'filter', 'filter' =>function($value){
                    return trim(htmlentities(strip_tags($value), ENT_QUOTES, 'UTF-8'));
                }
            ],
            [['club_id'],'integer'],
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
            'club_id' => Yii::t('app', 'Cau lac bo'),
            'dep_id' => Yii::t('app', 'Phòng ban'),
            'status' => Yii::t('app', 'Trạng thái'),
            'created_at' => Yii::t('app', 'Ngày tạo'),
            'updated_at' => Yii::t('app', 'Ngày cập nhật'),
        ];
    }

    /**
     * Gets query for [[Admin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['admin_id' => 'id']);
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

    /**
     * Gets query for [[Staffnclubs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffnclubs()
    {
        return $this->hasMany(Staffnclub::className(), ['staff_id' => 'id']);
    }

    public static function getDepartList()
    {
        $data =  static::find()
            ->select(['dep_id', 'soft_name'])
            ->orderBy('soft_name')->asArray()->all();
        return ArrayHelper::map($data, 'soft_id', 'soft_name');
    }

}
