<?php

class AddNames {
    function addName() {
        $output = <<<HTML
                {$_POST['namefield']}
            HTML;
            return $output;
    }
}