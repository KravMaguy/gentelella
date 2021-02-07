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

    <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '1138439479936262',
        cookie     : true,
        xfbml      : true,
        version    : 'v9.0'
      });
        
      FB.AppEvents.logPageView();   
        
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    
    FB.getLoginStatus(function(response) {
      console.log('1. getlogincalled response: ', response)
      statusChangeCallback(response);
      console.log('2. status change response: ', response)
    });

    function checkLoginState() {
      console.log('3. check login')
      FB.getLoginStatus(function(response) {
      console.log('4. checkloginState response: ', response)
      statusChangeCallback(response);
      console.log('5. checkloginState after statusCahnge: ', response)
      });
    }
    
    </script>
  </body>
</html>