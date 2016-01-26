<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head><meta http-equiv="Content-type" content="text/html; charset=windows-1250" /><title>Guestbook - instalace</title></head><body>
<?php
        if(file_exists("konfigurace.php")) {
                include("konfigurace.php");

                $sql = "SHOW TABLES;";
                $query = mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat později.<br /><a href='javascript:history.go(-1)'>Zpět</a>".$paticka);
                while($row = mysql_fetch_array($query)) {
                        $tabulky[] = $row[0];
                }
                
                $i = 0;
                foreach ($tabulky as $tabulka) {
                        if(($tabulka == "gb_data") || ($tabulka == "gb_nastaveni") || ($tabulka == "gb_ip_ban") || ($tabulka == "gb_jmena")) {
                                $i++;
                        }
                }
                
                if($i == 4) {
                        die($hlavicka."Instalace této návštěvní knihy byla již provedena. Chcete-li ji nainstalovat znovu, musíte nejdříve provést její odinstalaci v administraci.<br /><a href='javascript:history.go(-1)'>Zpět</a>".$paticka);
                }
                
                $overeni = 0;
                $sql = "CREATE TABLE IF NOT EXISTS gb_data (
                        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        zprava TEXT NOT NULL,
                        jmeno VARCHAR(60) NOT NULL,
                        datum VARCHAR(20) NOT NULL,
                        icq INT UNSIGNED NULL,
                        email VARCHAR(100) NULL,
                        www VARCHAR(100) NULL,
                        ip VARCHAR(30) NOT NULL
                        )
                        ";

                if(!mysql_query($sql)) {
                        print("Nepodařilo se vytvořit databázovou tabulku <b>gb_data</b><br />"); 
                        $overeni = 1;
                }

                $sql = "SELECT id FROM gb_data LIMIT 1;";
                $row = mysql_fetch_array(mysql_query($sql));
                if(!$row) {
                        $sql = "INSERT INTO gb_data SET zprava = 'Návštěvní kniha byla úspěšně vytvořena. Její nastavení lze měnit v <a href=\"admin.php\">administraci</a>, kde lze taktéž smazat tento informační příspěvek.<br /><br />Děkuji za instalaci této knihy - <a href=\"http://www.php.jonweb.cz\">php.jonweb.cz</a>.', jmeno = 'info';";
                        mysql_query($sql);
                }

                $sql = "CREATE TABLE IF NOT EXISTS gb_ip_ban (
                        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        ip VARCHAR(30) NOT NULL
                        )
                        ";

                if(!mysql_query($sql)) {
                        print("Nepodařilo se vytvořit databázovou tabulku <b>gb_ip_ban</b><br />"); 
                        $overeni = 1;
                }
                        
                $sql = "CREATE TABLE IF NOT EXISTS gb_jmena (
                        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        jmeno VARCHAR(60) NOT NULL,
                        heslo VARCHAR(250) NOT NULL
                        )
                       ";

                if(!mysql_query($sql)) {
                        print("Nepodařilo se vytvořit databázovou tabulku <b>gb_jmena</b><br />"); 
                        $overeni = 1;
                }
                
                $sql = "CREATE TABLE IF NOT EXISTS gb_nastaveni (
                        id SMALLINT NOT NULL,
                        jmeno VARCHAR(100) NOT NULL,
                        na_stranku SMALLINT UNSIGNED NOT NULL,
                        historie SMALLINT UNSIGNED NOT NULL,
                        antispam SMALLINT NOT NULL,
                        jmena SMALLINT NOT NULL,
                        smajlici SMALLINT NOT NULL
                        ) 
                        ";
                        
                if(!mysql_query($sql)) {
                        print("Nepodařilo se vytvořit databázovou tabulku <b>gb_nastaveni</b><br />");
                        $overeni = 1;
                }
                
                $sql = "INSERT INTO gb_nastaveni (id,jmeno,na_stranku,historie,antispam,jmena,smajlici) VALUES ('1','Návštěvní kniha','10','100','1','1','1');";
                
                if(!mysql_query($sql)) {
                        print("Při zpracování došlo k chybě. Zkuste prosím akci opakovat.");
                        $overeni = 1;
                }
                
                if($overeni == 1) {
                        print("<br />Jedna nebo více databázových tabulek nebyla vytvořena. Instalace nemůže být dokončena. Zkuste prosím akci <a href=\"instalace.php\">zopakovat</a> popřípadě změnit nastavení v konfiguračním souboru <b>konfigurace.php</b>.");
                } else {
                        print("Databázové tabulky byly úspěšně vytvořeny. Nyní již můžete <a href=\"index.php\">návštěvní knihu</a> používat, popřípadě <a href=\"admin.php\">změnit její nastavení</a>.");
                }
                
        } else {
                die("Soubory <b>konfigurace.php, styl.php</b> nebyly nalezeny, instalace nemůže pokračovat!");
        }
?>
</body></html>