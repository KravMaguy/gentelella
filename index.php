<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8">

    <title>login sample</title>

  </head>

  <body>   

    <fb:login-button 
      scope="public_profile,email"
      onlogin="checkLoginState();">
    </fb:login-button>
    <div id="status">


<script>  

(function (d, s, id) {
  var js,
    fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) {
    return;
  }

  js = d.createElement(s);
  js.id = id;

  js.src = "https://connect.facebook.net/en_US/sdk.js";

  fjs.parentNode.insertBefore(js, fjs);
})(document, "script", "facebook-jssdk");


window.fbAsyncInit = function () {
  FB.init({
    appId: "1138439479936262",

    cookie: true,

    xfbml: true,

    version: "v9.0",
  });

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      // testAPI();  
      console.log("get user info");
      FB.api("/me", {fields: "id, name, email"}, response => {
      console.log(response);
      });
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this webpage.';
    }
  }


  function checkLoginState() {
  console.log("3. check login");
  FB.getLoginStatus(function (response) {
    console.log("4. checkloginState response: ", response);
    statusChangeCallback(response);
    console.log("5. checkloginState after statusCahnge: ", response);
  });
}

  FB.getLoginStatus(function (response) {
  console.log("1. getlogincalled response: ", response);
  statusChangeCallback(response);
  console.log("2. status change response: ", response);
});

FB.AppEvents.logPageView();

};


function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }



</script>
</body>
</html>