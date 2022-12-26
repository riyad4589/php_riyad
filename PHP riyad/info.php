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
        <form method="GET" action="info.php">
            <input type="number" name="id" />
            <input type="submit" name="voirInfos" />
        </form>
        <div class="table table-responsive w-100 d-block mx-auto">
        <table border="1" class="table table-stripped table-hover table-secondary ">
            <ul>
            <?php
                $id = $_GET["id"];
                $sql = 'SELECT * FROM nobels WHERE id = ?';
                $req = $db->prepare($sql);
                $req->execute([$id]);
                #1ére version avec fetch
                while($data=$req->fetch(PDO::FETCH_ASSOC)){
                    echo '<li>'.$data['name'].'</li><li>'.$data['category'].'</li><li>'.$data['year'].'</li>
                    <li>'.$data['birthdate'].'</li><li>'.$data['birthplace'].'</li><li>'.$data['county'].'</li><li>'.$data['motivation'].'</li>'; 
                }
            ?>            

            </ul>


            </table>
        </div>
    </body>
</html>