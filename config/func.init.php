<?php
/********************************************
 * Function init
 * Copyright Waterticket All right reserved
 ********************************************/

function executequery($query = "")
{
    $query = htmlspecialchars($query);
    $i = 0;
    $return = new stdClass();
    $return->sql = $query;
    $mysqli = $GLOBALS['_DB_CONN_'];
    $result = @mysqli_query($mysqli, $query);
    if(stripos($query, "SELECT") !== false) {
        $return->data = array();
        if($result !== false) {
            while ($row = mysqli_fetch_assoc($result)) {
                $return->data[$i] = $row;
                $i++;
            }
            $return->status = 200;
        }else{
            $return->status = 404;
        }
        $return->sum = $i;
    }else{
        $return->data = $result;
        $return->status = 300;
    }
    return $return;
}

function sql_secure($val = ""){
    return mysqli_real_escape_string($val);
}

function set_template($name = ""){
    @require_once(DOCUMENT_ROOT."/skin/".$name.".html");
}

function include_module($folder){
    $folder = htmlspecialchars(trim($folder));
    if($folder != "") {
        if($folder != '*'){
            foreach (glob("module/{$folder}/{$folder}.class.php") as $filename) {
                include $filename;
            }
        }
    }
}

function __get($var){
    return htmlspecialchars(trim($_GET[$var]));
}

function __post($var){
    return htmlspecialchars(trim($_POST[$var]));
}

function __request($var){
    return htmlspecialchars(trim($_REQUEST[$var]));
}

function isSecure() {
    return
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || $_SERVER['SERVER_PORT'] == 443;
}

function cookies($name, $val, $time = 1){
    setcookie($name, $val, $time, "/", ".".BASE_URL);
}