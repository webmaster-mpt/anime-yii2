<?php
namespace common\models\dictionary;

use common\models\Anime;

Class AgeRaiting extends Anime {

    public static array $age_raiting = [
        '0' => 'PG-0',
        '13' => 'PG-13',
        '16' => 'PG-16',
        '18' => 'PG-18'
    ];
}