<?php

namespace Dvd_rental\Controllers;

class CategoryController extends BaseController {

  protected function getResourceName() {
      return "category";
  }

  public function showCategories() {
      $mapper = $this->getMapperInstance();
      return $mapper->all();
  }

  public function view($id, $col_name) {
    $film_mapper = new \Dvd_rental\Mappers\FilmMapper();
    $films = $film_mapper->getFilmsByCategory($id);
    $this->render('view.php', $films);
  }

}
