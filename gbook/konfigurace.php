<?php
//        error_reporting(0);
  define("SQL_HOST","wm81.wedos.net");
  define("SQL_DBNAME","d92135_kr");
  define("SQL_USERNAME","w92135_kr");
  define("SQL_PASSWORD","4txCATLm");
/* NASTAVEN� DATAB�ZOV�HO SERVERU */
        $db_server = "wm81.wedos.net";       /* Zde vepi�te jm�no datab�zov�ho serveru. Nap�. $db_server = "localhost"; */
        $db_login = "a92135_kr";             /* Zde vepi�te p�ihla�ovac� jm�no do Va�� datab�ze. Nap�. $db_login = "jmeno"; */
        $db_heslo = "xsaEAWKv";             /* Zde vepi�te p�ihla�ovac� heslo do Va�� datab�ze. Nap�. $db_heslo = "heslo"; */
        $db_jmeno = "d92135_kr";            /* Zde vepi�te jm�no datab�ze, do kter� chcete n�v�t�vn� knihu nainstalovat. Nap�. $db_jmeno = "databaze"; */
        
/* NASTAVEN� P�IHLA�OVAC�CH �DAJ� DO ADMINSTRACE VA�� N�V�T�VN� KNIHY */
        $prihlasovaci_jmeno = "admin";  /* Zde vepi�te p�ihla�ovac� jm�no do administrace Va�� n�v�t�vn� knihy. Nap�. $prihlasovaci_jmeno = "admin"; */
        $heslo = "koneridec";               /* Zde vepi�te heslo pro p�ihl�en� do administrace Va�� n�v�t�vn� knihy. Nap�. $heslo = "heslo"; */

/* P�IPOJEN� K DB SERVERU */        
        $hlavicka = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html><head><meta http-equiv=\"Content-type\" content=\"text/html; charset=windows-1250\" /><title>Guestbook - chybov� hl�en�</title></he".$z."ad><bo".$z."dy>";
        $paticka = "</bo".$z."dy></ht".$z."ml>";
        $pass = md5($heslo);
        
        @mysql_pconnect("$db_server","$db_login","$db_heslo") or die($hlavicka."Nepoda�ilo se p�ipojit k datab�zov�mu serveru.".$paticka);
        @mysql_select_db("$db_jmeno") or die ($hlavicka."Nepoda�ilo se p�ojit k datab�zi.".$paticka);
        $set = @mysql_query ('SET NAMES cp1250');
?>