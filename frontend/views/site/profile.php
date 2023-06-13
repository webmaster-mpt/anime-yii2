<?php

use yii\helpers\Html;

$this->title = 'Профиль';
$this->registerCssFile('@web/css/profile.css');
?>
<div class="row">
    <div class="col-lg-4">
        <div class="logo">
            <img src="/uploads/avatar.svg" alt="" class="profile_av">
        </div>
    </div>
    <div class="col">
        <div class="username">
            <h1>Rize</h1>
        </div>
        <div class="stat_user">
            <a href="save-anime?user_id=<?= Yii::$app->user->id ?>" id="stat_a">Сохранённые аниме</a>
            <a href="see_anime" id="stat_a">Просмотренные аниме</a>
        </div>
    </div>
</div>


