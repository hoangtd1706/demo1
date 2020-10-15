<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $admin_name
 * @property int $admin_id
 * @property int $dep_id
 * @property string|null $admin_phone
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $admin_email
 *
 * @property Department $dep
 * @property Staff $admin
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_name', 'admin_id', 'dep_id'], 'required'],
            [['admin_id', 'dep_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['admin_name', 'admin_phone', 'admin_email'], 'string', 'max' => 255],
            [['admin_id'], 'unique'],
            [['dep_id'], 'unique'],
            [['dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['dep_id' => 'id']],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['admin_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'admin_name' => Yii::t('app', 'Admin Name'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'dep_id' => Yii::t('app', 'Dep ID'),
            'admin_phone' => Yii::t('app', 'Admin Phone'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'admin_email' => Yii::t('app', 'Admin Email'),
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

    /**
     * Gets query for [[Admin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Staff::className(), ['id' => 'admin_id']);
    }
}
