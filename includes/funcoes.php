<?php

function pr($var = '', $die = false)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    if ($die) {
        die;
    }
}