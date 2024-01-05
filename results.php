<?php
include("connect.php");

session_start();
$candidate= mysqli_query($connect,"Select * from user where role=2");
$candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);
$_SESSION['candidatedata'] = $candidatedata; // Assuming $candidatedata contains the necessary data


?>

<!DOCTYPE html>
<html>

<head>
  <title>Voting Result   </title>
  <style>
    
    #Group {
      max-width: 400px;
      margin: 0 auto;
      padding: 110px;
  background-color: whitesmoke;
  
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      text-align: center;
      float: center;
      width: 90%;
    }

    .backbtn {
    background-color: #333;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 3px;
    font-size: 16px;
    cursor: pointer;
    float: left;
  }
  
  .backbtn:hover {
    background-color: #555;
  }
  
  #Header{
    background-image: url("../uploads/Untitled.jpeg");

			background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
    padding: 10px;
  }
  #Header h1 {
    color: #fff;
    margin: 0;
    padding: 10px;
  }
  body{
    background-image: url("../uploads/Untitled.jpeg");
    background-size: 100% 100%;

background-repeat: no-repeat;
background-attachment: fixed;

padding: 10px;
   
  }
  </style>
</head>

<body>
  <div id="Header">
  <a href="../index.html"><button class="backbtn" type="button"><i class="fas fa-arrow-left"></i> Back</button></a><br><br>
  <center>
    <h1 style="color: 5D5755 ;"> Result📊 </h1>
    </center>
  </div>
  <br>

  <div id="Group">
    <?php
    if (isset($candidatedata)) {
      echo '<center><b style="font-size:25px">Voting Candidate Result</b></center><br><br>';

      foreach ($candidatedata as $candidate) {
        $name = $candidate['name'];
        $votes = $candidate['votes'];
        $photo = $candidate['photo'];
    ?>
        <div>
          <br>
          <center><img style="float: right" src="../uploads/<?php echo $photo ?>" height="79" width="80"></center>
          <b style="float: left">Candidate Name: <?php echo $name ?> </b> <br><br>
          <b style="float: left">Total Votes: <?php echo $votes ?></b><br>
        </div>
        <br>
        <hr>
    <?php
      }
    }
    ?>
  </div>
</body
