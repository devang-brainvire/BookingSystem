<?php

include 'Model.php';

$md = new model();

$idss=0;

$desc = $md->fetchById($conn,$idss,"Movie");



$file_name = $file_size = $file_tmp = $file_type = $file_ext = $path =  "";

if(isset($_POST["moviesubmit"])) {
  
  //image upload
    if(isset($_FILES['movieimage'])){
      
      $errors= array();

      $file_name = $_FILES['movieimage']['name'];

      echo $file_name;

      $file_size =$_FILES['movieimage']['size'];
      $file_tmp =$_FILES['movieimage']['tmp_name'];
      $file_type=$_FILES['movieimage']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['movieimage']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         $timestamp=date("mdYHis");
         $path = "images/".$timestamp.$file_name;
         
         move_uploaded_file($file_tmp,$path);

         echo "Success";
      }else{
         print_r($errors);
      }
   }
  // $image_name = $_FILES['movieimage']['name'];

  // $image_size = $_FILES['movieimage']['size'];

  // $image_tmp = $_FILES['movieimage']['tmp_name'];

  // $image_type = $_FILES['movieimage']['type'];



  // $movieimage= $image_name;



  

  $moviename = $_POST['moviename'];

  $cityname = $_POST['cityname'];
  
  $moviedesciption = $_POST['moviedesciption'];

  $data = array("movie_name"=>$moviename,"movie_description"=>$moviedesciption,"movie_img"=>$path);

  $md->insert($conn, $data, "Movie");
 

}
if(isset($_POST["submit"])) {
  $cityname = $_POST['city'];

  $data = array("city_name" => $cityname);
  $md->insert($conn, $data, "city");
}
if(isset($_POST["login"]))
{
  echo "login";
  $username = $_POST['username'];
  $password = $_POST['password'];

  $data = array("username" => $username , "password" => $password);

  $res = $md->login($conn,$data,"login");

   if($res > 0)
            {
                header('location:dashboard.php');
                
            }
            else{
                echo "<script> alert('Username and password are incorrect');</script>";

            }

}
//movie list showing
 $array = $md->showMovies($conn, "Movie");

 if(isset($_POST["addtheater"]))
 {
  
  $theatername = $_POST['theatername'];
  $selectmovie = $_POST['selectmovie'];
  $movietime = $_POST['movietime'];
  $movieseat = $_POST['movieseats'];

  echo $theatername;

  $data = array("theater_name" => $theatername , "movie_name" => $selectmovie, "movie_timing" => $movietime , "total_sheets" => $movieseat);

  $md->insert($conn, $data, "theater");
 }
 if(isset($_POST["register"]))
 {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
    
  $data = array("name" => $name , "email" => $email, "phone" => $phone , "password" => $password);
  print_r($data);

  $md->insert($conn,$data,"register");
  if($md != null)
  {
    header('Location:login.php');
  }

}
  if(isset($_POST["loginclient"]))
  {

  $email = $_POST['email'];
  $password = $_POST['password'];

  
  $data = array("email" => $email, "password" => $password);


  $login = $md->loginClient($conn,$data,"register");

  $username = array_column($login, 'name');
  

  if (!empty($username[0]))
  {
    
    session_start();
    $_SESSION["username"] = $username[0];
    echo $_SESSION["username"];
    header("location:welcome.php");
  }

  }
  if(isset($_POST[""]))


 //$movie_id = $this->input->get('id', TRUE);





   
    



// if (isset($_REQUEST["login"])) {


//     if( )

// }
//     header("location:dashboard.php");

?>

  