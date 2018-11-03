<?php
    require "dbhandler.php";
    require "chkaccess.php";
    session_start();
    extract($_SESSION);
    function hasAccess($event_id) {
        global $srn;
        if (isset($srn)) {
            $events = getAccessibleEvents($srn);
            return in_array($event_id, $events);
        }
        return false;
    }
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        extract($_GET);
        if (isset($event_id) && hasAccess($event_id)) {
            $db_handler = new DatabaseHandler;
            $result = $db_handler->deleteEventFromDb($event_id);
            if ($result === TRUE) {
                touch("updated");
                echo "deleted";
            } else {
                echo "error deleting event";
            }
        } else {
            echo "invalid request";
        }
    }
?>