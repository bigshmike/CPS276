<?php
class CreateDirectory {
    function createDirectory() {
        $folderName = $_POST['folderName'];
        $fileContent = $_POST['fileContent'];

        if (isset($_POST['submit'])) {
            if (!file_exists($folderName)) {
                try {
                    mkdir("/home/m/b/mbrown99/public_html/CPS276/Assignments/assignment5/directories/$folderName", 0777, true);
                    chmod("/home/m/b/mbrown99/public_html/CPS276/Assignments/assignment5/directories/$folderName", 0777);
                    touch("/home/m/b/mbrown99/public_html/CPS276/Assignments/assignment5/directories/$folderName/readme.txt");
                    $handle = fopen("/home/m/b/mbrown99/public_html/CPS276/Assignments/assignment5/directories/$folderName/readme.txt", "r+");
                    fwrite($handle, $fileContent);
                }
                catch (Exception $e) {
                    
                }
                finally {
                    fclose($handle);
                }
            }
            
        }
    }

    function getLinkToFile() {
        $folderName = $_POST['folderName'];
        $linkToFile = "https://russet-v8.wccnet.edu/~mbrown99/CPS276/Assignments/assignment5/directories/$folderName/readme.txt";
        echo "<a href='$linkToFile'>View your file on the server here.</a>";
    }
}
?>