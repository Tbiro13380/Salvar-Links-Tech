<?php

    header('Content-type: application/json');

    stream_context_set_default([
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]    
    ]);

    $sendData = json_decode(file_get_contents('php://input'), true);

    include 'conn_db.php';

    include 'functions.php';

    $url = 'https://devgo.com.br';

    $html = file_get_contents($url);

    $domDocument = new DOMDocument();
    @$domDocument->loadHTML($html);

    $links = $domDocument->getElementsByTagName("a");

    $linkList = [];
    $nameList = [];
    $json = [
        'result'=>false,
        'data'=> []
    ];

    foreach($links as $link) {
        $href = $link->getAttribute('href');

        if(filterHref($href) ){
            $linkList[] = $href;
        }
    }

    foreach($links as $name) {
        if(filterName($name)) {
            $nameList[] = $name->nodeValue;
        }
    }

    foreach($nameList as $index => $name){
            $db->query("INSERT INTO `links` (`name`, `href`) VALUES ('".$name."', '".$url . $linkList[$index]."')");
    }

    if(isset($sendData['search'])){
        $search = $sendData['search'];
        $result = $db->query("SELECT * FROM `links` WHERE `links`.`name` LIKE '%$search%'");
    }

    if($result->num_rows > 0) {
        $json['result'] = true;
        $json['data'] = $result->fetch_all();
    }

    echo json_encode($json);
?>