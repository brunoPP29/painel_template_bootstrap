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
    public static function uploadFileEquipe($file){
        $formatoArquivo = explode('.',$file['name']);
        $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
        if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploadsEqui/'.$imagemNome)){
            return $imagemNome;
        }else {
            return false;
        }
    }
        public static function alertErro($mensagem) {
        echo '
        <div class="container mt-3">
            <div class="card shadow">
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                ' . htmlspecialchars($mensagem) . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            </div>
            </div>
        </div>';
        }

        public static function alertSucesso($mensagem) {
        echo '
        <div class="container mt-3">
            <div class="card shadow">
            <div class="card-body">
                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                ' . htmlspecialchars($mensagem) . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            </div>
            </div>
        </div>';
        }

}

?>