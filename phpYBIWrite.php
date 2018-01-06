<?php


$link = mysqli_connect('localhost', 'root', 'mxnzaman', 'mydb');
if (!$link) 
	{
	die('Connection error'. mysqli_connect_error());
	}

$txt= $_POST['textfile'];
$name = $_POST['user'];

echo 'Text is - '. $txt. '<br>Username is '. $name. '<br>';

$sql1 = "SELECT userPage FROM users WHERE uID='$name'";
$res1 = mysqli_query($link, $sql1);
$row1 = mysqli_fetch_row($res1);
	echo 'Result1 is : '. $row1[0]. '<br>';
$txt1 = ($row1[0]. '.'. $txt);
	echo  'Result2 is : '. $txt1. '<br>';

$sql = "UPDATE users SET userPage='$txt1' WHERE uID='$name'";

if (mysqli_query($link, $sql)) {
    echo "Record updated successfully <br>";

$sql3 = "SELECT userPage FROM users WHERE uID='$name'";
$res3 = mysqli_query($link, $sql3);
$row3 = mysqli_fetch_row($res3);
	echo 'Result-3 is : '. $row3[0]. '<br>';
echo "
<script>
var txt=$row3[0]
document.write(txt)
</script>";


$fileName = 'html'. $name. '.html';
	echo 'File name is '. $fileName;
$testFile = fopen($fileName, 'a') or die('File could not be opened or created');
	$txt = $_POST['textfile'];
fwrite($testFile, $txt);
echo '<br>'. $txt;


} else {
    echo "Error updating record: " . mysqli_error($conn);
}

//mysqli_close($con);
?>