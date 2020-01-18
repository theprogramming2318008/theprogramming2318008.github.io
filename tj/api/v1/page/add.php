<?php

$name = $_GET['name'];

$file_content = file_get_contents("../../data/list.json");
$json = json_decode($file_content, true);

$json["length"]++;

$data = array(
    "name" => strval($name),
    "visiter" => 0
);

array_push($json["data"], $data);

file_put_contents("../../data/list.json", json_encode($json));

print(
    json_encode(
        array(
            "status" => "success"
        )
    )
);