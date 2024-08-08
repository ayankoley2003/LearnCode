<?php
include 'db_connection.php'; 

function authenticate_user($username,$password) {
    $db_servername="localhost";
    $db_user="root";
    $db_password="";
    $db_name="learning_site";
    $c=mysqli_connect($db_servername,$db_user,$db_password,$db_name);
    $q="SELECT * FROM login WHERE (userid='$username' AND password='$password')";   // Check the username and password
    $d=mysqli_query($c,$q);
    if(mysqli_num_rows($d) == 1){
        return TRUE;
    }
    else
        return FALSE;
}
?>