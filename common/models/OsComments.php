<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "os_comments".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $content
 * @property int $status
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_by
 * @property string $updated_at
 */
class OsComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'os_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['os_id', 'status'], 'integer'],
            [['name', 'email', 'created_at', 'created_by', 'updated_by', 'updated_at'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    public function  getFilecount(){
        return $this->hasMany(OsComments::class, ['cate' => 'id'])->where(['status'=>1])->count();
    }
}
