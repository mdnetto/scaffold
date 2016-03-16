<?php

namespace Dvd_rental\Mappers;

use \Dvd_rental\Helpers\Connection;
use \Dvd_rental\Models\BaseModel;

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
        $statement = $this->pdo->prepare("SELECT * FROM {$this->getTableName()} WHERE $col_name =?");
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

    //how can I use question marks here as on line 26?
    public function searchForFilms($term) {
        //when I change $term to ? it no work, why?
        $statement = $this->pdo->prepare("select f.film_id, f.title, f.rental_rate, f.release_year, fa.actor_id, a.first_name, a.last_name from film f
            join film_actor fa on fa.film_id = f.film_id join actor a on fa.actor_id = a.actor_id
            where title like '%$term%' or a.first_name like '%$term%' or a.last_name like '%$term%'
            group by f.film_id order by a.actor_id, f.title");
        //how come I don't have to pass in $term to execute?  line 51
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
