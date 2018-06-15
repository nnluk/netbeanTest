<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
global $langauge_id;
$route = $_GET['route'];

foreach (glob("admin/database/*.php") as $filename) {
    include $filename;
}

include("function/common.php");

if (isset($_GET['developer_mode'])) {
    $_SESSION['developer_mode'] = 1;
}
if (isset($_GET['exit_developer'])) {
    $_SESSION['developer_mode'] = 0;
}

function getLang() {
    if (isset($_GET['lang'])) {
        echo "&lang=" . $_GET['lang'];
    }
}

function setLanguage($lang_id) {
    echo "?";
    foreach ($_GET as $key => $value) {
        if ($key != 'lang') {
            echo $key;
            echo '=';
            echo $value;
            echo '&';
        }
    }

    echo "lang=" . $lang_id;
}

function activeClass($id_a, $id_b) {
    if ($id_a == $id_b) {
        echo 'active';
    }
}

if (isset($_GET['lang'])) {
    $_SESSION['language_id'] = $_GET['lang'];
}

if ($_SESSION['language_id'] == '' || $_SESSION['language_id'] == 0) {
    $_SESSION['language_id'] = 1;
}


$language_id = $_SESSION['language_id'];


if ($_SESSION['language_id'] == 1) {
    include "language/en/language.php";
}
if ($_SESSION['language_id'] == 2) {
    include "language/zh/language.php";
}
if ($_SESSION['language_id'] == 3) {
    include "language/ch/language.php";
}
if ($_SESSION['language_id'] == 4) {
    include "language/jp/language.php";
}

//include("header.php");
if (isset($_GET['route'])) {
    include($_GET['route'] . ".php");
} else {
    include("home.php");
}
//include("footer.php");
?>