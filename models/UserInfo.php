<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $level
 * @property string $balans
 * @property integer $referals
 * @property string $bonus
 * @property integer $tarif
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'level', 'referals', 'tarif'], 'integer'],
            [['balans', 'bonus'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'level' => 'Level',
            'balans' => 'Balans',
            'referals' => 'Referals',
            'bonus' => 'Bonus',
            'tarif' => 'Tarif',
        ];
    }
}
