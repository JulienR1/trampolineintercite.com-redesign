<?php

class mFooter extends DatabaseHandler{

    public function GetPartners(){
        $sql = "SELECT * FROM partners";
        return self::query($sql);
    }

}