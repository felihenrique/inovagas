<?php
function converter_data($data) {
    return implode('-', array_reverse(explode('/', $data)));
}