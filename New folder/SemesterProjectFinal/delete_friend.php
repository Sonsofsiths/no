  <?php
  session_start();
          include("connection.php"); // connect to the database
            include("function.php");

    $myfriend=$_GET['delete'];
    $me= $_SESSION["logged"];
     $query = mysql_query("delete from myfriends WHERE myid = '" . $_SESSION["logged"] . "' AND myfriends = '" . $_GET['delete'] . "' OR myid = '" . $_GET['delete'] . "' AND myfriends = '" . $_SESSION["logged"] . "' ");
     {
		echo "<script type=\"text/javascript\">
							alert(\"friend has been deleted\");
							window.location='home.php';
						</script>";
			
		
		}
	
	
  ?>