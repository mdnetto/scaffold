<?

$rand_number = mt_rand(1,31);
echo "<img src='app/assets/images/film/{$rand_number}.jpg'></img>
    <p>{$data['model']->title}<p>
    <p>{$data['model']->description}</p></br>";
