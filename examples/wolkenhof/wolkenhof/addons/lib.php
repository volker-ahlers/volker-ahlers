<?php
function underscore2Camelcase($str) {
    // Split string in words.
    $words = explode('_', strtolower($str));

    $return = '';
    foreach ($words as $word) {
        $return .= ucfirst(trim($word)) . ' ';
    }

    return $return;
}
?>