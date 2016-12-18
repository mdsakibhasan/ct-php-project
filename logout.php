<?php
	session_start();
	if($_SESSION["login"] == True)
	{
		$_SESSION["login"] = False;
		$_SESSION["email"] = "";
    	$_SESSION["name"] = "";
    	$_SESSION["user_role"] = "";
    	echo("<script>location.href='login.php'</script>");
	}
	else
	{
		echo("<script>location.href='login.php'</script>");
	}
?>