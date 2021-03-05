<?php
    include 'Connection.php';
    $con1=new Connection();
    $conn=$con1->mkConnection();
    
    class model
    {
        function insert($con,$movie,$table)
        {
            $k=array_keys($movie);
            $col=implode(",",$k);
               
            $v=array_values($movie);
            $val=implode("','",$v);
            
            $q="insert into $table($col) values('$val')";
            
            return $con->query($q);

        
        }


        function login($con,$movie,$table)
        {
            // $k=array_keys($movie);
            // $col=implode(",",$k);
               
            // $v1=array_values($movie['username']);
            // $v2=array_values($movie['password']);
            $username= $movie["username"];
            $password= $movie["password"];


            $q="SELECT * FROM $table  WHERE `username` = '$username' AND `password` = '$password' ";
            $res = $con->query($q);

            $num_rows = $res->fetchColumn();

            if($num_rows > 0)
            {
                header('location:dashboard.php');
            }
            else{
                echo "<script> alert('Username and password are incorrect');</script>";

            }

        }
        function fetchRecord($con,$table){
            $q = "SELECT * FROM $table";
            $res= $con->query($q);
            $result = $res->fetchAll(PDO::FETCH_ASSOC);


           return $result;
       }

    }
?> 