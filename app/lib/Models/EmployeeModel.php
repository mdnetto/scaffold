<?php

namespace Company\Models;

class EmployeeModel extends BaseModel {

    protected $field_map = [
        'emp_no' => self::TYPE_INT,
        'birth_date' => self::TYPE_STRING,
        'first_name' => self::TYPE_STRING,
        'last_name' => self::TYPE_STRING,
        'gender' => self::TYPE_STRING,
        'hire_date' => self::TYPE_STRING
    ];
}

