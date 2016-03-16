<?php

namespace Dvd_rental\Mappers;

class MainMapper extends BaseMapper {

    protected function getModelClass() {
        return '\Dvd_rental\Models\MainModel';
    }

    protected function getTableName() {
        return 'film';
    }
}
