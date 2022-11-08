<?php
class ListFileProc {
    function viewUploadedFiles() {
        foreach (glob('./uploads/*') as $files) {
            echo '<li><a href="'.$files.'" target=_blank>'.basename($files).'</a></li>';
        }
    }
}
?>