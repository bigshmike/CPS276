<?php
$output = "";

class AddNames {
    function addName() {
        $output = <<<HTML
                {$_POST['namefield']}
            HTML;
    }
}
