<?php
  include "inc/config.php";

	/* Sorting */
	$sql = "SELECT * FROM roster";

	if (isset($_GET['sort'])) {
		if($_GET['sort'] == 'nr')
		{
		    $sql .= " ORDER BY nr";
		}
		elseif ($_GET['sort'] == 'name') {
			$sql .= " ORDER BY name";
		}
		elseif ($_GET['sort'] == 'age') {
			$sql .= " ORDER BY age";
		}
		elseif ($_GET['sort'] == 'overall') {
			$sql .= " ORDER BY overall";
		}
		elseif ($_GET['sort'] == 'talent') {
			$sql .= " ORDER BY talent";
		}
		elseif ($_GET['sort'] == 'sallery') {
			$sql .= " ORDER BY sallery";
		}
		elseif ($_GET['sort'] == 'contract') {
			$sql .= " ORDER BY contract";
		}
	}

/* ####### ADD to Roster ####### */
	if(isset($_POST['SaveAddRoster']))
	{
		$nr = $_POST['nr'];
		$position = $_POST['position'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$overall = $_POST['overall'];
		$talent = $_POST['talent'];
		$sallery = $_POST['sallery'];
		$contract = $_POST['contract'];

		$insertInto= 'INSERT INTO roster(nr, position, name, age, overall, talent, sallery, contract) VALUES("'.$nr.'", "'.$position.'", "'.$name.'", "'.$age.'", "'.$overall.'", "'.$talent.'", "'.$sallery.'", "'.$contract.'")';

		$stmt = $dbh->prepare($insertInto);
		
		$stmt->execute();
		echo $insertInto;
	}

/* ####### REMOVE from Roster ####### */
	if(isset($_GET['delete']))
	{
		$id = $_GET['delete'];

		$deleteFromRoster= 'DELETE FROM roster WHERE id='.$id.' LIMIT 1';

		$stmt = $dbh->prepare($deleteFromRoster);
		
		$stmt->execute();
		echo $deleteFromRoster;
	}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> 
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

       	<div class="container">
       		<!-- Form AddRoster -->
			<legend>Add Roster</legend>
	   		<form name="AddRoster" action="index.php" method="POST" class="form-horizontal">
	       		<div class="input-group">
	       			<span class="input-group-addon" >Nr</span>
					<input name="nr" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Position</span>
					<input name="position" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

	       			<span class="input-group-addon" >Name</span>
					<input name="name" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Age</span>
					<input name="age" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Overall</span>
					<input name="overall" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Talent</span>
					<input name="talent" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Sallery</span>
					<input name="sallery" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">

					<span class="input-group-addon" >Contract Years</span>
					<input name="contract" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
				</div>
					<div style="padding-top: 20px; padding-bottom: 50px">
		    			<button name="SaveAddRoster" type="submit" class="btn btn-primary pull-right" >Add to Roster</button>
		    		</div>
			</form>

				<div class="btn-toolbar">

				</div>
				<div class="well">
				    <table class="table">
				      <thead>
				        <tr>
				          <th><a href="index.php?sort=nr">#</a></th>
				          <th><a href="index.php?sort=position">Position</a></th>
				          <th><a href="index.php?sort=name">Name</a></th>
				          <th><a href="index.php?sort=age">Age</a></th>
				          <th><a href="index.php?sort=overall">Overall</a></th>
				          <th><a href="index.php?sort=talent">Talent</a></th>
				          <th><a href="index.php?sort=sallery">Sallery</a></th>
				          <th><a href="index.php?sort=contract">Contract Years</a></th>
				          <th style="width: 36px;"></th>
				        </tr>
				      </thead>
				      <tbody>

				      <?php
					      echo $sql;
							foreach ($dbh->query($sql) as $row) {
								 	echo $row["id"] . "<br>";
								 echo '<tr>';
								 	echo '<td>' . $row["nr"] . ' </td>';
								 	echo '<td>' . $row["position"] . ' </td>';
								 	echo '<td>' . $row["name"] . ' </td>';
								 	echo '<td>' . $row["age"] . ' </td>';
								 	echo '<td>' . $row["overall"] . ' </td>';
								 	echo '<td>' . $row["talent"] . ' </td>';
								 	echo '<td>' . $row["sallery"] . ' </td>';
								 	echo '<td>' . $row["contract"] . ' </td>';
					 		
								 	echo '<td> 
								 		<form name="DeleteFromRoster" action="index.php?delete='.$row["id"].' " method="POST">
								 			<button type="submit" name="DeleteFromRoster" class="btn btn-danger btn-xs" >Delete from Roster</button>
								 		</form>
						 			</td>';
						         echo '</tr>';
							}
							echo '</table>';
						?>



    	</div> <!-- /container -->  

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php


?>


