<?php 
require "Model.php";
$obj1 = new Model('mysql:host=localhost;dbname=db_nobel;charset=utf8','root','');
$cnx = $obj1->connexionToDb();
require "begin.html";

?>
        <form method="GET" action="informations.php">
            <input type="number" name="id" />
            <input type="submit" name="voirInfos" />
        </form>
        <div >
            <table border="1">
            <tr>
                <th>Nom Complet</th>
                <th>Categorie</th>
                <th>Année</th>

            </tr>
            <?php
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $listOfRows = $obj1->get_nobel_prize_informations($id,$cnx);
                echo $listOfRows;
            }else{
                echo "il n'existe aucun prix nobel ayant cet identifiant dans la base de données.";
            }
            

            
            ?>

            </table>
        </div>
