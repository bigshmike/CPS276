<?php

function init() {
    $name = $_SESSION['name'];
    return ["<h1>Welcome</h1>", "<p>Welcome $name</p>"];
}
