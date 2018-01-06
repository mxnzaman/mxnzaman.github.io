

<?php

$servername = "localhost";
$username = "root";
$password = "mxnzaman";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_errno());
} 

$fnm = $_POST['fname'];
$lnm = $_POST['lname'];

$ui = $_POST['uid'];
$pw = $_POST['pword'];

$sql1 = "SELECT fName FROM users WHERE uID = '$ui'";
$res = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($res);

if ($row[0] == NULL) {

$sql = "INSERT INTO users (fName, lName, uID, passWd) VALUES ('$fnm', '$lnm', '$ui', '$pw')";

if (mysqli_query($conn, $sql) === TRUE) {

/*
$str = "<!DOCTYPE html>
<html>
<title>My Writings!</title>

<head>
<link rel='stylesheet' href='cssYBMenu.css'>
</head>
<body>


<span style='margin-left:300px;'>
<form name='fileTest' method='post' action='phpYBIWrite.php'>
<textarea name='user'>$ui</textarea>

<h3 style='margin-left:200px;'>Please Write your text below. THEN CLICK Submit:</h3></span>


<textarea id='textfile' name='textfile' rows='50' cols='80' style='width:50%; height:30%; margin-left:210px;'></textarea>

<input type='submit' name='sub'></input>

</form><br>

</body>

</html>";
*/

$fileName = 'html'. $ui. '.html';
$file = fopen($fileName, 'a') or die('Unable to open file!');




//echo fwrite($file, $str);


/*
echo "
<script>
function loadHomePage() {
window.open('htmlYBHome.html')
}
</script>


<button type='button' style='margin-top:250px;margin-left:35%; background-color:green; color:white;width:25%;height:15%;' onclick='loadHomePage()'> <h4>You are registered. Your page name is $fileName. Click Me to go Home Page to Login and Enjoy!</h4></button>";
*/
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error();
}

} else { echo 'This user id is unavailable.';}
?>


