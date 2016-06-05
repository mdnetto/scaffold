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

    public function getMapperInstance() {
        $class = 'Dvd_rental\Mappers\\' . ucfirst($this->getResourceName()) . "Mapper";
        return new $class();
    }
}

