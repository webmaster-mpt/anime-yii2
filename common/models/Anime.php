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
 * @property int $count_parts
 * @property string $poster
 * @property string|null $status
 * @property int $status_posts
 * @property string|null $age_raiting
 * @property string|null $year_released
 * @property string|null $description
 *
 * @property SplitAnime[] $splitAnimes
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
            [['key_anime_m', 'name_m', 'poster', 'description', 'age_raiting','year_released'], 'string'],
            [['count_parts','status_posts'], 'integer'],
            [['type', 'status'], 'string', 'max' => 10]
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
            'count_parts' => 'Количество частей',
            'status' => 'Статус',
            'age_raiting' => 'Возрастной рейтинг',
            'year_released' => 'Год выпуска',
            'description' => 'Описание',
            'status_posts' => 'Статус поста'
        ];
    }

    /**
     * Gets query for [[SplitAnimes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSplitAnimes()
    {
        return $this->hasMany(SplitAnime::class, ['anime_id' => 'id']);
    }
}
