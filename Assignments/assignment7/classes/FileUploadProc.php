<?php
require 'PdoMethods.php';

class FileUploadProc extends PdoMethods {
    function fileUploadProc() {
        $file = $_FILES['fileUpload'];
        $uploadFolder = "./uploads/";
        $fileName = $uploadFolder . $_POST['fileNameField'];
        $fileType = $_FILES['fileUpload']['type'];
        $fileSize = $_FILES['fileUpload']['size'];

        if ($fileType !== "application/pdf") {
            return "Only PDF documents are able to be uploaded";
        }
        if ($fileSize > 100000) {
            return "The max file size is 100,000 bytes";
        }
        if ($_POST['fileNameField'] == $fileName) {
            return "That file name already exists";
        }
        else {
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], $fileName);
            $pdo = new PdoMethods();
            $sql = "INSERT INTO pdo (name_of_file, path_to_file) VALUES (:nameOfFile, :pathToFile)";
            $bindings = [
                [':nameOfFile',$_POST['fileNameField'], 'str'],
                [':pathToFile',$fileName, 'str']
            ];
    
            $result = $pdo->otherBinded($sql, $bindings);
    
            if ($result === 'error') {
                return "There was an error";
            }
            else {
                return "Everything was O.K.";
            }
            return "Great, your PDF document was uploaded";
        }   
    }
}
