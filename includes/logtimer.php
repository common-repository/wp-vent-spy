<?php
//ventril log timer

function logtime($inputval){

    //$inputval = $logtime; //120587
    $conTime = '';
    $unitd =24;
    $unith =3600;
    $unitm =60;
    if($inputval > 86400){
        //days
        $dd = intval($inputval / $unith / $unitd);
        $ss_remaining = ($inputval - ($dd * 86400));
        //hours
        $hh = intval($ss_remaining / $unith);
        $ss_remaining = ($ss_remaining - ($hh * 3600));
        //minutes
        $mm = intval($ss_remaining / $unitm);
        //seconds
        $ss = ($ss_remaining - ($mm * 60));
    }else if($inputval > 3600){
        //hours
        $hh = intval($inputval / $unith);
        $ss_remaining = ($inputval - ($hh * 3600));
        //minutes
        $mm = intval($ss_remaining / $unitm);
        //seconds
        $ss = ($ss_remaining - ($mm * 60));
    }else if($inputval > 60){
        //minutes
        $mm = intval($inputval / $unitm);
        //seconds
        $ss = ($ss_remaining - ($mm * 60));
    }else{
        //seconds
        $ss = $inputval;
    }

    if($dd > "1"){
        $conTime = $dd . "days ";
    }elseif($dd == "1"){
        $conTime = $dd . "day ";
    }else{
    }
    if($hh > "1"){
        $conTime .= $hh . "hours ";
    }elseif($hh == "1"){
        $conTime .= $hh . "hour ";
    }else{
    }
    if($mm > "1"){
        $conTime .= $mm . "minutes ";
    }elseif($mm == "1"){
        $conTime .= $mm . "minute ";
    }else{
    }
    if($ss > "1"){
        $conTime .= $ss . "seconds ";
    }elseif($ss == "1"){
        $conTime .= $ss . "second ";
    }else{
    }
    return $conTime;
}
?>