<?php

use yii\helpers\Html;

?>
<title>Главная</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="../css/search.css">
<div class="group-block">
    <div class="form-group">
        <input type="text" class="searchInput">
        <div class="logo">
            <a href="site/profile"><img src="../uploads/<?= !empty($user) ? $user->avatar : 'avatar.svg' ?>" alt=""></a>
        </div>
        <a href="site/category" class="btn catBtn">Категория</a>
        <?php if (Yii::$app->user->isGuest) { ?>
        <a href="site/login" class="btn authBtn">Авторизация</a>
        <?php } else { ?>
            <?= Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
            'Выйти (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn logoutBtn']
            )
            . Html::endForm();
         } ?>
    </div>
</div>
<div class="container">
    <div class="m-grid">
        <?php foreach ($model as $m) { ?>
            <div class="m-card hidden">
                <p><?= $m->name_m ?></p>
                <img src="https://drive.google.com/uc?export=view&id=<?= $m->poster ?>">
                <a href="site/anime-parts?id=<?= $m->id ?>" class="btn btn-danger">Смотреть</a>
            </div>
        <?php } ?>
    </div>
</div>
<script src="../js/search.js"></script>


