<?php

// App info

define('APP_NAME', 'Cat A Log');
define('APP_DESC', 'Cat Shows Australia');


// Database config

if($_SERVER['SERVER_NAME'] == 'localhost')
{
    // local
    define('DBHOST', 'localhost');
    define('DBNAME', 'udemy_db');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');

    //root path
    define('ROOT', 'http://localhost/udemy-clone/udemy/public');

} else
{
    //live
    define('HOSTNAME', 'localhost');
    define('DBNAME', 'caca75768_catalog');
    define('DBUSER', 'caca75768_john');
    define('DBPASS', 'HSJR7gp1%h7M');
    define('DBDRIVER', 'mysql');

    define('ROOT', 'https://cat-a-log.com.au');
}