<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "levels".
 *
 * @property integer $id
 * @property integer $level_id
 * @property string $level_name
 */
class Levels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'levels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id', 'level_name'], 'required'],
            [['level_id'], 'integer'],
            [['level_name'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_id' => 'Level ID',
            'level_name' => 'Level Name',
        ];
    }
}
