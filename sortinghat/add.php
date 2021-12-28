<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css" type="text/css">
    <title>Add</title>
</head>
<body>
    <?php 
          
       $firstname = $_GET["firstname"];
       $name = $_GET["name"];
       $email =  $_GET["email"];
       $age = $_GET["age"];
       $description = $_GET["description"];
       $gender = $_GET["gender"];
       

       include "db/index.php";

       $conn = makeConnectionWithDatabase();

       $statement = "CALL newProfile('$firstname', '$name', '$email', '$age', '$description', '$gender')";
       $statement2 = "CALL newVoteRecord();";
       $handle = $conn->prepare($statement);
       $handle->execute();
       $handle2 = $conn->prepare($statement2);
       $handle2->execute();

       $conn->close();

       /*if ($firstname && $name && $email && $age && $description && $gender) {
           $database = new Database();
           $profile = $database->insertQuery("CALL newProfile('$firstname', '$name', '$email', '$age', '$description', '$gender'); CALL newVoteRecord();");
       }*/
    ?>
    <div class="container">
        <div class="title center">Success!</div>  
        <div class="text">Profile added to database!</div>
        <div class="text"> Would you like to</div>  
        <div class="button">
            <input type="submit" value="Put people in a house" onclick="location.href='rate.php'">
          </div>        
    </div>
</body>
</html>