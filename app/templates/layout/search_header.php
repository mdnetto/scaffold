<?

echo $search =
"<div class='search'>
    <p class='logo'> RENT ME.</p>
    <form id='search_id' method='post' action='main'>
      <label for='search' class='search-icon' accesskey='/'></label>
      <input type='text' id='search' name='search_string' placeholder='Search for films, actresses and genres' autofocus='autofocus'>
      <input type='submit' value='GO!' name='submit' style='display:none;'>
    </form>
</div>";


//echo $search =
//"<div class='top'>
//    <div class='search'>
//        <form id='search_id' method='post' action='main.php'>
//          <label for='search' class='search-icon' accesskey='/'></label>
//          <input type='text' id='search' name='search_string' placeholder='Search films, actresses and genres' autofocus='autofocus'>
//        </form>
//    </div>
//</div>";
//
//if ($data) {
//    if  (!empty($term)) {
//        $search_header = count($data) . " results for '$term'";
//    } else {
//        $search_header = "All films";
//    }
//    echo "<p>$search_header ></p>";
//    foreach($data as $film) {
//    $rand_number = mt_rand(1, 31);
//    $title = strtolower($film->title);
//    echo "<div class='film_card'>
//            <a title=$title href='film/{$film->film_id}'>
//              <img src='app/assets/images/film/{$rand_number}.jpg'></img>
//              <p>$title<br>$$film->rental_rate</p>
//            </a>
//          </div>";
//    }
//} else {
//      echo "We couldn't find any matches for '$term'";
//}
