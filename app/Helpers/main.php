<?php

if(!function_exists('nb_produit')) {
    function nb_produit($nb)
    {
        if($nb>1)
        return $nb.' produits';
        else
        return $nb.' produit';
    }
}

if(!function_exists('format_number')) {
    function format_number($number)
    {
        if($number>1000)
        {
            return number_format($number, 0, ',', ' ');
        }else{
            return $number;
        }
    }
}