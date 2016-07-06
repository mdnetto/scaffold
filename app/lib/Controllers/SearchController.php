<?php

namespace Dvd_rental\Controllers;

class SearchController extends BaseController {

  protected function getResourceName() {
      return "film";
  }

  public function results() {
    if (isset($_POST['submit'])) {
        //if search string typed in, search dammit
        if (is_string($_POST['search_string'])) {
            $search_string = $_POST['search_string'];
            $this->search($search_string);
        }
    } else if (isset($_GET['id'])) {
        //view films by category, id is passed into url
        $category_id = $_GET['id'];
        $this->sortByCategory($category_id);
    } else {
        $this->search('');
    }
  }

  public function sortByCategory($category_id) {
      $mapper = $this->getMapperInstance();
      $models = $mapper->getFilmsByCategory($category_id);
      $this->render('results.php', $models, $category_id);
  }

  public function search($term) {
      $mapper = $this->getMapperInstance();
      $data = $this->getBaseTemplateData();
      $models = $mapper->searchForFilms($term);
      $data['models'] = $models;
      $this->render('results.php', $data, $term);
  }
}

