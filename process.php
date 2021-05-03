<?php


$UName = $_POST['UName'];
echo $UName;


$Email = $_POST['Email'];
echo $Email;

$Subject = $_POST['Subject'];
echo $Subject;

$msg = $_POST['msg'];
echo $msg;





try{

    $connection_string = 'mysql:host=localhost;dbname=db_pshrestha_I505';
    $db_user = 'pshrestha_I505';
    $db_pwd = 'CUU@2021';

    $conn_pdo2 = new PDO($connection_string,$db_user,$db_pwd);
    $conn_pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "conencted to database successfully"."</br>";

    $sqlqry2="INSERT INTO contact(u_name,u_email,u_sub,u_msg) VALUES(:u_n,:u_e,:u_s,:u_m)";


        $statement2 = $conn_pdo2->prepare($sqlqry2);
        //echo "after prepare"."</br>";
        $statement2->bindvalue(':u_n', $UName);
        $statement2->bindvalue(':u_e', $Email);
        $statement2->bindvalue(':u_s',$Subject);
$statement2->bindvalue(':u_m',$msg);



         //echo "after bind"."</br>";

$count= $statement2->execute();
header("location: thankyou.php");
         // echo "after exec"."</br>";
        //echo "<br><hr>";
     //echo "New Records:  ".$count." Successfully inserted into paymentinfo table";
      //echo "<br><hr>";


$conn_pdo2=null;

    }

catch (PDOException $e){
    die($e->getMessage());
}
?>
