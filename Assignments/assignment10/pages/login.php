<?php
require_once('classes/Pdo_methods.php');
require_once('classes/StickyForm.php');

$output = "";

class Login {
    public function login($post) {
        $pdo = new PdoMethods();

        $sql = "SELECT status, name, email, password FROM admins WHERE email = :email";

        $bindings = array(
          array(':email', $post['email'], 'str')
        );
    
        $records = $pdo->selectBinded($sql, $bindings);
    
        if($records == 'error'){
            return "There was an error logging in";
        }
        else {
            if(count($records) != 0){
                if(password_verify($post['password'], $records[0]['password'])){
                    session_start();
                    $_SESSION['access'] = "accessGranted";
                    $_SESSION['status'] = $records[0]['status'];
                    $_SESSION['name'] = $records[0]['name'];

                    return "success";
                }
                else {
                    return "There was a problem logging in with those credentials";
                }
            }
            else {
                return "There was a problem logging in with those credentials";
            }
        }
    }
}

if(isset($_POST['login'])){
  $login = new Login();
  $output = $login->login($_POST);
  echo $output;
  if($output === 'success'){
    header('location: index.php?page=welcome');
  }
}

$stickyForm = new StickyForm();

function init() {
  global $elementsArr, $stickyForm;

  if (isset($_POST['submit'])) {
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);

    if ($postArr['masterStatus']['status'] == "noerrors") {
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
  "email" => [
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>Email must be valid and cannot be left blank</span>",
    "errorOutput" => "",
    "type" => "text",
    "value" => "sshaper@test.com",
    "regex" => "email"
  ],
  "password" => [
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>Password must be valid and cannot be left blank</span>",
    "errorOutput" => "",
    "type" => "password",
    "value" => "password",
    "regex" => "password"
  ]
];

function getForm($acknowledgement, $elementsArr) {

  $form = <<<HTML
  <h1>Login</h1>    
  <form method="post" action="index.php?page=login">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
    </div>
    <div class="form-group">
      <label for="password">Password </label>
      <input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
    </div>
    
    <div>
    <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>
  </form>

HTML;

  return [$acknowledgement, $form];
}


