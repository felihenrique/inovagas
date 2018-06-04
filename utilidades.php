<?php
function converter_data($data) {
    return implode('-', array_reverse(explode('/', $data)));
}

function render_view($path) {
    if(!file_exists('views/' . $path)) {
        echo "View não encontrada";
        return;
    }
    require_once('views/header.php');
    require_once('views/' . $path);
    require_once('views/footer.php');
}

function is_post() {
    return count($_POST) > 0;
}