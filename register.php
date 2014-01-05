<?php

	$dbhost = "localhost"; //Hostname
	$dbname = "showy"; //Databasename
	$dbtable_users = "users"; //Tablename
	$dbuser ="root"; //MySQL username
	$dbpass ="";	//MysQL password

	//Connect to server and select database
	mysql_connect("$dbhost", "$dbuser", "$dbpass") OR DIE("Cannot connect");
	mysql_select_db("$dbname") OR DIE("Cannot select Database");

	//name, username and password sent from form=sign_up
	//user_username is the "input name" in form
	$myemail = $_POST['user_email'];
	$myusername = $_POST['user_username'];
	$mypassword = $_POST['user_password'];


	//TO protect MySQL from injection
	$myemail = stripslashes($myemail);
	$myusername = stripslashes($myusername);
	$mypassword = stripcslashes($mypassword);
	$myemail = mysql_real_escape_string($myemail);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);


//----------Check if user already exists------
	$query_already_member = "SELECT *
				  FROM $dbtable_users
				  WHERE Email = '$myemail'
				 ";
	$result_already_member = mysql_query($query_already_member);

	//Count how many rows are found
	$count_already_member = mysql_num_rows($result_already_member);


//----------Check if username is already taken----
	$query_username_taken = "SELECT *
						FROM $dbtable_users
						WHERE Username = '$myusername'
					";
	$result_username_taken = mysql_query($query_username_taken);

	$count_username_taken = mysql_num_rows($result_username_taken);



//--------------AND NOW, all the IFs--------
	//If result query matched $myemail, there is already an account
	if($count_already_member>=1){

		echo "There is already an account for this email";
	
	}else if($count_username_taken==1){//Is Username taken?

		echo "Username is taken";
	}else{

		$query_register = mysql_query("INSERT INTO users(Email, Password, Username)
			VALUES('$myemail', '$myusername', '$mypassword')");	
		
		if($query_register){
			echo "Succes";
		}else{
			echo "Error";
		}
	}
	ob_end_flush();


?>