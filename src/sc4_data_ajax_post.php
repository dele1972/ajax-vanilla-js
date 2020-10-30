<?php
    
    // simulate a bad connection or huge processing time
    sleep(5);
    
    $responseValue = [
        "test" => $_POST['myInputFormData']
    ];

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($responseValue);
?>