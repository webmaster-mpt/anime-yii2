<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_data".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $anime_id
 * @property string|null $status
 *
 * @property Anime $anime
 * @property User $user
 */
class UserData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'anime_id'], 'integer'],
            [['status'], 'string', 'max' => 50],
            [['anime_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anime::class, 'targetAttribute' => ['anime_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'anime_id' => 'Аниме',
            'status' => 'Статус',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function saveValid($user_id, $anime_id){
        $query = UserData::find()->where(['user_id' => $user_id])->andWhere(['anime_id' => $anime_id])->one();
        if(!empty($query)){
            return true;
        }
    }
}
