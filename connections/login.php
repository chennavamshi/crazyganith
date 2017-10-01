<?php
require_once 'openid.php';
require_once 'connect.inc.php';
require_once 'core.inc.php';
$openid = new LightOpenID("index.php");

if ($openid->mode) {
    if ($openid->mode == 'cancel') {
        echo "User has canceled authentication!";
    } elseif($openid->validate()) {
        echo "Validated";
        $data = $openid->getAttributes();
        $email = $data['contact/email'];
        $first = $data['namePerson/first'];
        $last = $data['namePerson/last'];
        $query = "SELECT `firstname` FROM `google_user` WHERE `username` = '".$email."'";

        echo $query;
        if( $query_run = mysql_query($query)){
            echo " 2 ";
            $query_num_rows = mysql_num_rows($query_run);
            if ($query_num_rows == 0){
                echo " 3 ";
                $query = "INSERT INTO `google_user` VALUES ('', '".$email."' ,'".$first."', '".$last."')";
                if(mysql_query($query)){
                  $_SESSION['user_id'] = $email;
                  $_SESSION['mode'] = 1;
                  echo "Entered No of Rows = 0 ";
                  //echo "Session ID :".$_SESSION['user_id'];
                  //echo "Session ID :".$_SESSION['user_id'];
                  header('Location: index.php');
                 }
                 else
                 echo "Came Here";
            }
            else if($query_num_rows == 1){
            $_SESSION['user_id'] = $email;
            $_SESSION['mode'] = 1;
            echo 'suceeded';
            header('Location: index.php');
            }
        }
        /*echo "Identity: $openid->identity <br>";
        echo "Email: $email <br>";
        echo "First Name: $first";
        echo "Last Name : $last";
        echo "Gender : $gender";*/

    } else
      echo "The user has not logged in";
}
 else {
    echo "Go to index page to log in.";
  }
?>