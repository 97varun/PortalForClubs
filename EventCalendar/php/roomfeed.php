<?php
    require "dbhandler.php";
    require "colorpicker.php";

    function format_data($rows) {
        $resp = array();
        $color_picker = new ColorPicker;
        $events = array();
        foreach ($rows as $row) {
            $from     = $row["from_d"];
            $to     = $row["to_d"];
            $bg_color = $color_picker->get_background_color($row["roomid"]);
            $txt_color = $color_picker->get_text_color($bg_color);
            $resp[] = array(
                "id"    => $row["roomid"],
                "title" => $row["roomname"] . " (" . $row["b_name"] . ")",
                "start" => date("c", strtotime("$from")),
                "end"   => date("c", strtotime("$to")),
                "desc"  => $row["b_name"],
                "color" => $bg_color,
                "textColor" => $txt_color
            );
        }
        return $resp;
    }
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        extract($_GET);
        if (isset($start) && isset($end)) {
            $db_handler = new DatabaseHandler;
            $rows = $db_handler->getBookingInfo($start, $end);
            $resp = format_data($rows);
            echo json_encode($resp);
        } else {
            echo "invalid request";
        }
    }
?>