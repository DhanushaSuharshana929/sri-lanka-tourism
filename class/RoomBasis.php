<?php

class RoomBasis {

    public $id;
    public $name;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`sort` FROM `room_basis` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->sort = $result['sort'];

            return $result;
        }
    }

    public function all() {

        $query = "SELECT * FROM `room_basis` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public static function getAllRoomBasisById($id) {

        $db = new Database();

        $query = "SELECT * FROM `room_basis` WHERE `id` = '" . $id . "' ";

        $result = $db->readQuery($query);

        $row = mysql_fetch_assoc($result);

        return $row;
    }

}
