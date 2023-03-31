<?php

class UserModel
{

    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function getUsers()
    {
        $SQL = "
            SELECT users.name as 'name',
                    cities.city_name as 'city',
                    provinces.province_name as 'province',
                    countries.country_name as 'country'
            FROM users
            JOIN cities ON (users.city_id = cities.city_id)
            JOIN provinces ON (cities.province_id = provinces.province_id)
            JOIN countries ON (provinces.country_id = countries.country_id)
        ";

        $users = $this->db->query($SQL, PDO::FETCH_ASSOC)->fetchAll();

        return $users;
    }
}
