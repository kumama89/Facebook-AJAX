<?php
require_once '../facebook-sdk/facebook.php';
header('Content-Type: application/json');

if ( isset($_GET['accessToken']) && !empty($_GET['accessToken']) ) {

        $accessToken = $_GET['accessToken'];
        $facebook    = new Facebook(array(
                                    'appId'  => '{Your-app-id}',
                                    'secret' => '{Your-app-secret}',
                                    'cookie' => true
        ));
        
        # set the access_token for $facebook for future calls
        $facebook->setAccessToken($accessToken);

        try {

             $userData = $facebook->api('v2.0/me');
             # register a new session for the user, containing their basic information, id, username, first_name, last_name, profile_picture
             # and another one for the access_token.
             $_SESSION['fb-user-token'] = $accessToken;
             $_SESSION['fb-user']       = $userData;

             echo json_encode( array('id'         => $userData['id'],
             	                     'link'       => $userData['link'],
             	                     'username'   => $userData['uesrname'],
             	                     'first_name' => $userData['first_name'],
             	                     'last_name'  => $userData['last_name'],
             	                     'gender'     => $userData['gender']      ), JSON_PRETTY_PRINT);

        } catch (FacebookApiException $e) {

           error_log($e);

	    }

} else {
   header('HTTP/1.1 400');
}