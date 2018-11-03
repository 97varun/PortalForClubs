<?php
    function getAccessibleEvents($srn) {
        $db_handler = new DatabaseHandler;
        $rows = $db_handler->getAccessibleEventsFromDb($srn);
        $events = array();
        foreach ($rows as $row) {
            $events[] = $row["event_id"];
        }
        return $events;
    }
?>