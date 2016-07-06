<?
foreach($data as $film) {
  echo "<br>
        <div>
            <a href='film/{$film->film_id}'>" . $film->title . "</a>
            <p>$film->description</p>
        </div>";
}
