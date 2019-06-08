<?php

include('scrapper.php');
include('dbOperation.php');

class scrap_voa{
    const VOA = "https://amharic.voanews.com";
    private $arr;
    private $herf;
    private $title;
    private $img;

    public function get_url(){
        return self::VOA;
    }

    public function __construct(){
        $this->arr['data'] = array();
        $this->href = array();
        $this->title = array();
        $this->img = array();
    }

    public function get_voa_href(){
        $v = new scrapper(self::VOA);
        $search = '.col-xs-12 .row .col-xs-12 .media-block .img-wrap';
        $attr = 'href';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function get_voa_image(){
        $v = new scrapper(self::VOA);
        $search = '.col-xs-12 .row .col-xs-12 .media-block .img-wrap .thumb img';
        $attr = 'data-src';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function get_voa_title(){
        $v = new scrapper(self::VOA);
        $search = '.col-xs-12 .row .col-xs-12 .media-block .img-wrap';
        $attr = 'title';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function get_voa_logo(){
        $v = new scrapper(self::VOA);
        $search = '#page .hdr .hdr-nav-frag .container a img';
        $attr = 'src';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function scrap_voa(){
        $this->href = $this->get_voa_href();
        $this->img= $this->get_voa_image();
        $this->title = $this->get_voa_title();

        array_push($this->arr['data'], $this->href);
        array_push($this->arr['data'], $this->img);
        array_push($this->arr['data'], $this->title);

        return $this->arr;
    }    

    function is_same_size_arr($list){
        $size_data = sizeof($list);
        if($size_data > 0){
            $temp_size = sizeof($list[0]);
            for($i=1;$i<$size_data;$i++){
                if(sizeof($list[$i]) != $temp_size){
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}


class scrap_ebc{
    const EBC = "http://www.ebc.et";
    private $arr;
    private $herf;
    private $title;
    private $img;

    public function get_url(){
        return self::EBC;
    }

    public function __construct(){
        $this->arr['data'] = array();
        $this->href = array();
        $this->title = array();
        $this->img = array();
    }

    public function get_ebc_href(){
        $v = new scrapper(self::EBC);
        $search = '.portlet-dropzone .portlet-boundary .portlet-boundary .portlet-borderless-container .portlet-body div a';
        $attr = 'href';
        $list = $v->find_tag($search, $attr);
        $list_even = array();
        foreach($list as $k => $v){
            if($k % 2 == 0){
                $list_even[] = $v;
            }
        }

        return $list_even;
    }

    public function get_ebc_image(){
        $v = new scrapper(self::EBC);
        $search = '.portlet-dropzone .portlet-boundary .portlet-boundary .portlet-borderless-container .portlet-body div a img';
        $attr = 'src';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function get_ebc_title(){
        $v = new scrapper(self::EBC);
        $search = '.portlet-dropzone .portlet-boundary .portlet-boundary .portlet-borderless-container .portlet-body div a p';
        $attr = 'plaintext';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function get_ebc_logo(){
        $list = '';

        return $list;
    }

    public function scrap_ebc(){
        $this->href = $this->get_ebc_href();
        $this->img= $this->get_ebc_image();
        $this->title = $this->get_ebc_title();

        array_push($this->arr['data'], $this->href);
        array_push($this->arr['data'], $this->img);
        array_push($this->arr['data'], $this->title);

        return $this->arr;
    }    

    function is_same_size_arr($list){
        $size_data = sizeof($list);
        if($size_data > 0){
            $temp_size = sizeof($list[0]);
            for($i=1;$i<$size_data;$i++){
                if(sizeof($list[$i]) != $temp_size){
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}


class scrap_newset{
    const NEWSET = "https://news.et";
    private $arr;
    private $herf;
    private $title;
    private $img;

    public function get_url(){
        return self::NEWSET;
    }

    public function __construct(){
        $this->arr['data'] = array();
        $this->href = array();
        $this->title = array();
        $this->img = array();
    }

    public function get_newset_href(){
        $v = new scrapper(self::NEWSET);
        $search = '#mvp-feat-tab-col1 a';
        $attr = 'href';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function get_newset_image(){
        $v = new scrapper(self::NEWSET);
        $search = '#mvp-feat-tab-col1 .mvp-feat1-list-cont .mvp-feat1-list-out .mvp-feat1-list-img img';
        $attr = 'src';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function get_newset_title(){
        $v = new scrapper(self::NEWSET);
        $search = '#mvp-feat-tab-col1 .mvp-feat1-list-cont .mvp-feat1-list-out .mvp-feat1-list-in .mvp-feat1-list-text h2';
        $attr = 'plaintext';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function get_newset_logo(){
        $v = new scrapper(self::NEWSET);
        $search = '.mvp-nav-top-left-in .mvp-nav-top-mid a img';
        $attr = 'src';
        $list = $v->find_tag($search, $attr);

        return $list;
    }

    public function scrap_newset(){
        $this->href = $this->get_newset_href();
        $this->img= $this->get_newset_image();
        $this->title = $this->get_newset_title();

        array_push($this->arr['data'], $this->href);
        array_push($this->arr['data'], $this->img);
        array_push($this->arr['data'], $this->title);

        return $this->arr;
    }    

    function is_same_size_arr($list){
        $size_data = sizeof($list);
        if($size_data > 0){
            $temp_size = sizeof($list[0]);
            for($i=1;$i<$size_data;$i++){
                if(sizeof($list[$i]) != $temp_size){
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}




function run_scrap_voa(){
    $s = new scrap_voa();
    $list = $s->scrap_voa();

    $database = new Database();
    $db = $database->connect();
    $dbop = new DatabaseOperation($db);

    if($s->is_same_size_arr($list['data'])){
        $size = sizeof($list['data']);
        $el_size = sizeof($list['data'][0]);
        $date = new DateTime();

        for($i = 0; $i< $el_size; $i++){
            $href = $list['data'][0][$i];
            $image = $s->get_url().$list['data'][1][$i];
            $title = $list['data'][2][$i];
            $today = $date->format('Y-m-d');
            $logolink = $s->get_url().$s->get_voa_logo()[0];
            $logo = $s->get_url();

            if(!$dbop->search($title)){
                $dbop->insert($title, $href, $image, $logo, $logolink, $today);
            }
        }
    }
}

function run_scrap_ebc(){
    $s = new scrap_ebc();
    $list = $s->scrap_ebc();

    $database = new Database();
    $db = $database->connect();
    $dbop = new DatabaseOperation($db);

    if($s->is_same_size_arr($list['data'])){
        $size = sizeof($list['data']);
        $el_size = sizeof($list['data'][0]);
        $date = new DateTime();

        for($i = 0; $i< $el_size; $i++){
            $href = $s->get_url().$list['data'][0][$i];
            $image = $list['data'][1][$i];
            $title = $list['data'][2][$i];
            $today = $date->format('Y-m-d');
            $logolink = '';
            $logo = $s->get_url();

            if(!$dbop->search($title)){
                $dbop->insert($title, $href, $image, $logo, $logolink, $today);
            }
        }
    }
}

function run_scrap_newset(){
    $s = new scrap_newset();
    $list = $s->scrap_newset();

    $database = new Database();
    $db = $database->connect();
    $dbop = new DatabaseOperation($db);

    if($s->is_same_size_arr($list['data'])){
        $size = sizeof($list['data']);
        $el_size = sizeof($list['data'][0]);
        $date = new DateTime();

        for($i = 0; $i< $el_size; $i++){
            $href = $list['data'][0][$i];
            $image = $list['data'][1][$i];
            $title = $list['data'][2][$i];
            $today = $date->format('Y-m-d');
            $logolink = $s->get_newset_logo()[0];
            print_r($logolink);
            $logo = $s->get_url();

            if(!$dbop->search($title)){
                $dbop->insert($title, $href, $image, $logo, $logolink, $today);
            }
        }
    }
}

// run_scrap_voa();
// run_scrap_ebc();

run_scrap_newset();


