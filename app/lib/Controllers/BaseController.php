<?php

namespace Dvd_rental\Controllers;

abstract class BaseController {

    protected abstract function getResourceName();

    public function render($template, $data) {
        $template = $this->getResourceName() . "/$template";
        include __DIR__ . "/../../templates/layout/application.php";
    }

    public function index() {
        $mapper = $this->getMapperInstance();
        $models = $mapper->all();
        $this->render('index.php', $models);
    }

    public function view($id) {
        $mapper = $this->getMapperInstance();
        $model = $mapper->find($id);
        $this->render('view.php', $model);
    }

    private function getMapperInstance() {
        $class = 'Company\Mappers\\' . ucfirst($this->getResourceName()) . "Mapper";
        return new $class();
    }
}
