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

//  public function displayCategories() {
//    $mapper = $this->getMapperInstance();
//    $models = $mapper->all();
//    $this->render('results.php', $models);
//  }
}
