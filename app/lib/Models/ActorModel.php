<?php

namespace Dvd_rental\Models;

class ActorModel extends BaseModel {

    protected $field_map = [
        'actor_id' => self::TYPE_INT,
        'first_name' => self::TYPE_STRING,
        'last_name' => self::TYPE_STRING,
        'last_update' => self::TYPE_STRING,
    ];
}

