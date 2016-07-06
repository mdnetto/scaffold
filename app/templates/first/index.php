<?

foreach($data as $actor) {
  echo "<br><div><p><a href='actor/{$actor->actor_id}'>" . $actor->first_name . ' ' . $actor->last_name . "</a></p></div>";
}
