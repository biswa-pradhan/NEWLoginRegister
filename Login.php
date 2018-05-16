<?php
    $con = mysqli_connect("localhost", "id5746023_123456789", "sarata2015", "id5746023_biswajit");
    
    $EmailID = $_POST["EmailID"];
    $Password = $_POST["Password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM userdetails WHERE EmailID = ? AND Password = ?");
    mysqli_stmt_bind_param($statement, "ss", $EmailID, $Password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $user_ID, $UpperName, $LowerName, $EmailID, $Password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["UpperName"] = $UpperName;
        $response["LowerName"] = $LowerName;
        $response["EmailID"] = $EmailID;
        $response["password"] = $Password;
    }
    
    echo json_encode($response);
?>
