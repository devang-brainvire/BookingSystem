<?php

  ini_set("display_errors", "1");
  error_reporting(E_ALL);
  include '../Database/Controller.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin | Login</title>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  margin-left: 15%;
}

/* Set a style for all buttons */
button {
  background-color: #007bff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  margin-left: 28%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  /*display: none;*/ /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}
#logo {
    width: 70px;
    height: 60px
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="" method="post">
   <!--  <div class="imgcontainer">
      <span  class="close" title="Close Modal">&times;</span>
      
    </div> -->

    <div class="container">
      <center><div class="row justify-content-center px-3 mb-3">
               <h2 class="mb-5 text-center heading">BookMovieShow</h2>
                <h5 class="msg-info">Please login to your account</h5> 
            </div>
      </center>
         <!-- <h3 class="mb-5 text-center heading">BookMovieShow</h3>
          <h6 class="msg-info">Please login to your account</h6> -->
      <div class="row">
        <div class="col-md-8">
           <label for="uname"><b>Username</b></label>
           <input type="text" placeholder="Enter Username" name="username" required>
      </div>
      <div class="col-md-8">
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
      </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
    </div>

    
  </form>
</div>

<script>
// // Get the modal
// var modal = document.getElementById('id01');

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
</script>

</body>
</html>
