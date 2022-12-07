<?php
require_once ('classes/Pdo_methods.php');

$nav="";

$adminNav=<<<HTML
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php?page=addContact">Add Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=addAdmin">Add Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deleteAdmins">Delete Admin(s)</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>
        </ul>
    </nav>
HTML;

$staffNav=<<<HTML
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php?page=addContact">Add Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>
        </ul>
    </nav>
HTML;

$path = "index.php?page=login";

function security() {
    global $adminNav, $nav, $staffNav;
    if($_SESSION['access'] == "accessGranted"){
        if($_SESSION['status'] == "admin"){
            $nav = $adminNav;
        }
        else if($_SESSION['status'] == "staff"){
            $nav = $staffNav;
        }  
    }
    else {
        header('location: index.php');
    }
}

function checkifAdmin() {
    session_start();
    if($_SESSION['status'] !== "admin") {
        header('location: index.php');
    }
}

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        session_start();
        security();
        require_once('pages/addContact.php');
        $result = init();

    }
    
    else if($_GET['page'] === "deleteContacts"){
        session_start();
        security();
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        session_start();
        security();
        require_once('pages/welcome.php');
        $result = init();

    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        $nav = $adminNav;
        checkifAdmin();
        $result = init();

    }

    else if($_GET['page'] === "deleteAdmins"){
        require_once('pages/deleteAdmins.php');
        $nav = $adminNav;
        checkifAdmin();
        $result = init();

    }

    else if($_GET['page'] === "login"){
        require_once('pages/login.php');
        $result = init();

    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}