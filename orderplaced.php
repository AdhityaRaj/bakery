<html>
<body>
<?php

function create_db($mysqli,$dbname){
    $dbcreation="create database $dbname";
    $db=mysqli_query($mysqli,$dbcreation);
    if($db)
        {echo "database created".$db;}
    }

function create_table($mysqli){
    $table1="create table orders(cake varchar(50),variety varchar(50),weight int,delivery_mode varchar(10),note varchar(100),cost int, cust_name varchar(50),addr varchar(100),phone_no bigint)";
    if (mysqli_query($mysqli,$table1))
        {echo "table created";}

}

function use_db($mysqli,$dbname){
    $dbselection="use $dbname";
    if(mysqli_query($mysqli,$dbselection))
        {echo "<br>database selected<br>";}
    else{
        create_db($mysqli,$dbname);
        use_db($mysqli,$dbname);
    }
}

function insert_values($mysqli,$cake,$var,$weight,$dm,$note,$tot_cost,$name,$address,$ph_no){
    $insertquery="insert into orders values($cake,$var,$weight,$dm,$note,$tot_cost,$name,$address,$ph_no);";
    if (!mysqli_query($mysqli,$insertquery))
        // {echo "<script>
        //     alert('Order Given');
        //     // window.location = '/index.html';  
        //     </script>";
        // }
    {
        create_table($mysqli);
        insert_values($mysqli,$cake,$var,$weight,$dm,$note,$tot_cost,$name,$address,$ph_no);
    }
    return TRUE;
}

if($_POST){
    
    $ncake=$_POST['variety'];
    $cake="'".$_POST['cakeName']."'";
    $var = "'".$_POST['varient']."'";
    $weight = $_POST['weight'];
    $dm="'".$_POST['dm']."'";
    $note = "'".$_POST['note']."'";
    $tot_cost = $_POST['totCost'];
   $name = "'".$_POST['custName']."'";
   $address = "'".nl2br($_POST['addr'])."'";
   $ph_no = $_POST['phoneNo'];
   $dbhost="localhost"; 
   $dbusername="root";
   $dbpassword="";
   $dbname="y_not_cafe";
   echo $cake.$var.$weight.$dm.$note.$tot_cost.$name.$address.$ph_no;
    $mysqli=mysqli_connect($dbhost,$dbusername,$dbpassword);
    $mysqli = new mysqli("localhost", $dbusername, $dbpassword);#, $dbname, 3306);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo $mysqli->host_info . "\n";
    if ($mysqli)
            {echo "connected to server<br>";
            }
    use_db($mysqli,$dbname);
    $insert = insert_values($mysqli,$cake,$var,$weight,$dm,$note,$tot_cost,$name,$address,$ph_no);
    if($insert){
        echo "<script>
            window.alert('Order Placed Successfully');
            window.location = './index.html';
        </script>";
    }
    else{
        echo"<script>
        window.alert('Oops! An unknown error occured, Please try again later');
        window.location = './index.html';
    </script>";
    }
}

?>
</body>
</html>