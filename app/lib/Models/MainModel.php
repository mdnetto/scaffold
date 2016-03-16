<?php

namespace Dvd_rental\Models;

class MainModel extends BaseModel {

    protected $field_map = [
        'film_id' => self::TYPE_INT,
        'title' => self::TYPE_STRING,
        'rental_rate' => self::TYPE_INT,
        'release_year' => self::TYPE_STRING,
        'actor_id' => self::TYPE_INT,
        'first_name' => self::TYPE_STRING,
        'last_name' => self::TYPE_STRING,
    ];
}

