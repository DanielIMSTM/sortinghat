<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css" type="text/css">
    <title>Results</title>
</head>
<body>
    <?php 
        include "db/index.php";
        $conn = makeConnectionWithDatabase();
        $sql = "CALL getAllProfilesAndVotes(); ";    
        $result = mysqli_query($conn,$sql);
        

        

        if($result) {
            ?>
            <div class="container">  
                <?php 
                while($row = mysqli_fetch_assoc($result)){

                    $firstname = $row["first_name"];
                    $lastname = $row["last_name"];

                    $Gryffindor = $row["Gryffindor"];

                    $Slytherin = $row["Slytherin"];

                    $Ravenclaw = $row["Ravenclaw"];

                    $Hufflepuff = $row["Hufflepuff"];
        
                    $total = $Gryffindor + $Slytherin + $Ravenclaw + $Hufflepuff;

                    $GryffindorP = round(($Gryffindor / $total) * 100);
                    $SlytherinP = round(($Slytherin / $total) * 100);
                    $RavenclawP = round(($Ravenclaw / $total) * 100);
                    $HufflepuffP = round(($Hufflepuff / $total) * 100);
                    ?>
                    <div class="action">
                        <div class="profile" >
                        <div class="title"><?php echo $firstname ." ". $lastname ?> </div>
                        
                        <div class="user-details"> 
                        <div class="input-box">
                        <span class="details">Gryffindor <?php echo $GryffindorP ?>%</span>
                        </div> 
                        <div class="input-box">
                        <span class="details">Slytherin <?php echo $SlytherinP ?>%</span>
                        </div>
                        <div class="input-box">
                        <span class="details">Ravenclaw <?php echo $RavenclawP ?>%</span>
                        </div>
                        <div class="input-box">
                        <span class="details">Hufflepuff <?php echo $HufflepuffP ?>%</span>
                        </div>
                        </div>
                        </div>
                    </div> 
                    <?php
                }
                ?>
            <?php  
        } else {
            ?>
            <div class="container">
            <div class="text"><?php echo 'Error: '.mysqli_error($conn); ?></div>
            </div>
            <?php
        }
        $conn->close();
    ?>
    <script src="assets/results.js">

    </script>
</body>
</html>