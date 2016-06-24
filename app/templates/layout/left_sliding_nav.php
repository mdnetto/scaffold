<?

echo $sliding_nav =
  "<div class='nav'>
    <ul class='categories'>
      <a href='main'><li>All Films</li></a>";
      foreach($base_data['categories'] as $category) {
        echo "<a href='category/{$category->category_id}'><li>{$category->name}</li></a>";
      }
echo "</ul></div>";
