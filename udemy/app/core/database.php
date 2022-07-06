<?php

// database class

class Database
{
    private function connect()
    {
        $str = DBDRIVER . ":hostname=" . DBHOST . ";dbname=" . DBNAME;
        return new PDO($str, DBUSER, DBPASS);
    }

    public function query($query, $data = [], $type = 'object')
    {
        $con = $this->connect();

        $stm = $con->prepare($query);

        if ($stm) {
            $check = $stm->execute($data);
            if ($check) {

                if ($type == 'object') {
                    $type = PDO::FETCH_OBJ;
                } else {
                    $type = PDO::FETCH_ASSOC;
                }

                $result = $stm->fetchAll($type);

                if (is_array($result) && count($result) > 0) {
                    return $result;
                }
            }
        }

        return false;
    }

    function create_tables()
    {
        //user table
        $query = "
        CREATE TABLE IF NOT EXISTS `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `email` varchar(100) NOT NULL,
            `password` varchar(255) NOT NULL,
            `created` date NOT NULL DEFAULT current_timestamp(),
            `firstName` varchar(100) NOT NULL,
            `lastName` varchar(100) NOT NULL,
            `phone` varchar(15) NOT NULL,
            `role` varchar(20) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `email` (`email`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
           
        ";

        $this->query($query);

        //shows table
        $query = "
        CREATE TABLE `shows` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `image` varchar(100) NOT NULL,
            `showTitle` varchar(100),
            `showDate` varchar(10),
            `showTime` varchar(10),
            `entryClosingDate` varchar(10),
            `council` varchar(100) NOT NULL,
            `sponsorName` varchar(100) NOT NULL,
            `location` varchar(100),
            `map` varchar(100),
            `additionalInformation` varchar(100),
            `rulesPath` varchar(100),
            `covidPath` varchar(100),
            `R1LHK` varchar(100),
            `R1LHE` varchar(100),
            `R1LHD` varchar(100),
            `R1SHK` varchar(100),
            `R1SHE` varchar(100),
            `R1SHD` varchar(100),
            `R1Companion` varchar(100),
            `R2LHK` varchar(100),
            `R2LHE` varchar(100),
            `R2LHD` varchar(100),
            `R2SHK` varchar(100),
            `R2SHE` varchar(100),
            `R2SHD` varchar(100),
            `R2Companion` varchar(100),
            `R3LHK` varchar(100),
            `R3LHE` varchar(100),
            `R3LHD` varchar(100),
            `R3SHK` varchar(100),
            `R3SHE` varchar(100),
            `R3SHD` varchar(100),
            `R3Companion` varchar(100),
            `R4LHK` varchar(100),
            `R4LHE` varchar(100),
            `R4LHD` varchar(100),
            `R4SHK` varchar(100),
            `R4SHE` varchar(100),
            `R4SHD` varchar(100),
            `R4Companion` varchar(100),
            `R5LHK` varchar(100),
            `R5LHE` varchar(100),
            `R5LHD` varchar(100),
            `R5SHK` varchar(100),
            `R5SHE` varchar(100),
            `R5SHD` varchar(100),
            `R5Companion` varchar(100),
            `R6LHK` varchar(100),
            `R6LHE` varchar(100),
            `R6LHD` varchar(100),
            `R6SHK` varchar(100),
            `R6SHE` varchar(100),
            `R6SHD` varchar(100),
            `R6Companion` varchar(100),
            `managersName` varchar(100),
            `managersPhone` varchar(100),
            `managersEmail` varchar(100),
            `entryTicketPrice` INT,
            `entryTicketCount` INT,
            `secondEntryTicketPrice` INT,
            `smallCagePrice` INT,
            `largeCagePrice` INT,
            `cataloguePrice` INT,
            `rafflePrice` INT,
            `raffleTicketCount` INT,
            `created` varchar(20),
            `userEmail` varchar(200),
            `approved` tinyint(1),
            `published` tinyint(1),
            `draft` tinyint(1),
            PRIMARY KEY (`id`)
          );          
        ";

        $this->query($query);

        //Councils table
        $query = "
        CREATE TABLE IF NOT EXISTS `councils` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `council` varchar(100) NOT NULL,
            `councilName` varchar(100) NOT NULL,
            `councilImagePath` varchar(100) DEFAULT NULL,
            `street` varchar(100) NOT NULL,
            `suburb` varchar(100) NOT NULL,
            `state` varchar(100) NOT NULL,
            `postcode` varchar(100) NOT NULL,
            `councilPhone` varchar(100) DEFAULT NULL,
            `councilEmail` varchar(100) DEFAULT NULL,
            `councilURL` varchar(100) DEFAULT NULL,
            `dateCreated` date DEFAULT current_timestamp(),
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ";
        $this->query($query);

        //sponsors table
        $query = "
        CREATE TABLE IF NOT EXISTS `sponsors` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `sponsor` varchar(100) NOT NULL,
            `sponsor_image` varchar(1024) NOT NULL,
            `sponsor_url` varchar(1024) NOT NULL,
            `disabled` tinyint(1) NOT NULL DEFAULT 0,
            PRIMARY KEY (`id`),
            KEY `sponsor` (`sponsor`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ";
        $this->query($query);

        //role table
        $query = "
        CREATE TABLE IF NOT EXISTS `bookings` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `show_id` varchar(10) NOT NULL,
            `show_date` varchar(20) NOT NULL,
            `cat_id` varchar(10) NOT NULL,
            `email` varchar(200) NOT NULL,
            `raffleQty` varchar(3) DEFAULT NULL,
            `created` varchar(20) NOT NULL,
            `user_id` varchar(10) NOT NULL,
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4
        ";
        $this->query($query);

        //bookings table
        $query = "
        CREATE TABLE IF NOT EXISTS `roles` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `role` varchar(200) NOT NULL,
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4
        ";
        $this->query($query);
    }
}
