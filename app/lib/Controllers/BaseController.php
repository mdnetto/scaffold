<?php

namespace Dvd_rental\Controllers;

abstract class BaseController {

    protected abstract function getResourceName();

    public function render($template, $data, $term = null) {
        $template = $this->getResourceName() . "/$template";
        include __DIR__ . "/../../templates/layout/application.php";
    }

    public function index() {
        $mapper = $this->getMapperInstance();
        $models = $mapper->all();
        $this->render('index.php', $models);
    }

    public function view($id, $col_name) {
        $mapper = $this->getMapperInstance();
        $model = $mapper->find($id, $col_name);
        $this->render('view.php', $model);
    }

    public function search($term) {
      $mapper = $this->getMapperInstance();
      $models = $mapper->searchForFilms($term);
      $this->render('index.php', $models, $term);
    }

    public function sortByCategory($category_id) {
      $mapper = $this->getMapperInstance();
      $models = $mapper->getFilmsByCategory($category_id);
      $this->render('index.php', $models, $category_id);
    }

    private function getMapperInstance() {
        $class = 'Dvd_rental\Mappers\\' . ucfirst($this->getResourceName()) . "Mapper";
        return new $class();
    }
}

