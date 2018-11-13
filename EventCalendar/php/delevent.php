<?php
    require "dbhandler.php";
    session_start();
    extract($_SESSION);
    function getAccessibleEvents($srn) {
        $db_handler = new DatabaseHandler;
        $rows = $db_handler->getAccessibleEventsFromDb($srn);
        $events = array();
        foreach ($rows as $row) {
            $events[] = $row["event_id"];
        }
        return $events;
    }
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
                touch("timestamp/newtime");
                echo "deleted";
            } else {
                echo "error deleting event";
            }
        } else {
            echo "invalid request";
        }
    }
?>