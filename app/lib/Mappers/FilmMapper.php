<?php

namespace Dvd_rental\Mappers;

class FilmMapper extends BaseMapper {

    protected function getModelClass() {
      return '\Dvd_rental\Models\FilmModel';
    }

    protected function getTableName() {
      return'film';
    }

    //how can I use question marks here as on line 26?
    //move this to search mapper
    public function searchForFilms($term) {
        //when I change $term to ? it no work, why?
        $statement = $this->pdo->prepare("select f.film_id, f.title, f.rental_rate, f.release_year, fa.actor_id, a.first_name, a.last_name from film f
            join film_actor fa on fa.film_id = f.film_id join actor a on fa.actor_id = a.actor_id
            where f.title like '%$term%' or a.first_name like '%$term%' or a.last_name like '%$term%'
            group by f.film_id order by f.title, a.actor_id");
        //how come I don't have to pass in $term to execute?  line 51
        $statement->execute();
        $results = $statement->fetchAll();
        $models = [];
        foreach($results as $result) {
          array_push($models, $this->hydrateModel($result));
        }
        return $models;
    }

    public function getFilmsByCategory($category_id) {
      $statement = $this->pdo->prepare("select f.film_id, f.title, f.rental_rate, f.release_year from film f
            join film_category fc on fc.film_id = f.film_id join category c on fc.category_id = c.category_id
            where c.category_id = '$category_id'");
      $statement->execute();
      $results = $statement->fetchAll();
      $models = [];
      foreach($results as $result) {
        array_push($models, $this->hydrateModel($result));
      }
      return $models;
    }
}
