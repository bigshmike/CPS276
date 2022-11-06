<?php
class CreateDirectory {
    function createDirectory() {
        $folderName = $_POST['folderName'];
        $fileContent = $_POST['fileContent'];

        if (isset($_POST['submit'])) {
            if (is_dir("directories/$folderName")) {
                return "A directory with that name already exists.";
            } 
            else {
                mkdir("directories/$folderName", 0777, true);
                chmod("directories/$folderName", 0777);
                touch("directories/$folderName/readme.txt");
                $handle = fopen("directories/$folderName/readme.txt", "r+");
                fwrite($handle, $fileContent);
                $linkToFile = "https://russet-v8.wccnet.edu/~mbrown99/CPS276/Assignments/assignment5/directories/$folderName/readme.txt";
                $successfulStatement = "<a href=$linkToFile>Path to where the file is located</a>";
                return $successfulStatement;
            }
        }
    }
}
