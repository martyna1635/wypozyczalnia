      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sklep z filmami</a>
        </div>
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
        </div><!--/.navbar-collapse -->
      </div>

   