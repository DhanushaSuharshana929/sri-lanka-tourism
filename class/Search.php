<?php

class Search {

    public function GetTransportByLocationFromAndTo($from, $to, $type, $condition, $passengers, $pageLimit, $setLimit) {

        $w = array();
        $where = '';

        if (!empty($from)) {
            $w[] = "`location_from` = '" . $from . "'";
        }

        if (!empty($to)) {
            $w[] = "`location_to` = '" . $to . "'";
        }

        if (!empty($type)) {
            $w[] = "`vehicle_type` = '" . $type . "'";
        }
        if (!empty($condition)) {
            $w[] = "`condition` = '" . $condition . "'";
        }
        if (!empty($passengers)) {
            $w[] = "`no_of_passangers` >= '" . $passengers . "'";
        }
        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $query = "SELECT transports.*, transport_rates.id AS transport_rate FROM `transports` INNER JOIN transport_rates ON transports.id = transport_rates.transport_id $where LIMIT " . $pageLimit . " , " . $setLimit . "";

       
        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function showPagination($from, $to, $type, $condition, $passengers, $per_page, $page) {

        $w = array();
        $where = '';

        if (!empty($from)) {
            $w[] = "`location_from` = '" . $from . "'";
        }

        if (!empty($to)) {
            $w[] = "`location_to` = '" . $to . "'";
        }

        if (!empty($type)) {
            $w[] = "`vehicle_type` = '" . $type . "'";
        }

        if (!empty($condition)) {
            $w[] = "`condition` = '" . $condition . "'";
        }
        
        if (!empty($passengers)) {
            $w[] = "`no_of_passangers` >= '" . $passengers . "'";
        }
        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $page_url = "?";
        $query = "SELECT COUNT(*) as totalCount FROM `transports` INNER JOIN transport_rates ON transports.id = transport_rates.transport_id $where";


        $rec = mysql_fetch_array(mysql_query($query));

        $total = $rec['totalCount'];

        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $setLastpage = ceil($total / $per_page);
        $lpm1 = $setLastpage - 1;

        $setPaginate = "";
        if ($setLastpage > 1) {
            $setPaginate .= "<ul class='setPaginate'>";
            $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
            if ($setLastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $setLastpage; $counter++) {
                    if ($counter == $page)
                        $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                    else
                        $setPaginate .= "<li><a href='{$page_url}page=$counter&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>$counter</a></li>";
                }
            }
            elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'>...</li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>$setLastpage</a></li>";
                }
                elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $setPaginate .= "<li><a href='{$page_url}page=1&&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>2</a></li>";
                    $setPaginate .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'>..</li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1&&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>$setLastpage</a></li>";
                }
                else {
                    $setPaginate .= "<li><a href='{$page_url}page=1&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>2</a></li>";
                    $setPaginate .= "<li class='dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $setPaginate .= "<li><a href='{$page_url}page=$next&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>Next</a></li>";
                $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&from=$from&to=$to&type=$type&condition=$condition&passengers=$passengers'>Last</a></li>";
            } else {
                $setPaginate .= "<li><a class='current_page'>Next</a></li>";
                $setPaginate .= "<li><a class='current_page'>Last</a></li>";
            }

            $setPaginate .= "</ul>\n";
        }

        echo $setPaginate;
    }

}