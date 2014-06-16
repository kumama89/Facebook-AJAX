$(document).ready(function() {

      window.fbAsyncInit = function() {
        FB.init({
          appId      : '{Your-app-id}',
          xfbml      : true,
          version    : 'v2.0'
        });
      };
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

      $('#login').click( function(e){

          e.preventdefault;
      
      		FB.login(function(r) {
            if (r.authResponse) {
                var accessToken = r.authResponse.accessToken;
                $.ajax({ 
                    type     : "GET",
                    url      : "set-session.php",
                    data     : { accessToken : accessToken },
      	            datatype : 'json',
                    success  : function(user) {
                                        $('p').fadeOut( function() { 
                                             $('p').html('Hey, Good to see you <a href='+ user.link +'>'+ user.first_name +'</a>!</p>');
                                             $('p').fadeIn();
                                        });
                                        $('#login').fadeOut().remove();
                               },
                    error    : function() {
                                        $('p').fadeOut( function() { 
                                             $('p').html('Something went wrong :( try again');
                                             $('p').fadeIn();
                                        });          
                               }
                });
            } else {
                $('p').fadeOut( function() { 
                     $('p').html('You didn\'t authorize the app');
                     $('p').fadeIn();
                }); 
      		  }
          });
      		
      	});

});