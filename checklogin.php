<?php

	$dbhost = "localhost"; //Hostname
	$dbname = "showy"; //Databasename
	$dbtable_users = "users"; //Tablename
	$dbuser ="root"; //MySQL username
	$dbpass ="";	//MysQL password

	//Connect to server and select database
	mysql_connect("$dbhost", "$dbuser", "$dbpass") OR DIE("Cannot connect");
	mysql_select_db("$dbname") OR DIE("Cannot select Database");

	//Username and password sent from form=login
	//user_username is the "input name" in form
	$myusername = $_POST['user_username'];
	$mypassword = $_POST['user_password'];

	//TO protect MySQL from injection
	$myusername = stripslashes($myusername);
	$mypassword = stripcslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);

	//See if database Username is equal to our ingoing variable $mysusername
	$query = "SELECT * 
			FROM $dbtable_users
			WHERE Username = '$myusername'
			AND Password = '$mypassword'
			";

	$result = mysql_query($query);

	//Count how many rows that are found
	$count = mysql_num_rows($result);

	//IF result matched $myusername and $password, there is one row
	if($count==1){

		//Register a session fot the user
		session_register("myusername");
		session_register("mypassword");

		//Now we go to a new file
		header("location:main.php");
	}
	else{
		header("location:index.php?login_failed=true");
	}	
	ob_end_flush();
?>