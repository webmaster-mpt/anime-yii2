<?php

/** @var yii\web\View $this */

$this->title = 'Home';
$this->registerCssFile('../css/style-m.css');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="../css/search.css">
<div class="group-block">
    <div class="form-group">
        <div class="ico">
        </div>
        <input type="text" class="searchInput">
        <div class="logo">
            <img src="../avatar.svg" alt="">
        </div>
        <a href="site/category" class="btn catBtn">Категория</a>
    </div>
</div>
<div class="container">
    <div class="m-grid">
        <?php foreach ($model as $m) { ?>
            <div class="m-card hidden">
                <p><?= $m->name_m ?></p>
                <img src="https://drive.google.com/uc?export=view&id=<?= $m->poster ?>">
                <a href="anime-parts?id=<?= $m->id ?>" class="btn btn-danger">Смотреть</a>
            </div>
        <?php } ?>
    </div>
</div>
<script src="../js/search.js"></script>


