<?php

namespace Dvd_rental\Mappers;

class FilmMapper extends BaseMapper {

    protected function getModelClass() {
      return '\Dvd_rental\Models\FilmModel';
    }

    protected function getTableName() {
      return'film';
    }
}
