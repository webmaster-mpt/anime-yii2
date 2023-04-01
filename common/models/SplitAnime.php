<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "split_anime".
 *
 * @property int $id
 * @property int|null $anime_id
 * @property int|null $anime_parts_id
 *
 * @property Anime $anime
 * @property AnimeParts $animeParts
 */
class SplitAnime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'split_anime';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['anime_id', 'anime_parts_id'], 'integer'],
            [['anime_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anime::class, 'targetAttribute' => ['anime_id' => 'id']],
            [['anime_parts_id'], 'exist', 'skipOnError' => true, 'targetClass' => AnimeParts::class, 'targetAttribute' => ['anime_parts_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'anime_id' => 'Аниме',
            'anime_parts_id' => 'Аниме часть/серия',
        ];
    }

    /**
     * Gets query for [[Anime]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnime()
    {
        return $this->hasOne(Anime::class, ['id' => 'anime_id']);
    }

    /**
     * Gets query for [[AnimeParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimeParts()
    {
        return $this->hasOne(AnimeParts::class, ['id' => 'anime_parts_id']);
    }

    public function myValidate($anime_id, $anime_parts_id)
    {
        $query = SplitAnime::find()->where(['anime_id' => $anime_id])->andWhere(['anime_parts_id' => $anime_parts_id])->limit(1)->all();
        if(empty($query)){
            return true;
        } else {
            return false;
        }
    }
}
