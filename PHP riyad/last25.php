<?php 
require "Model.php";
$obj1 = new Model('mysql:host=localhost;dbname=db_nobel;charset=utf8','root','');
$cnx = $obj1->connexionToDb();
require "begin.html";

?>

        <div >
            <table border="1">
            <tr>
                <th>Nom Complet</th>
                <th>Categorie</th>
                <th>Année</th>

            </tr>
            <?php
            
            $listOfRows = $obj1->get_last($cnx);
            foreach ($listOfRows as $row) {
                echo "$row";
              }

            
            ?>

            </table>
        </div>
