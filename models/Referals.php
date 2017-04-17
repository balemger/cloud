<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "referals".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $parent1
 * @property integer $parent2
 * @property integer $parent3
 * @property integer $parent4
 * @property integer $parent5
 * @property integer $parent6
 * @property integer $parent7
 * @property integer $parent8
 * @property integer $parent9
 * @property integer $parent10
 * @property integer $parent11
 * @property integer $parent12
 * @property integer $parent13
 * @property integer $parent14
 * @property integer $parent15
 */
class Referals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'parent1', 'parent2', 'parent3', 'parent4', 'parent5', 'parent6', 'parent7', 'parent8', 'parent9', 'parent10', 'parent11', 'parent12', 'parent13', 'parent14', 'parent15'], 'integer'],
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
            'parent1' => 'Parent1',
            'parent2' => 'Parent2',
            'parent3' => 'Parent3',
            'parent4' => 'Parent4',
            'parent5' => 'Parent5',
            'parent6' => 'Parent6',
            'parent7' => 'Parent7',
            'parent8' => 'Parent8',
            'parent9' => 'Parent9',
            'parent10' => 'Parent10',
            'parent11' => 'Parent11',
            'parent12' => 'Parent12',
            'parent13' => 'Parent13',
            'parent14' => 'Parent14',
            'parent15' => 'Parent15',
        ];
    }
}
