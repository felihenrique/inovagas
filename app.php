<?php
$arquivo_req = $_SERVER['REQUEST_URI'];
$arquivo_req = explode('?', $arquivo_req)[0];
if($arquivo_req[strlen($arquivo_req) - 1] == '/') {
    $arquivo_req .= 'index.php';
}
if(!file_exists('controllers/' . $arquivo_req)) {
    http_response_code(404);
    echo "Not found";
    die();
}
session_start();
if(!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
}
$conf = parse_ini_file('CONFIGURACOES.ini');

$views = PATH_SEPARATOR . './views';
$controllers = PATH_SEPARATOR . './controllers';
$repositories = PATH_SEPARATOR . './repositories';
$atual = get_include_path() . PATH_SEPARATOR;
set_include_path($atual . $views . $controllers . $repositories);
require_once("utilidades.php");

require_once('controllers/' . $arquivo_req);