<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarifs".
 *
 * @property integer $id
 * @property integer $tarif_id
 * @property string $tarif_name
 * @property string $tarif_cost
 * @property integer $tarif_time
 */
class Tarifs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tarifs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tarif_id', 'tarif_name', 'tarif_cost', 'tarif_time'], 'required'],
            [['tarif_id', 'tarif_time'], 'integer'],
            [['tarif_name', 'tarif_cost'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tarif_id' => 'Tarif ID',
            'tarif_name' => 'Tarif Name',
            'tarif_cost' => 'Tarif Cost',
            'tarif_time' => 'Tarif Time',
        ];
    }
}
