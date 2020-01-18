<?php

$name = $_GET["name"];

$count = 0;

$json = json_decode(file_get_contents("../data/list.json"), true);
for ($i = 0; $i < $json["length"]; $i++) {
    if (strcmp($json["data"][$i]["name"], $name) == 0) {
        $json["data"][$i]["visiter"]++;
        $count = $json["data"][$i]["visiter"];
    }
}

file_put_contents("../data/list.json", json_encode($json));

print(json_encode(
    array(
        "status" => "success",
        "count" => $count,
    )
));