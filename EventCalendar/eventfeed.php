<?php
    extract($_GET);
    // echo $start . " " . $end;
    // TODO: fetch events between start date and end date from database (take care of overlaps)
    $ev1 = array(
        "title" => "Chess tournament", 
        "start" => "2018-10-15T15:20:00+00:00",
        "end"   => "2018-10-15T16:20:00",
        "desc"  => "People will play chess against each other. Please take part.", 
        "venue" => "G Block");
    $ev2 = array(
        "title" => "Badminton tournament", 
        "start" => "2018-10-21T09:00:00+00:00",
        "end"   => "2018-10-27T15:00:00",
        "desc"  => "Exciting prizes to be won. Please carry your own rackets.", 
        "venue" => "MRD Auditorium");
    $resp = array($ev1, $ev2);
    echo json_encode($resp);
?>