<?php
session_start();

$end = filter_input(INPUT_GET, "end", FILTER_VALIDATE_INT);

if ($end != 1) {
    if ($end)
    $a = rand(1, 3);
    $b = rand(1, 3);
    $c = rand(1, 3);
    $data = [];

    if ($a == 1) {
        $info = "apple";
    }
    else if ($a == 2) {
        $info = "grapes";
    }
    else {
        $info = "watermelon";
    }
    array_push($data, $info);

    if ($b == 1) {
        $info = "apple";
    }
    else if ($b == 2) {
        $info = "grapes";
    }
    else {
        $info = "watermelon";
    }
    array_push($data, $info);

    if ($c == 1) {
        $info = "apple";
    }
    else if ($c == 2) {
        $info = "grapes";
    }
    else {
        $info = "watermelon";
    }
    array_push($data, $info);

    if ($a == $b and $a == $c and $b == $c) {
        $info = "1000";
    }
    else if ($a == $b or $a == $c or $b == $c) {
        $info = "100";
    }
    else {
        $info = "0";
    }
    array_push($data, $info);
    echo json_encode($data);
}
else {
    session_destroy();
}
?>