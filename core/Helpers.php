<?php

function view($name, $data = [])
{
    extract($data);
    require "../app/view/$name.php";
}
function unixtimestamp_to_shamsi($unixtimestamp, $pattern)
{
    $thetime = new IntlDateFormatter("fa_IR", IntlDateFormatter::FULL, IntlDateFormatter::FULL, "GMT+03:30", IntlDateFormatter::TRADITIONAL, $pattern);
    return $thetime->format($unixtimestamp);
}
function ip()
{
    return $_SERVER["REMOTE_ADDR"];
}
function redirect($path)
{
    header("location: $path");
}
function csrf_token()
{
    $data = bin2hex(random_bytes(16));
    $_SESSION["csrf_token"] = $data;
    return $data;
}

function limit_words($text, $limit)
{
    $words = explode(' ', $text);
    return implode(' ', array_slice($words, 0, $limit)) . "...";
}

function is_route($route)
{
    if ($_SERVER["REQUEST_URI"] == $route) {
        return true;
    } else {
        return false;
    }
}


