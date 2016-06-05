<?php

namespace Dvd_rental\Models;

class FilmModel extends BaseModel {

    protected $field_map = [
        'film_id' => self::TYPE_STRING,
        'title' => self::TYPE_STRING,
        'description' => self::TYPE_STRING,
        'release_year' => self::TYPE_STRING,
        'rental_rate' => self::TYPE_DECIMAL
    ];
}

