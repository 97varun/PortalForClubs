<?php
    class DatabaseHandler {
        var $servername, $username, $password, $dbname, $conn;
        public function __construct() {
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "portal";
            $this->conn = new mysqli(
                            $this->servername,
                            $this->username, 
                            $this->password, 
                            $this->dbname);
            if ($this->conn->connect_error) {
                die("Connection to database failed" . $this->conn->connect_error);
            }
        }
        private function getRows($result) {
            $rows = array();
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
            }
            return $rows;
        }
        public function getEventsFromDb($start, $end) {
            $start = date("Y-m-d", strtotime($start));
            $end = date("Y-m-d", strtotime($end));
            $sql = "SELECT event_id, ev.club_id, event_name, club_name, date, time, end_time, more_info, place
                    FROM create_event AS ev
                    JOIN club ON ev.club_id = club.club_id
                    WHERE date >= \"$start\" AND date <= \"$end\";";
            $result = $this->conn->query($sql);
            $rows = $this->getRows($result);
            return $rows;
        }
        public function deleteEventFromDb($event_id) {
            $sql = "DELETE 
                    FROM create_event
                    WHERE event_id = $event_id";
            $result = $this->conn->query($sql);
            return $result;
        }
        public function getAccessibleEventsFromDb($srn) {
            $sql = "SELECT ev.event_id
                    FROM create_event AS ev
                    JOIN club AS cb 
                    ON ev.club_id = cb.club_id
                    JOIN admin AS adm
                    ON adm.club_id = cb.club_id
                    WHERE adm.admin_usn = '$srn';";
            $result = $this->conn->query($sql);
            $rows = $this->getRows($result);
            return $rows;
        }
        public function __destruct() {
            $this->conn->close();
        }
    }
?>