<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "os_category".
 *
 * @property int $id
 * @property string $title
 * @property int $status
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 */
class OsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'os_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['title', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
