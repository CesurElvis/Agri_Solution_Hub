<?php

define('NAME','Agri_solution_Hub');
define('DEBUG',"true");

if($_SERVER['SERVER_NAME'] == '127.0.0.1')
{
    define('DBHOST','127.0.0.1');
    define('DBUSER','cesur');
    define('DBNAME','Agri_Solution_Hub');
    define('DBDRIVER','mysql');
    define('DBPASS','cesurjmm');
    define('ROOT','http://127.0.0.1/PROJECTS/Agri_Solution_Hub/system/public_html');
}
else
{
    define('DBHOST','localhost');
    define('DBUSER','id18446227_guru');
    define('DBNAME','id18446227_agritech');
    define('DBDRIVER','mysql');
    define('DBPASS','7sCSsfSjkrJj6Y7)');
    define('ROOT','https://cyber-mentor1.000webhostapp.com');
}

