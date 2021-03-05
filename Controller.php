<?php

include 'Model.php';
$md = new model();

$id = isset($_GET['id']) 
    ? $_GET['id'] 
    : NULL;

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
  $md->login($conn,$data,"login");


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


$desc = $md->fetchById($conn,$id,"Movie");

   
    



// if (isset($_REQUEST["login"])) {


//     if( )

// }
//     header("location:dashboard.php");

?>

