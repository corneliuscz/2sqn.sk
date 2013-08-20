<?php
include ("includes/_db_config.inc.php");

$db = MySQL_Connect($server_name, $db_user, $db_pass) or die('Nepodařilo se připojit k MySQL databázi');    //pripojenie ku databáze
MySQL_Select_DB($db_name, $db) or die('Nepodařila se otevřít databáze.');                                    //výber databázy
if (function_exists ("mysql_set_charset")) { mysql_set_charset('utf8',$db); }                                // PHP5
else { mysql_query("SET NAMES 'utf8'"); }                                                                    // PHP4
?>
