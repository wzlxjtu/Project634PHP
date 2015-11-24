<?php

# Protection from malformed input
function secure($string) {
    $string = strip_tags($string);
    return $string;
}

?>