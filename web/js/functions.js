var reload = false;
function loadNavigation(){
  if (reload)
    $('nav').hide().load('/pages/navigation.php').fadeIn('slow');
    else
    $('nav').load('/pages/navigation.php');
}
function loadProducts(){

  $('#products').load('/pages/movie/products.php');
}
//Pokazywanie błędow np. login jest zajęty przy rejestracji -->
function showRegError(){
  var $myForm = $('#registrationForm')
                  if (!$myForm[0].checkValidity()) {
                    // If the form is invalid, submit it. The form won't actually submit;
                    // this will just cause the browser to display the native HTML5 error messages.
                    $myForm.find(':submit').click()
                  }
}

function showLoginError(){
  var $myForm = $('form#loginForm');
  if (!$myForm[0].checkValidity()) {
                    $myForm.find(':submit').click();
                    return false;
  }
  return true;
}


// Funkcja wykorzystująca możliwosci HTML5 do sprawdzania czy hasła są takie same przy rejestracji
function checkPasswords(input) {
    if (input.value != document.getElementById('reg_password').value) {
        input.setCustomValidity('Hasła muszą byc takie same!');
    } else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
   }

}
// Funkcja sprawdzająca czy login jest wolny
function checkLogin(input) {

    if (input.value.length > 3){
        $.getJSON( "/pages/users/checkUserName.php?login="+input.value, 
          function( data )
          {    
            // Pobieramy dane ze strony PHP (która łączy się z baza danych i daje nam odpowiedź czy login jest juz w bazie)
            if (data.isFree != 1)
            {
                //Wykorzusyujemy dobrodziejstwa HTML5 (niestety prawdopodbnie strona będzie dzialac poprawnie tylko na CHROMIE)
                input.setCustomValidity('Ten login jest zajęty'); 
                showRegError();
            } else {
                  // input is valid -- reset the error message
                  input.setCustomValidity('');
             }
              });
      }

}

// Funkcja wysyłające dane do rejestracji
function registration(){
  showRegError();
  // Wysyłanie postu do tworzenia nowego konta
  $.post( 'pages/user/createUser.php', $('#registrationForm').serialize(), function(data){
    showAlert('Pomyslnie dodano nowe konto', 'Zarejestrowano');

  }, 'JSON');
}

// funkcja odpowiedzialna za logowanie
function login(){
  if (!showLoginError())
    return;
    $.post( 'pages/users/logincheck.php', $('form#loginForm').serialize(), function(data) {
         // Jeśli pomyślnie się zalogowalismy przeładuj pasek navigation.php
         if (data.success != 1){
          // Wyswietl że błędny login lub hasło (działa prawdopodobnie tylok na chromie)
            document.getElementById('password').setCustomValidity('Błędny login lub hasło');
            showLoginError();
            //setTimeout(function(){document.getElementById('password').setCustomValidity('')}, 2000);
         } else if (data.success == 1){
            reload = true;
            loadNavigation();
         }
       },
       'json' // I expect a JSON response
    );
}
// funkcja odpowiedzialna za wylogowywanie
function logout(){
    $.get('pages/user/logout.php');
    showAlert('Pomyslnie zostałeś wylogowany', 'wylogowano');

    reload = true;

    loadNavigation();
}
//funkcja wyświetlająca aktualne wiadomośc (np. wylogowano)
function showAlert(message, title){
  $('#alertMessage').html("<strong>"+title+"!</strong> "+message+".");
  $('#alert').fadeIn('slow');
  // przez 2,5 s pokazuje info
  setTimeout(function(){ $('#alert').fadeOut('slow') }, 2500);
}
