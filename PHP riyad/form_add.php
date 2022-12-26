<?php 
require "Model.php";
$obj1 = new Model('mysql:host=localhost;dbname=db_nobel;charset=utf8','root','');
$cnx = $obj1->connexionToDb();
require "begin.html";

?>
<div>
        <form method="POST" action="add.php">   
            Nom : <input type="text" name="name" /><br>
            Year : <input type="number" name="year" /><br>
            Birth Date : <input type="number" name="birthDate" /><br>
            Birth Place : <input type="text" name="birthPlace" /><br>
            County : <input type="text" name="county" /><br>
            Category : <br>
            <?php $categories = $obj1->get_categories($cnx);
            foreach ($categories as $category) {
                echo "<input type='radio' name='category' value=".$category."/>".$category."<br>";
              }
            ?>
            <input type="button" name="ajouter" />
        </form>
</div>