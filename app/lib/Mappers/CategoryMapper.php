<?php

namespace Dvd_rental\Mappers;

class CategoryMapper extends BaseMapper {

    protected function getModelClass() {
        return '\Dvd_rental\Models\CategoryModel';
    }

    protected function getTableName() {
        return 'category';
    }
}
