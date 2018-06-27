$(document).ready(function() {

  $("#registration").on("click", function() {
    $("#email-box").hide();
    document.getElementById("response2").innerHTML = '';
    document.getElementById("response1").innerHTML = '';

    var regis_name = $("#regis_name").val();
    var regis_user_name = $("#regis_user_name").val();
    var regis_email = $("#regis_email").val();
    var regis_password = $("#regis_password").val();
    var regis_password2 = $("#regis_password_2").val();

    if(regis_name == "" || regis_user_name == "" || regis_email == "" || regis_password == "" || regis_password2== ""){
      document.getElementById("response1").innerHTML = "<p>Fill up all the Fields</p>";
    }

    else{

      //Field test pass
      if(regis_password != regis_password2){
        document.getElementById("response1").innerHTML = "<p>Password does not Match</p>";
      }

      //Password test pass
      else{
        var count = 0;
        for(var i = 0 ; i < regis_email.length ; i++){
          if(regis_email[i] == '@'){
            count+=1;
          }
        }

        if(count==0 || count > 1){
          document.getElementById("response1").innerHTML = "<p>Please Enter valid Email Id</p>";
        }

        else{
          //Now Use ajax
          $.ajax({
            url: 'regis.php',
            method: 'POST',
            data:{
              regis: 1,
              regis_name: regis_name,
              regis_user_name: regis_user_name,
              regis_email: regis_email,
              regis_password: regis_password,
            },
            success:function(response){
              if(response.indexOf('registered' >= 0)){
              	alert("Registered. You may Login now");
              }
              if(response.indexOf('failed')>=0){
                document.getElementById("response1").innerHTML = "<p>Failed</p>";
              }
              if(response.indexOf('usererror')>=0){
                document.getElementById("response1").innerHTML = "<p>User Name exits</p>";
              }
              if(response.indexOf('useremail')>=0){
                document.getElementById("response1").innerHTML = "<p>Email Id already exists</p>";
              }
            },
            dataType:'text',
          });
        }
      }

    }

  });

});