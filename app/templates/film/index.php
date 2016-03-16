<?
foreach($data as $film) {
  echo "<br><div><p><a href='film/{$film->film_id}'>" . $film->title . "</a></p></div>";
}
