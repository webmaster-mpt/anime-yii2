<?php
namespace common\models\dictionary;

use common\models\Anime;

Class Status extends Anime {

    public static array $status = [
        'анонс' => 'анонс',
        'скоро' => 'скоро',
        'вышел' => 'вышел',
        'выпускается' => 'выпускается'
    ];
}