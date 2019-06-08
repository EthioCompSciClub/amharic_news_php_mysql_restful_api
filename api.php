<?php

    header('Access-Control-Allow-Orgin: *');
    header('Content-Type: application/json');

    include_once 'database.php';
    include_once 'read.php';

    $database = new Database();
    $db = $database->connect();

    $read = new Read($db);
    $read->delete_date(60);

    $result = $read->read();

    $num = $result->rowCount();


    if($num > 0){
        $post_arr = array();
        $post_arr['data'] = array();


        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $item = array(
                'id' => $id,
                'title' => $title,
                'href' => $title_href,
                'image' => $title_img,
                'logo' => $logo,
                'logo_link' => $logo_link,
                'title_date' => $title_date,

            );

            array_push($post_arr['data'], $item);
        }
        echo json_encode($post_arr);
    }else{
        echo json_encode(
            array('message' => 'No post found.')
        );
    }