<?php
session_start();

?>

      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Sklep z filmami</a>
        </div>
       <?php  // Sprawdzanie czy użytkownik jest zalogowany, jeśli tak to nie wyświetla menu do zalogowania
       if ($_SESSION["isLogged"]==0) 
        {
        ?>   
            <div id="navbar" class="navbar-collapse collapse">
              <form class="navbar-form navbar-right" role="form" id="loginForm">
                <div class="form-group">
                  <input type="text" name="username" required placeholder="Podaj nazwę użytkownika" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" id='password' name="password" required placeholder="Password" class="form-control">
                </div>
                <input type="submit" style="display:none;">
                <!-- Używa skryptów do logowania ze strony głównej [login()] (index.html) -->
                <a href="#" class="btn btn-success" onclick="login();">Zaloguj</a>

                <a id="modal-registrationA" href="#modal-registration" role="button" data-toggle="modal" class="btn btn-success">Zarejestruj się</a>
              </form>
          <?php }else { ?>
              <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown pull-right">
                   <a href="#" data-toggle="dropdown" class="dropdown-toggle">Akcje<strong class="caret"></strong></a>
                  <ul class="dropdown-menu">
                    <li> <a href="#" >Pokaż profil</a> </li>
                    <li><a href="#">Sprawdź skrzynkę</a></li>
                    <li><a href="#">Kasuj konto</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="logout();">Wyloguj</a> </li>
                  </ul>
                </li>
          </ul>
             <p class="navbar-text navbar-right">Zalogowany jako <a href="#" class="navbar-link"><?=$_SESSION['username']?></a> | </p>
          <?php
          } 
          ?>
        </div><!--/.navbar-collapse -->
      </div>

   