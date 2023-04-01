<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anime".
 *
 * @property int $id
 * @property string $type
 * @property string $key_anime_m
 * @property string $name_m
 * @property string $poster
 * @property int $count_parts
 *
 */
class Anime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anime';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'key_anime_m', 'name_m', 'count_parts', 'poster'], 'required'],
            [['key_anime_m','name_m', 'poster'], 'string'],
            [['count_parts'], 'integer'],
            [['type'], 'string', 'max' => 10]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'key_anime_m' => 'Ключ',
            'name_m' => 'Главное название',
            'poster' => 'Постер',
            'count_parts' => 'Количество частей'
        ];
    }
}
