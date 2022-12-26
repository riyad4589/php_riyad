<?php 
require_once('connexion.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title> Nobel Prizes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		
	</head>
	<body>
        <button class="btn btn-primary" onClick="document.location.href='home.php'">Accueil</button>

        <div class="table table-responsive w-100 d-block mx-auto">
            <table border="1" class="table table-stripped table-hover table-secondary ">
            <tr>
                <th>Nom Complet</th>
                <th>Categorie</th>
                <th>Année</th>

            </tr>
            <?php
            $sql = 'SELECT * FROM nobels ORDER BY year DESC LIMIT 25';
            $req = $db->query($sql);
            #1ére version avec fetch
            while($data=$req->fetch(PDO::FETCH_ASSOC)){
                echo '<tr><td>'.$data['name'].'</td><td>'.$data['category'].'</td><td>'.$data['year'].'</td></tr>'; 
            }


            #2éme version avec fetch
            // while($data=$req->fetchAll(PDO::FETCH_ASSOC)){
            //     echo '<tr><td>'.$data['name'].'</td><td>'.$data['category'].'</td><td>'.$data['year'].'</td></tr>'; 
            // }
            ?>

            </table>
        </div>
    </body>
</html>