<?php
$host     = "localhost";
$name = "root";
$pass     = "";
$database = "trashbank";
$connection = mysqli_connect($host,$name,$pass,$database);

function query($query){
    global $connection;
    //result itu lemari
    $result = mysqli_query($connection,$query);
    $rows=[]; //kotk kosong
    while ($row /*bajunya */= mysqli_fetch_assoc($result)){
        $rows[]=$row; //baju masukin kotaknya ga bawa lemari
    }
    return $rows; // rows bntuknya array asosiatif rapi
}


function register($data){
    global $connection;
    $name= strtolower(stripslashes($data["name"]));
    $email= strtolower(stripslashes($data["email"]));
$password= mysqli_real_escape_string($connection,($data["password"]));

$result= mysqli_query($connection,"SELECT tman_name FROM tman WHERE 
tman_name = '$name'");
$result2= mysqli_query($connection,"SELECT email FROM tman WHERE 
email = '$email'"); 
if (mysqli_fetch_assoc($result)||mysqli_fetch_assoc($result2)){
    echo "<script> alert('Nama atau email sudah terdaftar') </script>";
    return false;
}

$password = password_hash($password, PASSWORD_DEFAULT);

    if(isset($data["senior"])){
        mysqli_query($connection,"INSERT INTO tman VALUES('','$name','senior','$email','$password')");
    } else {
mysqli_query($connection,"INSERT INTO tman VALUES('','$name','junior','$email','$password')");
    }
return mysqli_affected_rows($connection);
}

function regtrasher($data){
    global $connection;
    $name= strtolower(stripslashes($data["name"]));
    $email= strtolower(stripslashes($data["email"]));

$result= mysqli_query($connection,"SELECT name FROM trasher WHERE 
name = '$name'");
$result2= mysqli_query($connection,"SELECT email FROM trasher WHERE 
email = '$email'"); 
if (mysqli_fetch_assoc($result)||mysqli_fetch_assoc($result2)){
    echo "<script> alert('Nama atau email sudah terdaftar') </script>";
    return false;
}
        mysqli_query($connection,"INSERT INTO trasher VALUES('','$name','$email')");

return mysqli_affected_rows($connection);
}

function plustype($data){
    global $connection;
    $trashname= strtolower(stripslashes($data["name"]));
    $ttype= strtolower(stripslashes($data["trashtype"]));
    $price= strtolower(stripslashes($data["price"]));

$result= mysqli_query($connection,"SELECT trash_name FROM trash WHERE 
trash_name = '$trashname'");
if (mysqli_fetch_assoc($result)){
    echo "<script> alert('Sampah dengan nama yang sama sudah terdaftar') </script>";
    return false;
}
        mysqli_query($connection,"INSERT INTO trash VALUES('','$trashname','$ttype','$price')");

return mysqli_affected_rows($connection);
}

function transactionadd($data){
    global $connection;
    $tman_id= strtolower(stripslashes($data["tman_id"]));
    $trashname= strtolower(stripslashes($data["trashname"]));
    $trashername= strtolower(stripslashes($data["trashername"]));
    $datentime= $data["datentime"];
    $weight= strtolower(stripslashes($data["weight"]));
    $descr= strtolower(stripslashes($data["descr"]));

    $result= mysqli_query($connection,"SELECT name FROM trasher WHERE 
name = '$trashername'");

    if(mysqli_num_rows($result)===0){
        mysqli_query($connection,"INSERT INTO trasher VALUES('','$trashername','')");
    }
    
$result2= mysqli_query($connection,"SELECT trash_name FROM trash WHERE 
trash_name = '$trashname'"); 
    if(mysqli_num_rows($result2)===0){
        mysqli_query($connection,"INSERT INTO trash VALUES('','$trashname','','')");
    }
    

    $trashid= mysqli_query($connection,"SELECT trash_id FROM trash WHERE trash_name = '$trashname'");
    $trashids= mysqli_fetch_assoc($trashid);
    $trashid=$trashids["trash_id"];

    $trasherid=mysqli_query($connection,"SELECT trasher_id FROM trasher WHERE name = '$trashername'");
    $trasherids= mysqli_fetch_assoc($trasherid);
    $trasherid=$trasherids["trasher_id"];

    $trashprice= mysqli_query($connection,"SELECT price FROM trash WHERE trash_name = '$trashname'");
    $trashprices= mysqli_fetch_assoc($trashprice);
    $trashprice=$weight*$trashprices["price"];

if(mysqli_query($connection,"INSERT INTO trashsaction VALUES('','$datentime','$tman_id','$trasherid','$trashid','$weight','$descr','$trashprice')")){
    return true;
} 
return false;
}

    function deploytrashsaction(){
        global $connection;
        $query = "SELECT trashsaction.transaction_id, trashsaction.tman_id, trashsaction.trasher_id, trashsaction.trash_id, trashsaction.datentime, trashsaction.weight, trashsaction.descr, trashsaction.totalprice, tman.tman_name, trash.trash_name, trasher.name FROM trashsaction INNER JOIN tman ON tman.tman_id = trashsaction.tman_id INNER JOIN trash ON trash.trash_id = trashsaction.trash_id INNER JOIN trasher ON trasher.trasher_id = trashsaction.trasher_id";
        $trashsactiondt=mysqli_query($connection,$query);
        return $trashsactiondt;
    }

    function deploytrashsactionwid($id){
        global $connection;
        $query = "SELECT trashsaction.transaction_id, trashsaction.tman_id, trashsaction.trasher_id, trashsaction.trash_id, trashsaction.datentime, trashsaction.weight, trashsaction.descr, trashsaction.totalprice, tman.tman_name, trash.trash_name, trasher.name FROM trashsaction INNER JOIN tman ON tman.tman_id = trashsaction.tman_id INNER JOIN trash ON trash.trash_id = trashsaction.trash_id INNER JOIN trasher ON trasher.trasher_id = trashsaction.trasher_id WHERE trashsaction.transaction_id=$id";
        $trashsactiondt=query($query)[0];
        return $trashsactiondt;
    }

    function isitowner($num){
        global $connection;
        $checking=mysqli_query($connection,"SELECT privilege FROM tman WHERE tman_id = '$num'");
        $checkings= mysqli_fetch_assoc($checking);
        $checking=$checkings["privilege"];
        if($checking==='owner'){
            return true;
        } else {
            return false;
        }
    }

    function isitok($num){
        global $connection;
        $checking=mysqli_query($connection,"SELECT privilege FROM tman WHERE tman_id = '$num'");
        $checkings= mysqli_fetch_assoc($checking);
        $checking=$checkings["privilege"];
        if($checking==='owner'||$checking==='senior'){
            return true;
        } else {
            return false;
        }
    }


    function sherc($data){
        global $connection;
    $id=$data["trasher_id"]; 
    $nama= htmlspecialchars($data["name"]);
    $email= htmlspecialchars($data["email"]);

    $query= "UPDATE trasher SET name='$nama',email='$email'
     WHERE trasher_id= $id
     ";
     mysqli_query($connection,$query);

    return mysqli_affected_rows($connection);
    }

    function sherd($id){
    global $connection;
    mysqli_query($connection,"DELETE FROM trasher where trasher_id = $id");
    return mysqli_affected_rows($connection);}

    function shc($data){
        global $connection;
    $id=$data["trash_id"]; 
    $nama= htmlspecialchars($data["name"]);
    $ttype= htmlspecialchars($data["trashtype"]);
    $price= htmlspecialchars($data["price"]);

    $query= "UPDATE trash SET trash_name='$nama',trash_type='$ttype',price='$price'
     WHERE trash_id= $id
     ";
     mysqli_query($connection,$query);

    return mysqli_affected_rows($connection);
    }

    function shd($id){
    global $connection;
    mysqli_query($connection,"DELETE FROM trash where trash_id = $id");
    return mysqli_affected_rows($connection);}

    function shmancnp($data){
        global $connection;
    $id=$data["tman_id"]; 
    $nama= htmlspecialchars($data["tman_name"]);
    $email= htmlspecialchars($data["email"]);
    $password= htmlspecialchars($data["oldpassword"]);

    $query= "UPDATE tman SET tman_name='$nama',email='$email',password='$password'
     WHERE tman_id= $id
     ";
     mysqli_query($connection,$query);

    return mysqli_affected_rows($connection);
    }

    function shmanc($data){
        global $connection;
    $id=$data["tman_id"]; 
    $nama= htmlspecialchars($data["tman_name"]);
    $email= htmlspecialchars($data["email"]);
    $password= htmlspecialchars($data["oldpassword"]);

    $query= "UPDATE tman SET tman_name='$nama',email='$email',password='$password'
     WHERE tman_id= $id
     ";
     mysqli_query($connection,$query);

    return mysqli_affected_rows($connection);
    }

    function shmand($id){
    global $connection;
    mysqli_query($connection,"DELETE FROM tman where tman_id = $id");
    return mysqli_affected_rows($connection);}

    function shactc($data){
        global $connection;
    $id=$data["transaction_id"]; 
    $tnama= htmlspecialchars($data["trashname"]);
    $ternama= htmlspecialchars($data["trashername"]);
    $dtntime= htmlspecialchars($data["datentime"]);
    $weight= htmlspecialchars($data["weight"]);
    $descr= htmlspecialchars($data["descr"]);

    $result= mysqli_query($connection,"SELECT name FROM trasher WHERE 
    name = '$ternama'");
    
        if(mysqli_num_rows($result)===0){
            mysqli_query($connection,"INSERT INTO trasher VALUES('','$ternama','')");
        }
        
    $result2= mysqli_query($connection,"SELECT trash_name FROM trash WHERE 
    trash_name = '$tnama'"); 
        if(mysqli_num_rows($result2)===0){
            mysqli_query($connection,"INSERT INTO trash VALUES('','$tnama','','')");
        }
        
    
        $trashid= mysqli_query($connection,"SELECT trash_id FROM trash WHERE trash_name = '$tnama'");
        $trashids= mysqli_fetch_assoc($trashid);
        $trashid=$trashids["trash_id"];
    
        $trasherid=mysqli_query($connection,"SELECT trasher_id FROM trasher WHERE name = '$ternama'");
        $trasherids= mysqli_fetch_assoc($trasherid);
        $trasherid=$trasherids["trasher_id"];

    $query= "UPDATE trashsaction SET datentime='$dtntime',trasher_id='$trasherid',trash_id='$trashid',weight='$weight',descr='$descr'
     WHERE transaction_id= $id
     ";
     mysqli_query($connection,$query);

    return mysqli_affected_rows($connection);
    }

    function shactd($id){
    global $connection;
    mysqli_query($connection,"DELETE FROM trashsaction where transaction_id = $id");
    return mysqli_affected_rows($connection);}

    function addmessage($data){
        global $connection;
    $mname= strtolower(stripslashes($data["mname"]));
    $memail= strtolower(stripslashes($data["memail"]));
    $message= strtolower(stripslashes($data["message"]));
    $date= strtolower(stripslashes($data["datereceived"]));

        mysqli_query($connection,"INSERT INTO message VALUES('','$mname','$memail','$message','$date')");
        return mysqli_affected_rows($connection);
    }

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,0,'','.');
        return $hasil_rupiah;
     
    }
?>