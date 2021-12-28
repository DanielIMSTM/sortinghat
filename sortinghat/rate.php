<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css" type="text/css">
    <title>Rate</title>
</head>
<body>
        <?php 
            include "db/index.php";
            $conn = makeConnectionWithDatabase();
            
            $id = $_GET["process"];

            if($id == "" ) {
                
                $id = 1;
                
            }  
            
            $sql = "CALL getProfile($id);";
            
            $result = mysqli_query($conn,$sql);
    if($result) {
        if(mysqli_num_rows($result) > 0) {

            $profile = mysqli_fetch_assoc($result);

            //$id = $profile["profile_id"];

            $vote = $_GET["vote"];

            

            $conn->close();

                $conn1 = makeConnectionWithDatabase();

                $sqlVoteRecord = "CALL getVoteRecord($id)";
                

                $voteRecord = mysqli_query($conn1,$sqlVoteRecord);

                $vote_house = mysqli_fetch_assoc($voteRecord);

                $Gryffindor = $vote_house["Gryffindor"];

                $Slytherin = $vote_house["Slytherin"];

                $Ravenclaw = $vote_house["Ravenclaw"];

                $Hufflepuff = $vote_house["Hufflepuff"]; 
                
                

                $conn->close();

            //if(isset($_GET["vote"])){

                $conn2 = makeConnectionWithDatabase();
                
                if($_GET["vote"] == "Gryffindor"){
                    
                    $sqlGriffindor = "CALL incrementVoteGryffindor($id,$Gryffindor);";
                    //$id = $id + 1;
                    mysqli_query($conn2,$sqlGriffindor);
                            
                }
                elseif($_GET["vote"] == "Slytherin"){
                    $sqlSlytherin = "CALL incrementVoteSlytherin($id,$Slytherin);";
                    //$id = $id + 1;
                    mysqli_query($conn2,$sqlSlytherin);
    
                }
                elseif($_GET["vote"] == "Ravenclaw"){
                    $sqlRavenclaw = "CALL incrementVoteRavenclaw($id,$Ravenclaw);";
                    //$id = $id + 1;
                    mysqli_query($conn2,$sqlRavenclaw);
                    
                }
                elseif($_GET["vote"] == "Hufflepuff"){
                    $sqlhufflepuff = "CALL incrementVoteHufflepuff($id,$Hufflepuff);";
                    //$id = $id + 1;
                    mysqli_query($conn2,$sqlhufflepuff);
                    
                }
                $conn2->close();
        // };

            
            

            

            
        ?>
        <div class="container">
                <div class="text">
                <?php 
                echo $profile["first_name"];
                ?>
                </div>
                <div class="text">
                <?php 
                echo $profile["birthdate"];
                ?>
                </div>
                <div class="text">
                <?php 
                echo $profile["gender"];
                ?>
                </div>
                <div class="text">
                <?php 
                echo $profile["description"];
                ?>
                </div>
                <form method="GET" action="rate.php">
                <div class="buttons vote">
                    <input type="hidden" name="process" value="<?php echo $id + 1; ?>">
                    <input type="submit" value="Gryffindor" name="vote">
                    <input type="submit" value="Slytherin" name="vote">
                </div>  
                <div class="buttons vote">
                    <input type="submit" value="Ravenclaw" name="vote">
                    <input type="submit" value="Hufflepuff" name="vote">
                </div> 
                </form> 
        </div>
        <?php
        } else {
            ?>
            <div class="container">
                <div class="text">Thank you for playing!</div>
                <div class="text">You've rated them all!</div>
                <div class="button">
                <input type="submit" value="Results" onclick="location.href='results.php'">
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
    ?>
    <script src="assets/rate.js">

    </script>
</body>
</html>