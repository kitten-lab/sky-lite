<?php 
$center = "alignCenter";
$left = "alignLeft";
$right = "alignRight";
$BR = "<br>";

function skylite($result) {
    $GLOBALS['GETS']['set'][] = function() use ($result){
    echo $result;
    };
}


function nameSelf($text) { 
    $GLOBALS['mod'] = $text;
}

function openSky($title){
    $GLOBALS['pageTitle'] = $title;
}
function bigHeading($text){
    $text = htmlspecialchars($text);
    skylite("<h1>$text</h1>");
    }

function medHeading($text){
    $text = htmlspecialchars($text);
    skylite("<h2>$text</h2>");
}

function colorize($color) {
    skylite("<span style='color: $color;'>");
}

function stop_colorize() {
    skylite("</span>");
}

function leaf($text) {
    strip_tags($text, "$BR"); 
    skylite($text);
}

function wordsx($text, $c="") {
    skylite("<span style='$c'>$text</span>");
}

function section($align, $instructions='', $section) {
    $GLOBALS['SKY_STACK'][$section] = "on";
    skylite("<div class='$align $section' style='$instructions'>");
}

function close_section() {
    array_pop($GLOBALS['SKY_STACK']);
    skylite("</div>");
}

function closeSky() {
    if (!empty($GLOBALS['SKY_STACK'])) {
        $times = count($GLOBALS['SKY_STACK']);
    for ($i = 0; $i < $times; $i++) {
            skylite("1</div>");
    }
        error_log("KDE! KDE! Unclosed section detected\n" . print_r($GLOBALS['SKY_STACK'], true));
    };
}

function getImg($img, $alt = '',$class = '') {
    $path = "/" . $GLOBALS['sys'] . '/' . $GLOBALS['dom'] . "/" . $img;
    $result = $GLOBALS['sonar'] . "/i/" . $path;
    if (is_file($result)) {
        $hasClass = $class ? " class='$class'" : "";
        $hasAlt = $alt ? " alt='$alt'" : "";
        
        skylite("<img $hasClass src='" . i_root . "$path' $hasAlt>"); 

        } else {
            error_log("KDE! IMAGE file not found. " . $result);         
        }
}

function img($img, $folder, $prefix, $alt = '',$class = '') {
    $path = "/" . $folder . "/" . $prefix . "_" . $img;
    $result = $GLOBALS['sonar'] . "/i/" . $path;
    if (is_file($result)) {
        $hasClass = $class ? " class='$class'" : "";
        $hasAlt = $alt ? " alt='$alt'" : "";

         echo "<img $hasClass src='" . i_root . "$path' $hasAlt>"; 
         } else {
            error_log("KDE! IMAGE file not found. " . $result);         
         }
}

function getA_Style($css, $folder, $function) {
    $path = "/" . $folder . "/" . $function . "/" . $css . ".css";
    $full = $GLOBALS['sonar'] . "a" . $path;
    if (is_file($full)) {
         echo '<link rel="stylesheet" type="text/css" href="' . a_root . $path . '">';
         } else {
            echo "<div class='loadFail'>PATH NOT FOUND</div>";
            echo "$path";

         }
}

function loadTool($tool, $type, $function) {

    $result = $GLOBALS['sonar'] . $GLOBALS['ktool'] . $tool . '/' . $type . $function . '.php';
    if (is_file($result)) {
        include $result;
    } else {
        error_log("KDE! Tool file not found. " . $result);
    }  
}

function loadTool_Style($tool) {
    $path = "/tools/" . $tool . '/' . $tool . ".css";
    $full = $GLOBALS['sonar'] . "k" . $path;
    if (is_file($full)) {
         echo '<link rel="stylesheet" type="text/css" href="' . k_root . $path . '">';
         } else {
            error_log("PATH NOT FOUND");

         }
}



function getTool($tool, $function) {
    
    $GLOBALS['GETS']['set'][] = function() use ($tool, $function) { 
        loadTool($tool, "page", $function);
    };
    $GLOBALS['GETS']['actor'][] = function() use ($tool, $function) {
        loadTool($tool, "actor", $function);
    };
    $GLOBALS['GETS']['dressing'][] = function() use ($tool) {
        loadTool_Style($tool);
    };
}