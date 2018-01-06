<!DOCTYPE html>
<html>
<body>


<?php
$con=mysqli_connect("localhost","root","mxnzaman","mydb");
if (!$con)
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$userName= $_POST['UId'];
$pass01 = $_POST['pw'];

$quer = "SELECT passWd FROM users WHERE uID='$userName'";
$res = mysqli_query($con, $quer);
$row=mysqli_fetch_array($res);

echo 'Password = '. $row[0] .'<br>';
echo 'User ID = '. $userName .'<br>';


if ($row[0] == $pass01) {
	echo "<textarea id='userId'>". $userName. "</textarea>";
	echo '<script>

	var y=document.getElementById("userId").value
	var strng = "html" + y +".html"
	window.open(strng)

	</script>';
} else {
echo "So, it's a <strong>Wrong</strong> password";
}


 // Close statement
//  mysqli_stmt_close($stmt);
//  }
//mysqli_close($con);

?>

</body>
</html>