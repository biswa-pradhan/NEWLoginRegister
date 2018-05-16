<?php
    $con = mysqli_connect("localhost", "id5746023_123456789", "sarata2015", "id5746023_biswajit");
    
    $UpperName = $_POST["UpperName"];
    $LowerName = $_POST["LowerName"];
    $EmailID = $_POST["EmailID"];
    $Password = $_POST["Password"];

    $statement = mysqli_prepare($con, "INSERT INTO user (UpperName, LowerName, EmailID, Password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $UpperName, $LowerName, $EmailID, $Password);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
