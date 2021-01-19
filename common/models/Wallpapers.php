<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wallpapers".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 */
class Wallpapers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wallpapers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'image', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
