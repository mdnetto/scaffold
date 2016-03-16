<?

echo $search =
"<div class='search'>
    <form id='search_id' method='post' action='main'>
      <label for='search' class='search-icon' accesskey='/'></label>
      <input type='text' id='search' name='search_string' placeholder='Search for films, actresses and genres' autofocus='autofocus'>
      <input type='submit' value='GO!' name='submit' style='display:none;'>
    </form>
</div><br><br>";

if ($data) {
    if  (!empty($term)) {
        echo count($data) . " results for '" . $term. "' </br>";
    } else {
        echo "Showing all films </br>";
    }
    foreach($data as $film) {
    echo "<br><div><p><a href='film/{$film->film_id}'>"
        . $film->title . ' '
        . $film->first_name . ' '
        . $film->last_name . "</a></p></div>";
    }
} else {
      echo "We couldn't find any matches for '" . $term . "'";
}
