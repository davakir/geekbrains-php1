<?php
require_once('mysql_db_service.php');
    function review_plus($img_name) {
        $conn = connect();
        mysql_query("UPDATE images SET time_seen = time_seen + 1 WHERE name = '" . mysql_real_escape_string($img_name) . "'", $conn);
    }
    
    function get_reviews($img_name) {
        $conn = connect();
        $query = mysql_query("SELECT time_seen FROM images WHERE name LIKE '".$img_name."'", $conn);
        $data = mysql_fetch_assoc($query);
        return $data['time_seen'];
    }
    
    function getVarCaption($var, $val_1, $val_2, $val_3) {
        $str = $var . " ";
        $tmp = $var%10;
        if ($var < 10 || $var > 20) {
            if ($tmp == 1) {
                $str .= $val_1;
            }
            else if ($tmp >=2 && $tmp <= 4) {
                $str .= $val_2;
            }
            else $str .= $val_3;
        }
        else $str .= $val_3;
        return $str;
    }
?>