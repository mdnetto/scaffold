<?

if ($data) {
  if  (!empty($term)) {
    $search_header = count($data) . " results for '$term'";
  } else {
    $search_header = count($data) . " total films";
  }
} else {
    $search_header = "We couldn't find any matches for '$term'";
}

echo"
  <div class='films'>
    <p class='search_header'>$search_header</p>";
      foreach($data as $film) {
        $rand_number = mt_rand(1, 31);
        $title = strtolower($film->title);
        echo "<div class='film_card'>
                <a title=$title href='film/{$film->film_id}'>
                  <img src='app/assets/images/film/{$rand_number}.jpg'></img>
                  <p>$title<br>$film->rental_rate</p>
                </a>
              </div>";
        }
echo "</div>";
