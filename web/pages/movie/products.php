<?php
require '../mysql/Movie.php';

$movie = new Movie();
$movies = $movie->getAll();

foreach ($movies as $movie) {
?>
   <div class="col-md-4">
              <div class="thumbnail">
                <img alt="300x200" src="http://lorempixel.com/600/200/people" />
                <div class="caption">
                  <h3>
                     <?=$movie['title']?> - $ <?=$movie['price']?>
                  </h3>
                  <p>
                        <blockquote class="pull-right">
                      <small>Przykładowy tekst Przykładowy tekst Przykładowy tekst Przykładowy tekst 
                        <?=$movie['description']?>
                      </small> 
                    </blockquote>
                </p>

                  <p>
                    <a class="btn btn-primary" href="#">Zakup film</a> 
                  </p>
                </div>
              </div>
            </div>
<?php
}