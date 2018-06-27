var regis=document.getElementById("the-register-button");
var loginform=document.getElementById("Login-Form-to-hide");
var res=document.getElementById("response");

var regisform=document.getElementById("Regis-Form-to-Hide");
var login=document.getElementById("the-login-button");
var res1=document.getElementById("response1");

regis.addEventListener("click", function() {
	res.innerHTML = "";
	loginform.style.display = "none";
	regisform.style.display = "block";
});

login.addEventListener("click", function() {
	res1.innerHTML = "";
	loginform.style.display = "block";
	regisform.style.display = "none";
});
