<?php

use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

/** @var yii\web\View $this */

$this->title = 'Категория';
$this->registerCssFile('../css/test.css');
?>
<div class="grid">
    <?php foreach ($model as $m) { ?>
        <figure class="cardM">
            <img src="https://drive.google.com/uc?export=view&id=<?= $m->poster ?>" alt="" height="432" width="296" class="card__image">
            <figcapiton class="card__body">
                <a href="anime-parts?id=<?= $m->id ?>" class="card__title btn"><?= $m->name_m ?></a>
            </figcapiton>
        </figure>
    <?php } ?>
</div>
