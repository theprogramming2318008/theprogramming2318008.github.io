<?php

$name = $_GET["name"];

$content = file_get_contents("../../data/list.json");
$json = json_decode($content, true);

$found = false;
$array_index = array();

foreach ($json["data"] as $key => $value) {
    if (strcmp($value["name"], $name) == 0) {
        // 找到了 保存
        $array_index[] = $key;
        $found = true;
    }
}

foreach ($array_index as $i) {
    unset($json["data"][$i]);
}

$json["data"] = array_values($json["data"]);
if ($found) $json["length"]--;

file_put_contents("../../data/list.json", json_encode($json));

print(
    json_encode(
        array(
            "status" => $found ? "success" : "failed"
        )
    )
);