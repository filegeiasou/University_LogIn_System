<?php 
    // Get values passe from form in login.php file
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    // to prevent mysql injection
    $username = stripcslashes ($username) ;
    $password  = stripcslashes ($password) ;
    //$username = mysql_real_escape_string($username);
    //$password = mysql_real_escape_string($password);
    // connect to the server and select database
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "phpproject01";

$conn1 = new mysqli ($host,$dbusername,$dbpassword,$dbname);
    // Query the database for user
$sql1 = "SELECT * FROM `users`WHERE username='$username' AND password='$password'";
    $result1 = mysqli_query($conn1,$sql1);
    if (!$result1) {
    printf("Error: %s\n", mysqli_error($conn1));
        echo "Banana";
    exit();
}
                  //or die ( " Failed to query database " .mysql_error());
    $row1 = mysqli_fetch_array($result1);
    if(empty($username) && empty($password) ) 
    {
        echo "You dont put anything";
    }
    else if ( $row1['username'] == $username && $row1['password'] == $password ) {
                header('Location:welcome.php');
         //echo " Login success !!! Welcome ". $row1['username'] ;
    }
    else {                        
         echo " Failed to login ! " ;
    }
?>