<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head><meta http-equiv="Content-type" content="text/html; charset=windows-1250" /><title>Guestbook - instalace</title></head><body>
<?php
        if(file_exists("konfigurace.php")) {
                include("konfigurace.php");

                $sql = "SHOW TABLES;";
                $query = mysql_query($sql) or die($hlavicka."Chyba datab�ze. Zkuste pros�m akci zopakovat pozd�ji.<br /><a href='javascript:history.go(-1)'>Zp�t</a>".$paticka);
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
                        die($hlavicka."Instalace t�to n�v�t�vn� knihy byla ji� provedena. Chcete-li ji nainstalovat znovu, mus�te nejd��ve prov�st jej� odinstalaci v administraci.<br /><a href='javascript:history.go(-1)'>Zp�t</a>".$paticka);
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
                        print("Nepoda�ilo se vytvo�it datab�zovou tabulku <b>gb_data</b><br />"); 
                        $overeni = 1;
                }

                $sql = "SELECT id FROM gb_data LIMIT 1;";
                $row = mysql_fetch_array(mysql_query($sql));
                if(!$row) {
                        $sql = "INSERT INTO gb_data SET zprava = 'N�v�t�vn� kniha byla �sp�n� vytvo�ena. Jej� nastaven� lze m�nit v <a href=\"admin.php\">administraci</a>, kde lze takt� smazat tento informa�n� p��sp�vek.<br /><br />D�kuji za instalaci t�to knihy - <a href=\"http://www.php.jonweb.cz\">php.jonweb.cz</a>.', jmeno = 'info';";
                        mysql_query($sql);
                }

                $sql = "CREATE TABLE IF NOT EXISTS gb_ip_ban (
                        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        ip VARCHAR(30) NOT NULL
                        )
                        ";

                if(!mysql_query($sql)) {
                        print("Nepoda�ilo se vytvo�it datab�zovou tabulku <b>gb_ip_ban</b><br />"); 
                        $overeni = 1;
                }
                        
                $sql = "CREATE TABLE IF NOT EXISTS gb_jmena (
                        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        jmeno VARCHAR(60) NOT NULL,
                        heslo VARCHAR(250) NOT NULL
                        )
                       ";

                if(!mysql_query($sql)) {
                        print("Nepoda�ilo se vytvo�it datab�zovou tabulku <b>gb_jmena</b><br />"); 
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
                        print("Nepoda�ilo se vytvo�it datab�zovou tabulku <b>gb_nastaveni</b><br />");
                        $overeni = 1;
                }
                
                $sql = "INSERT INTO gb_nastaveni (id,jmeno,na_stranku,historie,antispam,jmena,smajlici) VALUES ('1','N�v�t�vn� kniha','10','100','1','1','1');";
                
                if(!mysql_query($sql)) {
                        print("P�i zpracov�n� do�lo k chyb�. Zkuste pros�m akci opakovat.");
                        $overeni = 1;
                }
                
                if($overeni == 1) {
                        print("<br />Jedna nebo v�ce datab�zov�ch tabulek nebyla vytvo�ena. Instalace nem��e b�t dokon�ena. Zkuste pros�m akci <a href=\"instalace.php\">zopakovat</a> pop��pad� zm�nit nastaven� v konfigura�n�m souboru <b>konfigurace.php</b>.");
                } else {
                        print("Datab�zov� tabulky byly �sp�n� vytvo�eny. Nyn� ji� m��ete <a href=\"index.php\">n�v�t�vn� knihu</a> pou��vat, pop��pad� <a href=\"admin.php\">zm�nit jej� nastaven�</a>.");
                }
                
        } else {
                die("Soubory <b>konfigurace.php, styl.php</b> nebyly nalezeny, instalace nem��e pokra�ovat!");
        }
?>
</body></html>