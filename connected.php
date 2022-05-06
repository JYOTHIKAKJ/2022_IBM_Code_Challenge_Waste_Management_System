<?php
$con = mysqli_connect("localhost", "root", "", "waste management");
session_start();
$user     = mysqli_real_escape_string($con, $_POST['user']);
$psw      = mysqli_real_escape_string($con, $_POST['psw']);
$tou      = mysqli_real_escape_string($con, $_POST['tou']);
$query    = mysqli_query($con, "SELECT * FROM register WHERE Mail_id='$user' AND Password='$psw' AND Type_of_User='$tou' LIMIT 1");
$count    = mysqli_num_rows($query);
 // If result matched $user, $psw and $tou, table row must be 1 row
if ($count == 1)
{
    // fetch result as array
    $row      = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $usertype = $row['Type_of_User'];
    // store username in a session variable
    $_SESSION['unm'] = $user;
    if ($usertype == "User")
    {
        header("location: user.html");
    }
    elseif ($usertype == "Collector")
    {
        header("location: Redirection.html");
    }
    elseif ($usertype == "Recycling Unit")
    {
        header("location: recyclingresult.php");
    }
}
else
{
    echo "<script>alert('invalid username and password');</script>";
}
?>
