<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "staffnclub".
 *
 * @property int $id
 * @property int|null $club_id
 * @property int|null $staff_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Club $club
 * @property Staff $staff
 */
class Staffnclub extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staffnclub';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_id', 'staff_id', 'created_at', 'updated_at'], 'integer'],
            [['club_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_id' => 'id']],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['staff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'club_id' => Yii::t('app', 'Club ID'),
            'staff_id' => Yii::t('app', 'Staff ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Club]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_id']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['id' => 'staff_id']);
    }
}
