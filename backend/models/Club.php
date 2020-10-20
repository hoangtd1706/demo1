<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "club".
 *
 * @property int $id
 * @property string $club_name
 * @property string|null $club_description
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Staffnclub[] $staffnclubs
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_name'], 'required','message'=> '{attribute} không được để trống!'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['club_name'], 'string', 'max' => 50,'message'=> '{attribute} không được đặt quá dài!'],
            [['club_description'], 'string', 'max' => 255],
            //[['staff_id'],'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'club_name' => Yii::t('app', 'Tên câu lạc bộ'),
            'club_description' => Yii::t('app', 'Giới thiệu'),
            //'staff_id',
            'status' => Yii::t('app', 'Trạng thái'),
            'created_at' => Yii::t('app', 'Ngày tạo'),
            'updated_at' => Yii::t('app', 'Ngày cập nhật'),
        ];
    }

    /**
     * Gets query for [[Staffnclubs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffnclubs()
    {
        return $this->hasMany(Staffnclub::className(), ['club_id' => 'id']);
    }
}
