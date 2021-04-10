//PHP Document

<?php
  include_once("connect.php");
  ?>
  
 //Connexion Json à la base de donnée 
<?php
 header("Content-Type: application/json; charset=UTF-8"); 
$obj = json_decode($_POST["x"], false); 
$conn = new mysqli("localhost", "root", "", "senmoneydb");
$numero = $_GET["numero"];
 $stmt = $conn->prepare("SELECT numero FROM compte LIMIT 5"); 
 $stmt->bind_param("ss", $obj->table, $obj->limit); 
 $stmt->execute(); 
 $result = $stmt->get_result(); 
 $outp = $result->fetch_all(MYSQLI_ASSOC);
  echo json_encode($outp); 
  ?>

/*<?php
$donneesSenMoney ='{"tel1": {"numero": "778496405", "code": "2020","solde": 10000},
"tel2": {"numero": "778496405", "code": "2010", "solde": 20000},
"tel3": {"numero": "772934418",  "code": "2000", "solde": 30000},
"tel4": {"numero": "772502482", "code": "1990",  "solde": 40000},
"tel5": {"numero": "776599290",  "code": "1980","solde": 50000}}';
?>*/