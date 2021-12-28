<?php
    include "db/index.php";

    $conn = makeConnectionWithDatabase();

    $statement = "CALL allProfiles();";
    $handle = $conn->prepare($statement);
    $profiles = $handle->execute();

    echo json_encode($profiles);
?>