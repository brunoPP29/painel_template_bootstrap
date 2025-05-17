<?php

class Painel{
    public static function carregarPagina(){
            if (isset($_GET['url'])) {
                $url = explode('/',$_GET['url']);
                if (file_exists('pages/'.$url[0].'.php')) {
                    include('pages/'.$url[0].'.php');
                }else {
                    include('pages/dashboard.php');
                }
            }
        }
    public static function logado(){
        if ($_SESSION['login'] == true) {
            return true;
        }else {
            return false;
        }
    }
}

?>