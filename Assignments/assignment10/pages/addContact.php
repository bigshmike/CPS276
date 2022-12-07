<?php
require_once('classes/StickyForm.php');
require_once('classes/Pdo_methods.php');
require_once ('pages/routes.php');

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
    "value" => "Scott",
    "regex" => "name"
  ],
  "address" => [
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>Address cannot be blank and must be a valid address</span>",
    "errorOutput" => "",
    "type" => "text",
    "value" => "123 Someplace",
    "regex" => "address"
  ],
  "city" => [
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>City cannot be blank and must be a valid city</span>",
    "errorOutput" => "",
    "type" => "text",
    "value" => "Anywhere",
    "regex" => "city"
  ],
  "state" => [
    "type" => "select",
    "options" => ["MI" => "Michigan", "OH" => "Ohio", "PApa" => "Pennslyvania", "TX" => "Texas"],
    "selected" => "MI",
    "regex" => "name"
  ],
  "phone" => [
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>Phone cannot be blank and must be a valid phone number</span>",
    "errorOutput" => "",
    "type" => "text",
    "value" => "999.999.9999",
    "regex" => "phone"
  ],
  "email" => [
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be a valid email address</span>",
    "errorOutput" => "",
    "type" => "text",
    "value" => "sshaper@test.com",
    "regex" => "email"
  ],
  "dob" => [
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>DOB cannot be blank and must be in the valid format mm/dd/yyyy</span>",
    "errorOutput" => "",
    "type" => "text",
    "value" => "12/25/1999",
    "regex" => "dob"
  ],
  "updates" => [
    "action" => "notRequired",
    "errorMessage" => "<span style='color: red; margin-left: 15px;'></span>",
    "errorOutput" => "",
    "type" => "checkbox",
    "status" => ["newsletter" => "", "emailUpdates" => "", "textUpdates" => ""]
  ],
  "age" => [
    "action" => "required",
    "errorMessage" => "<span style='color: red; margin-left: 15px;'>Please select an age range</span>",
    "errorOutput" => "",
    "type" => "radio",
    "value" => ["10-18" => "", "19-30" => "", "30-50" => "", "51+" => ""]
  ]
];

function addData($post) {
  global $elementsArr;

  $pdo = new PdoMethods();

  $sql = "INSERT INTO contacts (name, address, city, state, phone, email, dob, updates, age) VALUES (:name, :address, :city, :state, :phone, :email, :dob, :updates, :age)";

  if (isset($_POST['updates'])) {
    if($_POST['updates'] === null) {
      return;
    }
    else {
      $updates = "";
      foreach ($post['updates'] as $v) {
        $updates .= $v . ",";
      }
      $updates = substr($updates, 0, -1);
    }
  }

  if (isset($_POST['age'])) {
    $age = $_POST['age'];
  } 
  else {
    $age = "";
  }

  if (isset($_POST['updates'])) {
    $updates = $_POST['updates'];
  }
  else {
    $updates = "";
  }

  $bindings = [
    [':name', $post['name'], 'str'],
    [':address', $post['address'], 'str'],
    [':city', $post['city'], 'str'],
    [':state', $post['state'], 'str'],
    [':phone', $post['phone'], 'str'],
    [':email', $post['email'], 'str'],
    [':dob', $post['dob'], 'str'],
    [':updates', $updates, 'str'],
    [':age', $post['age'], 'str']
  ];

  $result = $pdo->otherBinded($sql, $bindings);

  if ($result == "error") {
    return getForm("<p>There was a problem processing your form</p>", $elementsArr);
  } 
  else {
    return getForm("<p>Contact Information Added</p>", $elementsArr);
  }
}

function getForm($acknowledgement, $elementsArr) {
  global $stickyForm;
  $options = $stickyForm->createOptions($elementsArr['state']);

  $form = <<<HTML
  <h1>Add Contact</h1>
    <form method="post" action="index.php?page=addContact">
    <div class="form-group">
      <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
      <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
    </div>
    <div class="form-group">
      <label for="address">Address (just numbers and street){$elementsArr['address']['errorOutput']}</label>
      <input type="text" class="form-control" id="address" name="address" value="{$elementsArr['address']['value']}" >
    </div>
    <div class="form-group">
      <label for="city">City {$elementsArr['city']['errorOutput']}</label>
      <input type="text" class="form-control" id="city" name="city" value="{$elementsArr['city']['value']}" >
    </div>
    <div class="form-group">
      <label for="state">State</label>
      <select class="form-control" id="state" name="state">
        $options
      </select>
    </div>
    <div class="form-group">
      <label for="phone">Phone (format 999.999.9999) {$elementsArr['phone']['errorOutput']}</label>
      <input type="text" class="form-control" id="phone" name="phone" value="{$elementsArr['phone']['value']}" >
    </div>
    <div class="form-group">
      <label for="email">Email address{$elementsArr['email']['errorOutput']}</label>
      <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
    </div>
    <div class="form-group">
      <label for="dob">Date of birth{$elementsArr['dob']['errorOutput']}</label>
      <input type="text" class="form-control" id="dob" name="dob" value="{$elementsArr['dob']['value']}" >
    </div>

            

    <p>Please check all contacts updates you would like (optional):{$elementsArr['updates']['errorOutput']}</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="updates[]" id="update1" value="newsletter" {$elementsArr['updates']['status']['newsletter']}>
      <label class="form-check-label" for="update1">Newsletter</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="updates[]" id="update2" value="emailUpdates" {$elementsArr['updates']['status']['emailUpdates']}>
      <label class="form-check-label" for="update2">Email Updates</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="updates[]" id="update3" value="textUpdates" {$elementsArr['updates']['status']['textUpdates']}>
      <label class="form-check-label" for="update3">Text Updates</label>
    </div>
        

    <p>Please select an age range (you must select one):{$elementsArr['age']['errorOutput']}</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="age" id="age1" value="10-18"  {$elementsArr['age']['value']['10-18']}>
      <label class="form-check-label" for="age1">10-18</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="age" id="age2" value="19-30"  {$elementsArr['age']['value']['19-30']}>
      <label class="form-check-label" for="age2">19-30</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="age" id="age3" value="30-50"  {$elementsArr['age']['value']['30-50']}>
      <label class="form-check-label" for="age3">30-50</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="age" id="age4" value="51+"  {$elementsArr['age']['value']['51+']}>
      <label class="form-check-label" for="age4">51+</label>
    </div>

    <div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

HTML;

  return [$acknowledgement, $form];
}
