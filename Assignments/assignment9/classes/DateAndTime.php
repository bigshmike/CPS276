<?php
require 'PdoMethods.php';

class DateAndTime extends PdoMethods {
    function createNote() {
        $dateAndTime = $_POST['dateAndTime'];
        $note = $_POST['note'];

        if ($dateAndTime == null) {
            return "A date and time must be entered";
        }
        if ($note == null) {
            return "You cannot save a blank note";
        } 
        else {
            $pdo = new PdoMethods();
            $sql = "INSERT INTO notes (date_and_time, note_contents) VALUES (:dateAndTime, :noteContents)";
            $ts = strtotime($_POST['dateAndTime']);
            $bindings = [
                [':dateAndTime', $ts, 'int'],
                [':noteContents', $_POST['note'], 'str']
            ];
            $result = $pdo->otherBinded($sql, $bindings);

            if ($result === 'error') {
                return "There was an error adding the note";
            }
        }
        return "Great, your note was created successfully";
    }

    function getNotes() {
        $beginningDate = strtotime($_POST['begDate']);
        $endingDate = strtotime($_POST['endDate']);

        $pdo = new PdoMethods();
        $sql = "SELECT * FROM notes WHERE date_and_time BETWEEN '$beginningDate' AND '$endingDate' ORDER BY date_and_time desc";
        $records = $pdo->selectNotBinded($sql);

        if ($records == null) {
            return "There are no notes for the selected dates";
        }
        if ($records == 'error') {
            return 'There has been and error processing your request';
        } 
        else {
            if (count($records) != 0) {
                foreach ($records as $row) {
                    $list = '<table class="table">';
                    $list .= '<tr>';
                    $list .= '<th>Date and Time</th>';
                    $list .= '<th>Note</th>';
                    $list .= '</tr>';
                    $list .= '<tr>';
                    foreach ($records as $row) {
                        $customTimestamp = date("m\-d\-Y h\:i A", $row['date_and_time']);
                        $list .= "<td>{$customTimestamp}</td><td>{$row['note_contents']}</td></tr>";
                    }
                    $list .= '</tr>';
                    $list .= '</table>';
                }
                return $list;
            }
        }
    }
}