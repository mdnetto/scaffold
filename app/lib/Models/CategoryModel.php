<?php

namespace Dvd_rental\Models;

class CategoryModel extends BaseModel {

    protected $field_map = [
        'category_id' => self::TYPE_INT,
        'name' => self::TYPE_STRING
    ];
}

