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
//$used = $_POST['user'];

$stmt=mysqli_stmt_init($con);

if (mysqli_stmt_prepare($stmt,"SELECT passWd FROM users WHERE uID=?"))
  {

  mysqli_stmt_bind_param($stmt,"s", $userName);

  mysqli_stmt_execute($stmt);

  mysqli_stmt_bind_result($stmt,$pass);

  mysqli_stmt_fetch($stmt);
/*
  printf("Password of %s\n is %s\n and entered password is<strong> %s</strong> ",$userName,$pass, $pass01);

echo '<br>';
*/
if ($pass == $pass01) {

//echo "Password is .<strong>OK </strong><br>";

	echo "<textarea id='userId'>". $userName. "</textarea>";
	echo '<script>

	var y=document.getElementById("userId").value
	var strng = "html" + y +".html"
	window.open(strng)

	</script>';

} else {
echo "So, it's a <strong>Wrong</strong> password";
}

} 
 // Close statement
//  mysqli_stmt_close($stmt);
//  }
//mysqli_close($con);
?>

</body>
</html>