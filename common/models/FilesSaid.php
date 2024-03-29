<?php

namespace common\models;

use Yii;
use common\models\OsCategory;
use common\models\OsComments;

/**
 * This is the model class for table "files_said".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $os_file
 * @property string $image
 * @property int $status
 * @property string $category
 * @property string $comments
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 */
class FilesSaid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files_said';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['name', 'description', 'os_file', 'created_by', 'updated_by'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'os_file', 'image', 'created_by', 'category', 'comments', 'updated_by'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'category' => 'Category',
            'comments' => 'Comments',
            'os_file' => 'Os File',
            'image' => 'Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
    public function  getCategoryt(){
        return $this->hasOne(OsCategory::class,['id' => 'category'])->where(['status'=>1]);
    }
    public function  getCommentst(){
        return $this->hasOne(OsComments::class,['id' => 'comments'])->where(['status'=>1]);
    }
}
