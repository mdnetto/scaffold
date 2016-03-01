<?php

namespace Dvd_rental\Mappers;

class ActorMapper extends BaseMapper {

    protected function getModelClass() {
        return '\Dvd_rental\Models\ActorModel';
    }

    protected function getTableName() {
        return 'actor';
    }
}
