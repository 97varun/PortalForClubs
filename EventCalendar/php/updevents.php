<?php
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    ob_start();
    ob_flush();
    flush();
    session_start();
    extract($_SESSION);
    if (!isset($oldtime)) {
        clearstatcache();
        $oldtime = filemtime("updated");
    }
    while (1) {
        clearstatcache();
        $newtime = filemtime("updated");
        if ($newtime > $oldtime) {
            echo "retry: 100\n";
            echo "data: refetch\n\n";
            ob_flush();
            flush();
            $oldtime = $newtime;
            $_SESSION["oldtime"] = $oldtime;
            break;
        }
        sleep(3);
    }
?>