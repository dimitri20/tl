<?php


use App\Models\BackgroundImage;

$images = BackgroundImage::all()->toArray();
$current_page_urls = [];
$temp_page_urls = [];
$new_page_urls = [];

for ($i = 0; $i < sizeof($images); $i++){
    $current_page_urls[$i] = $images[$i]["page_url"];
}

echo "<pre>";
var_dump($current_page_urls);
echo "</pre>"."</br>";


$page_urls = [
    "/",
    "about",
    "team",
    "services",
    "blog",
    "contact",
];

for ($i = 0; $i < sizeof($page_urls); $i++){
    for($j = 0; $j < sizeof($current_page_urls); $j++){
        if($current_page_urls[$j] != $page_urls[$i]){
//            array_push($temp_page_urls, $page_urls[$i]);
            $new_page_urls[$page_urls[$i]] = $page_urls[$i];
        }
    }
}

for ($i = 0; $i < sizeof($temp_page_urls); $i++){
    $new_page_urls[$temp_page_urls[$i]] = $temp_page_urls;
}

echo "<pre>";
var_dump($page_urls);
echo "</pre>"."</br>";
