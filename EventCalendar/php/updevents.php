<?php
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    ob_start();
    ob_flush();
    flush();
    function get_filemtime($filename) {
        clearstatcache();
        return filemtime($filename);
    }
    $oldtime = get_filemtime("timestamp/oldtime");
    while (1) {
        $newtime = get_filemtime("timestamp/newtime");
        if ($newtime > $oldtime) {
            touch("timestamp/oldtime");
            echo "retry: 4000\n";
            echo "data: refetch\n\n";
            ob_flush();
            flush();
            break;
        }
        sleep(3);
    }
?>