<?php

namespace Scaffold\Mappers;

use \Scaffold\Helpers\Connection;
use \Scaffold\Models\BaseModel;

abstract class BaseMapper {

    protected $pdo;
    protected abstract function getModelClass();
    protected abstract function getTableName();

    public function __construct() {
        $this->pdo = Connection::getInstance();
    }

    protected function hydrateModel(array $raw_result) {
        $class = $this->getModelClass();
        $model = new $class();
        $model->hydrate($raw_result);
        return $model;
    }

    public function find($id, $col_name) {
        $statement = $this->pdo->prepare("SELECT * FROM {$this->getTableName()} WHERE {$col_name} =?");
        $statement->execute([$id]);
        $result = $statement->fetch();
        return $this->hydrateModel($result);
    }

    public function all() {
        $statement = $this->pdo->prepare("SELECT * FROM {$this->getTableName()} ");
        $statement->execute();
        $results = $statement->fetchAll();
        $models = [];
        foreach($results as $result) {
            array_push($models, $this->hydrateModel($result));
        }
        return $models;
    }

    public function create($model) {
        $query = "INSERT INTO {$this->getTableName()} (";
        $keys = $model->getNonIdFieldKeys();
        $query .= join(", ", $keys) . ") VALUES (";
        $query .= join(", ", array_fill(0, count($keys), "?")) . ")";
        $values = [];
        foreach($keys as $key) {
            array_push($values, $model->$key);
        }
        $statement = $this->pdo->prepare($query);
        $statement->execute($values);
    }
}
