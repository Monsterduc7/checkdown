<?php
  include "config.php";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>

       	<div class="container">
       		<!-- Form AddRoster -->
			<legend>Add Roster</legend>
	   		<form name="AddRoster" action="index.php" method="POST" class="form-horizontal">
	       		<div class="input-group">
	       			<span class="input-group-addon" >Name</span>
					<input name="name" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Age</span>
					<input name="age" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Overall</span>
					<input name="overall" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Talent</span>
					<input name="talent" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Salary</span>
					<input name="salary" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Contract Years</span>
					<input name="contract" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
				</div>
			    		<button name="SaveAddRoster" type="submit" class="btn btn-primary pull-right">Add to Roster</button>
			</form>


			<?php
				$sql = "SELECT * FROM roster";
 
				$db_erg = mysqli_query( $db_link, $sql );
				if ( ! $db_erg )
				{
				  die('Ungültige Abfrage: ' . mysqli_error());
				}

			?>



    	</div> <!-- /container -->  

    </body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</html>

<?php
	
	/* ####### ADD Roster ####### */
	if(isset($_POST['SaveAddRoster']))
	{
		$name = $_POST['name'];

		/* ## PDO ## */
		$sql= 'INSERT INTO roster(Name) VALUES ("'.$name.'")';
		$stmt = $dbh->prepare($sql);
		// $stmt->bindValue(':name', $name);
		
		$stmt->execute();
	}

?>
