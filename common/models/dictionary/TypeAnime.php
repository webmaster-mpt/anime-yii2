<?php
namespace common\models\dictionary;

use common\models\Anime;

Class TypeAnime extends Anime {

    public static array $type = [
        'film' => 'film',
        'series' => 'series',
        'OVA' => 'OVA',
        'chivi' => 'chivi'
    ];
}