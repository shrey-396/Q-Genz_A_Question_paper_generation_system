<?php
// Initialize the session
require_once 'config.php';
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}

$user_check = $_SESSION['username']; 
$ses_sql=mysqli_query($link, "select * from users where username='$user_check'");
$uinfo=mysqli_fetch_assoc($ses_sql);


?>

<html> 
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <title>Add Question</title>

  <style>
        .container img {
            float: right;
            max-width: 50%; /* Adjust the width as needed */
            height: auto;
        }
    </style>

</head>
<body>
  <div class='container'>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Main.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
      <h1 class="display-5">Q-Genz</h1>
        <p class="lead">Automated Question Paper Generator</p>
        <div class="container" >
        <img  src="Q-Genz_logo1.png" width="150" height="150"/>
      </div>
      </div>
    </div>



    <div class="row">
      <div class="col-4">


        <ul class="list-group">

          <li class="list-group-item"><a href='addQuestion.php'>Add Questions manually</a></li>
          <li class="list-group-item">Add Questions using Excel</li>
          <li class="list-group-item"><a href='generatePaper.php'>Generate Paper</a></li>
          <li class="list-group-item"><a href="addCourse.php">Add Course</a></li>
          <li class="list-group-item"><a href='findPaper.php'>Download Question Paper</a></li>

        </ul>



      </div>

<?php
      $errorMsg = ""; 
      $successMsg = "";
  //adding course
      if(!empty($_POST['questionDet'])){
        $question=$_POST['questionDet']; 
        $difficulty=$_POST['difficultySet'];
        $marks = $_POST['marks'];
        $courseName = $_POST['courseSelect']; 
        $addCourse = "INSERT INTO questions(question, difficulty, marks, courseName) VALUES ('$question', '$difficulty', '$marks', '$courseName')";
        mysqli_query($link, $addCourse);  
        $successMsg = "Successfully Added Question to: ".$courseName; 
      }
      else{
        $errorMsg="";
      }


      $fetchlist=mysqli_query($link, "select * from courses");
      ?>

      <div class="col-1"></div>
      <div class="col-6">
      <div class="container">
        <div class="row">
            <div class="col-md-15 mt-6">

                <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Import Excel file</h4>
                    </div>
        
                    <div class="card-body">
                    

                        <form action="upload.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   </div>

   <?php include('footer.php'); ?> 


 </div>


</body>
</html> 