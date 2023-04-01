<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anime_parts".
 *
 * @property int $id
 * @property string $key_anime_p
 * @property string $name_anime_p
 * @property string|null $poster
 * @property int $number_p
 * @property string $source
 * @property string $path_n
 * @property string|null $status_upload
 *
 */
class AnimeParts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anime_parts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key_anime_p', 'name_anime_p', 'number_p', 'path_n'], 'required'],
            [['key_anime_p', 'name_anime_p', 'poster', 'source', 'path_n', 'status_upload'], 'string'],
            [['number_p'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key_anime_p' => 'ключ части',
            'name_anime_p' => 'название части',
            'poster' => 'постер',
            'path_n' => 'имя папки',
            'number_p' => 'номер части',
            'source' => 'источник',
            'status_upload' => 'статус загрузки',
        ];
    }
}
