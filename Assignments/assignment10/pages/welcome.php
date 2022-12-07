<?php

function init() {
    //session_start();
    $name = $_SESSION['name'];
    $status = $_SESSION['status'];
    return ["<h1>Welcome</h1>", "<p>Welcome $name, you are $status </p>"];
}
