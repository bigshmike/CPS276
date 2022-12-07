<?php
require_once('classes/StickyForm.php');
require_once('classes/Pdo_methods.php');

$stickyForm = new StickyForm();

function init() {
    global $elementsArr, $stickyForm;

    if (isset($_POST['submit'])) {
        $postArr = $stickyForm->validateForm($_POST, $elementsArr);

        if ($postArr['masterStatus']['status'] == "noerrors") {
            return addData($_POST);
        } 
        else {
            return getForm("", $postArr);
        }
    } 
    else {
        return getForm("", $elementsArr);
    }
}

$elementsArr = [
    "masterStatus" => [
        "status" => "noerrors",
        "type" => "masterStatus"
    ],
    "name" => [
        "errorMessage" => "<span style='color: red; margin-left: 15px;'>Name cannot be blank and must be a standard name</span>",
        "errorOutput" => "",
        "type" => "text",
        "value" => "Scott Shaper",
        "regex" => "name"
    ],
    "email" => [
        "errorMessage" => "<span style='color: red; margin-left: 15px;'>Username must be a valid email address</span>",
        "errorOutput" => "",
        "type" => "text",
        "value" => "sshaper@test.com",
        "regex" => "email"
    ],
    "password" => [
        "errorMessage" => "<span style='color: red; margin-left: 15px;'>Password cannot be blank and must be a valid password</span>",
        "errorOutput" => "",
        "type" => "password",
        "value" => "password",
        "regex" => "password"
    ],
    "status" => [
        "type" => "select",
        "options" => ["staff" => "Staff", "admin" => "Admin"],
        "selected" => "admin",
    ]
];

function addData($post) {
    global $elementsArr;

    $pdo = new PdoMethods();

    $sql = "SELECT email FROM admins WHERE email = :email";
    $bindings = array(
        array(':email', $post['email'], 'str')
    );

    $records = $pdo->selectBinded($sql, $bindings);

    if ($records == "error") {
        return getForm("There was an error processing your request", $elementsArr);
    } 
    else {
        if (count($records) != 0) {
            return getForm("There is already someone with that username", $elementsArr);
        } 
        else {
            $password = password_hash($post['password'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO admins (name, email, password, status) VALUES (:name, :email, :password, :status)";
            $bindings = [
                [':name', $post['name'], 'str'],
                [':email', $post['email'], 'str'],
                [':password', $password, 'str'],
                [':status', $post['status'], 'str'],
            ];
            $records = $pdo->otherBinded($sql, $bindings);
            if ($records = 'noerror') {
                return getForm("Admin Information Added", $elementsArr);
            } 
            else {
                return getForm("There was a problem adding this administrator", $elementsArr);
            }
        }
        return;
    }
}

function getForm($acknowledgement, $elementsArr) {
    global $stickyForm;

    $options = $stickyForm->createOptions($elementsArr['status']);

    $form = <<<HTML
    <h1>Add Admin</h1>
      <form method="post" action="index.php?page=addAdmin">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
              <input type="text" class="form-control" name="name" value="{$elementsArr['name']['value']}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label for="name">Email{$elementsArr['email']['errorOutput']}</label>
              <input type="text" class="form-control" name="email" value="{$elementsArr['email']['value']}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label for="name">Password {$elementsArr['password']['errorOutput']}</label>
              <input type="password" class="form-control" name="password" value="{$elementsArr['password']['value']}">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
            <label for="state">Status</label>
            <select class="form-control" id="status" name="status">
                $options
            </select>
            </div>
        </div>
    </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="submit" class="btn btn-primary" name="submit" value="Add Admin" >
            </div>
          </div>
        </div>
      </form>

HTML;

    return [$acknowledgement, $form];
}