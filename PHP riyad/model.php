<?php 
    class Model {
        public $dsn;
        public $user;
        public $password;
  
        function __construct($dsn,$user,$password) {
          $this->dsn = $dsn;
          $this->user = $user;
          $this->password = $password;
        }

        function connexionToDb(){
            try{
                $db = new PDO($this->dsn, $this->user, $this->password);
                return $db;
                // $sql = file_get_contents('dbNobel.sql');
            
                // $qr = $db->exec($sql);
            
            }catch(PDOExeception $e){
                echo 'erreur connexion';
            }
        }

        function get_last($cnx){
            $sql = 'SELECT * FROM nobels ORDER BY year DESC LIMIT 25';
            $req = $cnx->query($sql);
            $rows = [];
            while($data=$req->fetch(PDO::FETCH_ASSOC)){
                array_push($rows,'<tr><td><a href="informations.php?id='.$data['id'].'">'.$data['name'].'</a></td><td>'.$data['category'].'</td><td>'.$data['year'].'</td></tr>') ; 
            }
            return $rows;
        }

        function get_nb_nobel_prizes($cnx) {
            $sql = ' SELECT count(*) FROM nobels';
            $req = $cnx->query($sql);
            $count = $req->fetchColumn();
            return $count;
        }

        function get_nobel_prize_informations($idNumber,$db) {
            $sql = 'SELECT * FROM nobels WHERE id = ?';
            $req = $db->prepare($sql);
            $req->execute([$idNumber]);
            $returnValue;
            if($req->rowCount() == 1){
                while($data=$req->fetch(PDO::FETCH_ASSOC)){
                    $returnValue =  '<tr><td>'.$data['name'].'</td><td>'.$data['category'].'</td><td>'.$data['year'].'</td></tr>' ; 
                }
            }else{
                $returnValue = false;
            }
            return $returnValue;
            
        }

        function get_categories($cnx) {
            $sql = 'SELECT * FROM categories';
            $req = $cnx->query($sql);
            $rows = [];
            while($data=$req->fetch(PDO::FETCH_ASSOC)){
                array_push($rows,$data["category"]) ; 
            }
            return $rows;
        }
    }


?>