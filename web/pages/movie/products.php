<?php
session_start();
require '../mysql/Movie.php';

$movie = new Movie();
$movies = $movie->getAll();

foreach ($movies as $movie) {
?>
   <div id="t<?=$movie['id']?>" class="col-md-4">
              <div class="thumbnail">
              <!--Generator losowych obrazków-->
              <div class="hover" style="position: absolute; padding-left: 92%;display:none;"><a href="#" onclick="deleteMovie(<?=$movie['id']?>)" class="btn btn-danger btn-xs"> × </a></div>
                <img alt="300x200" src="http://lorempixel.com/600/200/?<?=$movie['id']?>" />
                <div class="caption">
                  <h3>
                     <?=$movie['title']?> - $ <?=$movie['price']?>
                  </h3>
                  <p>
                        <blockquote class="pull-right">
                      <small>
                        <?=$movie['description']?>
                      </small> 
                    </blockquote>
                </p>

                  <p>
                    <a onclick="addOrder(<?=$movie['id']?>)" class="btn btn-primary" href="javascript:void(0);">Zakup film</a> 
                  </p>
                </div>
              </div>
            </div>
<?php
}


?>
