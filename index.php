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
	}



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
		    		<button name="SaveAddRoster" type="submit" class="btn btn-primary pull-right">Add to Roster</button>
			</form>

				<div class="btn-toolbar">

				</div>
				<div class="well">
				    <table class="table">
				      <thead>
				        <tr>
				          <th>#</th>
				          <th>Position</th>
				          <th><a href="index.php?sort=name">Name</a></th>
				          <th>Age</th>
				          <th>Overall</th>
				          <th>Talent</th>
				          <th>Sallery</th>
				          <th>Contract Years</th>
				          <th style="width: 36px;"></th>
				        </tr>
				      </thead>
				      <tbody>

				      <?php
					      echo $sql;
							foreach ($dbh->query($sql) as $row) {
								 echo '<tr>';
								 	echo '<td>' . $row["nr"] . ' </td>';
								 	echo '<td>' . $row["position"] . ' </td>';
								 	echo '<td>' . $row["name"] . ' </td>';
								 	echo '<td>' . $row["age"] . ' </td>';
								 	echo '<td>' . $row["overall"] . ' </td>';
								 	echo '<td>' . $row["talent"] . ' </td>';
								 	echo '<td>' . $row["sallery"] . ' </td>';
								 	echo '<td>' . $row["contract"] . ' </td>';
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
/* ####### ADD Roster ####### */
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
		/*
		echo 'nr: ' . $nr . '<br>';
		echo 'position: ' . $position . '<br>';
		echo 'name: ' . $name . '<br>';
		echo 'age: ' . $age . '<br>';
		echo 'overall: ' . $overall . '<br>';
		*/
		/* ## PDO ## */
		$sql= 'INSERT INTO roster(nr, position, name, age, overall, talent, sallery, contract) VALUES("'.$nr.'", "'.$position.'", "'.$name.'", "'.$age.'", "'.$overall.'", "'.$talent.'", "'.$sallery.'", "'.$contract.'")';

		$stmt = $dbh->prepare($sql);
		
		$stmt->execute();
		echo $sql;

	}

?>


