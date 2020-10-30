<?php

    $responseValue = [
        "test" => "This is a JSON Object Value sent by PHP."
    ];

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($responseValue);

?>