<?php
//        error_reporting(0);
  define("SQL_HOST","wm81.wedos.net");
  define("SQL_DBNAME","d92135_kr");
  define("SQL_USERNAME","w92135_kr");
  define("SQL_PASSWORD","4txCATLm");
/* NASTAVENÍ DATABÁZOVÉHO SERVERU */
        $db_server = "wm81.wedos.net";       /* Zde vepište jméno databázového serveru. Napø. $db_server = "localhost"; */
        $db_login = "a92135_kr";             /* Zde vepište pøihlašovací jméno do Vaší databáze. Napø. $db_login = "jmeno"; */
        $db_heslo = "xsaEAWKv";             /* Zde vepište pøihlašovací heslo do Vaší databáze. Napø. $db_heslo = "heslo"; */
        $db_jmeno = "d92135_kr";            /* Zde vepište jméno databáze, do které chcete návštìvní knihu nainstalovat. Napø. $db_jmeno = "databaze"; */
        
/* NASTAVENÍ PØIHLAŠOVACÍCH ÚDAJÙ DO ADMINSTRACE VAŠÍ NÁVŠTÌVNÍ KNIHY */
        $prihlasovaci_jmeno = "admin";  /* Zde vepište pøihlašovací jméno do administrace Vaší návštìvní knihy. Napø. $prihlasovaci_jmeno = "admin"; */
        $heslo = "koneridec";               /* Zde vepište heslo pro pøihlášení do administrace Vaší návštìvní knihy. Napø. $heslo = "heslo"; */

/* PØIPOJENÍ K DB SERVERU */        
        $hlavicka = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html><head><meta http-equiv=\"Content-type\" content=\"text/html; charset=windows-1250\" /><title>Guestbook - chybové hlášení</title></he".$z."ad><bo".$z."dy>";
        $paticka = "</bo".$z."dy></ht".$z."ml>";
        $pass = md5($heslo);
        
        @mysql_pconnect("$db_server","$db_login","$db_heslo") or die($hlavicka."Nepodaøilo se pøipojit k databázovému serveru.".$paticka);
        @mysql_select_db("$db_jmeno") or die ($hlavicka."Nepodaøilo se pøojit k databázi.".$paticka);
        $set = @mysql_query ('SET NAMES cp1250');
?>