<?php

namespace Scaffold\Mappers;

class ActorMapper extends BaseMapper {

    protected function getModelClass() {
        return '\Scaffold\Models\ActorModel';
    }

    protected function getTableName() {
        return 'actor';
    }
}
