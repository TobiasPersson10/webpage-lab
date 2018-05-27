
//Validera registreringsformuläret
function validateRegForm() {
    var email = document.forms["regform"]["email"].value;
    var password = document.forms["regform"]["password"].value;

    if (email.trim() == ""){
        alert("Vänligen fyll i din email");
        return false;
    }
    if (password.trim() == ""){
    	  alert("Vänligen skriv in ett lösenord");
       	return false;
    }
    //Kontrollerar att emailen innehåller @ och .
    ///\s{1,}|\S+\@+\S+\.+\S+\s|\s{1,}/;
    var regex = /^\S+\@+\S+\.+\S+$/;
    if(regex.test(email) == false)
    {
        alert ("Du har angivit en ogiltig epostadress. Den måste innehålla ett @-tecken samt en punkt. Exempel: user@uu.se");
    	  return false;
    }


}

//Validera inloggningsforumuläret
function validateLoginForm() {
    var emailTwo = document.forms["loginform"]["email"].value;
    var passwordTwo = document.forms["loginform"]["password"].value;

    if (emailTwo.trim() == ""){
        alert("Vänligen fyll i din email");
        return false;
    }
    if (passwordTwo.trim() == ""){
    	alert("Vänligen skriv in ett lösenord");
    	return false;
    }
    //Kontrollerar att emailen innehåller @ och .
    var regex = /\S+\@+\S+\.+\S+/;
    if(regex.test(emailTwo) == false)
    {
        alert ("Du har angivit en ogiltig epostadress. Den måste innehålla ett @-tecken samt en punkt. Exempel: user@uu.se");
    	return false;
    }

}

//Validera kommentarsformuläret
function validateCommentForm() {
    var comment = document.forms["form"]["comment"].value;
    if (comment.trim() == ""){
    	alert("Vänligen skriv en kommentar");
    	return false;
    }

}
