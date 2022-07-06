<?php

// App info

define('APP_NAME', 'PHP Framework');
define('APP_DESC', 'PHP Server Framework');


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
    define('DBNAME', 'udemy');
    define('DBUSER', 'root');
    define('DBPASS', 'root');
    define('DBDRIVER', 'mysql');
}