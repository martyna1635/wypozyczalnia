var reload = false;
var locked = true;
function loadNavigation(){
  if (reload)
    $('nav').hide().load('/pages/navigation.php').fadeIn('slow');
    else
    $('nav').load('/pages/navigation.php');


    
}
function loadProducts(){

  $('#products').load('/pages/movie/products.php', function(){$('div div.thumbnail').mouseenter(function(){if(!locked) $('div.hover', this).show();}).mouseleave( function(){$( 'div.hover', this).hide();} );
});

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
        $.getJSON( "/pages/user/checkUserName.php?login="+input.value, 
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
    $('#modal-registration').modal('hide');
  }, 'JSON');
}

// funkcja odpowiedzialna za logowanie
function login(){
  if (!showLoginError())
    return;
    $.post( 'pages/user/logincheck.php', $('form#loginForm').serialize(), function(data) {
         // Jeśli pomyślnie się zalogowalismy przeładuj pasek navigation.php
         if (data.success != 1){
          // Wyswietl że błędny login lub hasło (działa prawdopodobnie tylok na chromie)
            document.getElementById('password').setCustomValidity('Błędny login lub hasło');
            showLoginError();
            //setTimeout(function(){document.getElementById('password').setCustomValidity('')}, 2000);
         } else if (data.success == 1){
            reload = true;
            //odblokuj menu
            unlockMenu();
            //Przeładuj pasek nawigacji
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
    //Zablokuj menu
    lockMenu();
    loadNavigation();
}
//funkcja wyświetlająca aktualne wiadomośc (np. wylogowano)
function showAlert(message, title){
  $('#alertMessage').html("<strong>"+title+"!</strong> "+message+".");
  $('#alert').fadeIn('slow');
  // przez 2,5 s pokazuje info
  setTimeout(function(){ $('#alert').fadeOut('slow') }, 2500);
}


function showOrders()
{
  // Jesli menu jest zablokowane to nie rób nic
  if (locked) return;
    $('#products').hide();
    $('#products').load('pages/order/show.php?all=0').fadeIn("slow");
}
function showAllOrders()
{
  if (locked) return;
    $('#products').hide();
    $('#products').load('pages/order/show.php?all=1').fadeIn("slow");
}
// Dodawanie nowego filmu
function addMovie()
{
  if (locked) return;
    //chowa okno modalne

    //Wysyla zapytanie tworzace nowy film
    $.post('pages/movie/add.php', $('form#movieForm').serialize(),  function(data) {
         if (data.created == 1){
          showAlert('Pomyslnie dodałeś nowy produkt', 'Dodano nowy produkt');
          $('#modal-movie').modal('hide');
          loadProducts();
         }
       });
}
function deleteMovie( id )
{
  if (locked) return;
    $('#t'+id).fadeOut("slow");
    $.get('pages/movie/delete.php?id='+id);

}
// Skladanie nowego zamowienia
function addOrder( id )
{
  if (locked) return;
  $.post( 'pages/order/add.php', { moveId : id }, function(data) {
          if (data.success == 1){
            showAlert("Pomyslnie zakupiłeś produkt", "Zakupiono")
           }
         }
      );
}

//odblokowywanie menu
function unlockMenu()
{
  locked = false;
  $('#showAllOrders li').attr('class', '')
                        .removeAttr( "data-original-title" );
  $('#showAllOrders li a').attr('class', '');
  $('#showOrders').attr('class', '')
                          .removeAttr( "data-original-title" );
 
}

//odblokowywanie menu
function lockMenu()
{
  locked = true;
  $('#showAllOrders li').attr('class', 'disabled')
                        .attr( "data-original-title", 'Musisz się zaglogować jako administrator' );
  $('#showAllOrders li a').attr('class','disabled');
  $('#showOrders').attr('class', 'disabled')
                          .attr( "data-original-title", 'Musisz się zaglogować' );

}
