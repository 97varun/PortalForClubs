<?php
    require "dbhandler.php";
    require "colorpicker.php";
    require "chkaccess.php";
    session_start();
    extract($_SESSION);
    function format_data($rows) {
        global $srn;
        $resp = array();
        $color_picker = new ColorPicker;
        $events = array();
        if (isset($srn)) {
            $events = getAccessibleEvents($srn);
        }
        foreach ($rows as $row) {
            $date     = $row["date"];
            $time     = $row["time"];
            $end_time = $row["end_time"];
            $bg_color = $color_picker->get_background_color($row["club_id"]);
            $txt_color = $color_picker->get_text_color($bg_color);
            $resp[] = array(
                "id"    => $row["event_id"],
                "title" => $row["event_name"],
                "start" => date("c", strtotime("$date $time")),
                "end"   => date("c", strtotime("$date $end_time")),
                "club"  => $row["club_name"],
                "desc"  => $row["more_info"],
                "venue" => $row["place"],
                "color" => $bg_color,
                "textColor" => $txt_color,
                "showDelete" => (in_array($row["event_id"], $events))
            );
        }
        return $resp;
    }
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        extract($_GET);
        if (isset($start) && isset($end)) {
            $db_handler = new DatabaseHandler;
            $rows = $db_handler->getEventsFromDb($start, $end);
            $resp = format_data($rows);
            echo json_encode($resp);
        } else {
            echo "invalid request";
        }
    }
?>