<?php
if(file_exists("konfigurace.php")) {
        include("konfigurace.php");
} else {
        die("Konfiguraèní soubor <b>konfigurace.php</b> nebyl nalezen.");
}

parse_str($_SERVER[QUERY_STRING]);

function data() {
        $sql = "SELECT * FROM gb_nastaveni WHERE id = '1';";
        $row = mysql_fetch_array(mysql_query($sql));
        return $row;
}
list($cislo,$jmeno_knihy,$na_stranku,$historie,$antispam,$jmena,$smajlici) = data();

function prihlaseni($login,$heslo2) {
        if(file_exists("konfigurace.php")) {
                include("konfigurace.php");
        } else {
                die("Konfiguraèní soubor <b>konfigurace.php</b> nebyl nalezen.");
        }
        if(($prihlasovaci_jmeno == $login) && (md5($heslo2) == $pass)) {
                $_SESSION[gb_login] = $login;
                $_SESSION[gb_heslo] = $pass;
                header("Location: admin.php?akce=obecna");
        } else {
                echo "Špatné pøihlašovací jméno nebo heslo. Opakujte zadání, popøípadì proveïte zmìnu v souboru <b>konfigurace.php</b>.";
        }
}


function overeni($login,$heslo2) {
        if(file_exists("konfigurace.php")) {
                include("konfigurace.php");
        } else {
                die("Konfiguraèní soubor <b>konfigurace.php</b> nebyl nalezen.");
        }
        if(($login == $prihlasovaci_jmeno) && ($heslo2 == $pass)) {
                return 1;
        } else {
                return 0;
        }
}


function odhlaseni() {
        session_destroy();
        header("Location: admin.php");
}


function zobraz_zpravy($strana,$na_stranku) {
        if(!$strana) { $strana = 1; }
        $od = ($strana - 1) * $na_stranku;
        $sql = "SELECT * FROM gb_data ORDER BY id DESC LIMIT $od,$na_stranku;";
        $query = mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        while($row = mysql_fetch_array($query)) {
                $email = "";
                if($row[email] != "") {
                        $delka = strlen($row[email]);
                        for($i = 0; $i < $delka; $i++) {
                                $pismeno = substr($row[email], $i, 1);
                                $pismeno = ord($pismeno);
                                $email .= "&#0".$pismeno.";";
                        }
                        $email = "<a href=\"mailto:$email\" title=\"$email\">email</a>";
                        if(($row[www] != "") || ($row[icq] != 0)) {
                                $email .= " |";
                        }
                } else {
                        $email = "";
                }

                if($row[www] != "") {
                        $www = "<a href=\"http://$row[www]\">www</a>";
                        if($row[icq] != 0) {
                                $www .= " |";
                        }
                } else {
                        $www = "";
                }

                if($row[icq] == 0) {
                        $icq = "";
                } else {
                        $icq = "icq: $row[icq]";
                }

                if((!$email) && (!$www) && (!$icq)) {
                        $email = "---";
                }
                
                echo "\t<div class=\"zprava\">
                <div class=\"hlavicka\">
                        Od: <a href=\"javascript:area('[b]$row[jmeno] [/b]')\"><b>$row[jmeno]</b></a> - $row[datum]
                </div>
                <p>
                        $row[zprava]
                </p>
                <div class=\"paticka\">
                        $email $www $icq
                </div>
        </div>\n";
        }
}


function strankovani($strana) {
        if(!$strana) { $strana = 1; }
        echo "\t<div class=\"stranky\">\n";
        $plus = $strana + 1;
        $minus = $strana - 1;
        if(($strana == 1) || (!$strana) || ($strana == 0)) {
                echo "\t\t<a href=\"index.php?strana=$plus\">starší &gt;&gt;</a>
        </div>\n";
        } else {
                echo "\t\t<a href=\"index.php?strana=$minus\">&lt;&lt; novìjší</a> <a href=\"index.php?strana=$plus\">starší &gt;&gt;</a>
        </div>\n";
        }
}


function smajlici($smajlici) {
        for($i = 1; $i <= 12; $i++) {
                print("\t\t\t\t<a href=\"javascript:area('*$i*')\"><img alt=\"$i\"  src=\"smajlici/sada$smajlici/$i.gif\" /></a>\n");
        }
}
      

function formular($form,$antispam,$smajlici,$jmena) {
        if($form == 1) {
                $cisla = Array("0" => "nula", "1" => "jedna", "2" => "dvì", "3" => "tøi", "4" => "ètyøi", "5" => "pìt", "6" => "šest", "7" => "sedm", "8" => "osm", "9" => "devìt");
                $i = mt_rand(0,9);
                $cislo = $cisla[$i];
                $mezikrok = $i."gbook".$i;
                $sifra = md5($mezikrok);
                echo "\t\t<legend><a href=\"index.php\">Nová zpráva&nbsp;&nbsp;<img src=\"obrazky/sipka_vzhuru.gif\" alt=\"sbalit\" /></a></legend><br />
                        <h2>Text zprávy*:</h2>
                                <textarea name=\"gbook_zprava\" cols=\"30\" rows=\"5\" onselect=\"storeCaret(this);\" onclick=\"storeCaret(this);\" onkeyup=\"storeCaret(this);\"></textarea><br />
                                <div id=\"smajlici\">\n";
                smajlici($smajlici);
                echo "\t\t\t\t&nbsp;<a href=\"javascript:area2('[b][/b]')\"><img src=\"obrazky/tucne.gif\" alt=\"tuèné\" /></a>&nbsp;<a href=\"javascript:area2('[i][/i]')\"><img src=\"obrazky/kurziva.gif\" alt=\"kurzíva\" /></a>&nbsp;<a href=\"javascript:area2('http://')\"><img src=\"obrazky/url.gif\" alt=\"url\" /></a>
                                </div>
                        <h2>Jméno*:</h2>
                                <input type=\"text\" name=\"jmeno\" />\n";
                if($jmena == 1) {
                        echo "\t\t\t<h2>Heslo**:</h2>
                                <input type=\"password\" name=\"heslo\" />\n";
                }
                echo "\t\t\t<h2>E-mail:</h2>
                                <input type=\"text\" name=\"email\" />
                        <h2>ICQ:</h2>
                                <input type=\"text\" name=\"icq\" />
                        <h2>WWW:</h2>
                                <input type=\"text\" name=\"www\" /><br />\n";
                if($antispam == 1) {
                        echo "\t\t\t<h2>Opište èíslicí*:&nbsp;&nbsp;<i>$cislo</i></h2>
                                <input type=\"text\" name=\"cislo\" /><input type=\"hidden\" name=\"sifra\" value=\"$sifra\" /><br />\n";
                }
                echo "\t\t\t<input type=\"submit\" name=\"odeslat\" value=\"Odeslat\" class=\"tlacitko\" />
                        <div id=\"info\">* - povinné položky, ** - pouze u chránìných jmen</div>\n";
                } else {
                        $formular = "\t\t\t<legend><a href=\"index.php?form=1\">Nová zpráva&nbsp;&nbsp;<img src=\"obrazky/sipka_dolu.gif\" alt=\"sbalit\" /></a></legend><br />\n\t\t\t<div id=\"zobraz\"><a href=\"index.php?form=1\">&gt;&gt; pøidat zprávu &lt;&lt;</a></div><br />\n";
                }
        echo $formular;
}


function pridat_zpravu($jmeno,$heslo,$email,$icq,$www,$sifra,$cislo,$zprava,$historie,$smajlici,$jmena) {
        $hlavicka = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html><head><meta http-equiv=\"Content-type\" content=\"text/html; charset=windows-1250\" /><title>Guestbook - chybové hlášení</title></head><body>";
        $paticka = "</body></html>";

        $ip = $_SERVER[REMOTE_ADDR];
        $sql = "SELECT ip FROM gb_ip_ban;";
        $query = mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        while($row = mysql_fetch_array($query)) {
                if($row[ip] == $ip) {
                        die($hlavicka."Do této návštìvní knihy máte zákaz vkládání pøíspìvkù. Pro odblokování kontaktujte správce této knihy.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
                }
        }

        $cislo =  ($cislo);
        $mezikrok = $cislo."gbook".$cislo;
        if(($sifra) && ($sifra != md5($mezikrok))) {
                die($hlavicka."Èíslo bylo špatnì opsáno!<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        }

        $jmeno = htmlspecialchars(($jmeno)); $email = htmlspecialchars(($email)); $icq = htmlspecialchars(($icq)); $www = htmlspecialchars(($www)); $cislo = htmlspecialchars(($cislo));
        $heslo = md5(strtolower(($heslo)));
        $jmeno2 = strtolower($jmeno);
        if($jmena == 1) {
                $sql = "SELECT jmeno,heslo FROM gb_jmena;";
                $query = mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
                while($row = mysql_fetch_array($query)) {
                        $db_jmeno = strtolower($row[jmeno]);
                        $db_heslo = strtolower($row[heslo]);
                        if(($db_jmeno == $jmeno2) && ($db_heslo != $heslo)) {
                                die($hlavicka."Jméno <b>$jmeno</b> je v této knize chránìné heslem. Vámi zadané heslo je nesprávné!<br />Zadejte tedy prosím správné heslo nebo zvolte jiné jméno.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
                        } 
                }
        }

        if((!$zprava) || (!$jmeno)) {
                die($hlavicka."Jedno z povinných polí <b>Text zprávy, Jméno</b> nebylo vyplnìno!<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        } elseif(strlen($zprava) > 5000) {
                die($hlavicka."Zpráva mùže obsahovat maximálnì 5000 znakù!<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        }

        $jmeno = substr($jmeno, 0, 40);
                
        if($email) {
                $cast1 = '[-a-z0-9!#$%&\'*+/=?^_`{|}~]';
                $cast2 = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';
                if(!eregi("^$cast1+(\\.$cast1+)*@($cast2?\\.)+$cast2\$", $email)) {
                        die($hlavicka."Emailová adresa je uvedena v nesprávném formátu - jmeno@domena.koncovka!<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
                }
        }

        if($icq) {
                $icq = str_replace("-","",$icq);
                if(!eregi("^[0-9]{8,10}$",$icq)) {
                        die($hlavicka."ICQ smí obsahovat pouze èíslice, jejich poèet je 8 až 10.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
                }
        }

        if($www) {
                $www = str_replace("http://","",$www);
        }

        $zprava = addslashes($zprava);
        $vychozi = Array(";","&","<",">","\"");
        $nahrad  = Array("\;","&#38;","&lt;","&gt;","&quot;");
        $zprava = str_replace($vychozi,$nahrad,$zprava);
        $vychozi = Array("*1*","*2*","*3*","*4*","*5*","*6*","*7*","*8*","*9*","*10*","*11*","*12*","[b]","[/b]","[i]","[/i]","\n");
        $nahrad  = Array("<img src=\"smajlici/sada$smajlici/1.gif\" alt=\"1\" />","<img src=\"smajlici/sada$smajlici/2.gif\" alt=\"2\" />","<img src=\"smajlici/sada$smajlici/3.gif\" alt=\"3\" />","<img src=\"smajlici/sada$smajlici/4.gif\" alt=\"4\" />","<img src=\"smajlici/sada$smajlici/5.gif\" alt=\"5\" />","<img src=\"smajlici/sada$smajlici/6.gif\" alt=\"6\" />","<img src=\"smajlici/sada$smajlici/7.gif\" alt=\"7\" />","<img src=\"smajlici/sada$smajlici/8.gif\" alt=\"8\" />","<img src=\"smajlici/sada$smajlici/9.gif\" alt=\"9\" />","<img src=\"smajlici/sada$smajlici/10.gif\" alt=\"10\" />","<img src=\"smajlici/sada$smajlici/11.gif\" alt=\"11\" />","<img src=\"smajlici/sada$smajlici/12.gif\" alt=\"12\" />","<b>","</b>","<i>","</i>"," <br /> ");
        $zprava = str_replace($vychozi,$nahrad,$zprava);
        $slova = explode(" ",$zprava);
        $zprava = "";
        for($i = 0; $i < sizeof($slova); $i++) {
                if(eregi("(http://[^ ]+\.[^ ]+)", $slova[$i])) {
                        $cast = substr($slova[$i], 0, 30);
                        if(strlen($slova[$i]) > 30) {
                                $odkaz = "<a href=\"\\1\">$cast&hellip;</a>";
                        } else {
                                $odkaz = "<a href=\"\\1\">$cast</a>";
                        }
                        $slova[$i] = ereg_replace("(http://[^ ]+\.[^ ]+)", " $odkaz ", $slova[$i]);
                } else {
                        $slova[$i] = wordwrap($slova[$i], 40, " ", 1);
                }
                $zprava .= " ".$slova[$i];
        }        

        if(substr_count($zprava,"<br />") > 10) {
                $zprava = str_replace("<br />"," ",$zprava);
        }

        if(substr_count($zprava,"<img src=\"") > 10) {
                die($hlavicka."Zpráva smí obsahovat maximálnì 10 smajlíkù!<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        }

        $pocet = substr_count($zprava, "<b>");
        $pocet2 = substr_count($zprava, "</b>");
        if($pocet != $pocet2) {
                $pridat = $pocet - $pocet2;
                for($i = 0; $i < $pridat; $i++) {
                        $zprava .= "</b>";
                }
        }

        $pocet = substr_count($zprava, "<i>");
        $pocet2 = substr_count($zprava, "</i>");
        if($pocet != $pocet2) {
                $pridat = $pocet - $pocet2;
                for($i = 0; $i < $pridat; $i++) {
                        $zprava .= "</i>";
                }
        }

        $datum = date("G:i/j.n.Y");
        $sql = "SELECT id FROM gb_data ORDER BY id DESC;";
        $query = mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        $i = 2;
        $radek = "";
        while($row = mysql_fetch_array($query)) {
                if($i == $historie) {
                        $radek = $row[id];
                        break;
                }
                $i++;
        }
        if($radek) {
                $sql = "DELETE FROM gb_data WHERE id < '$radek';";
                mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        }

        $sql = "INSERT INTO gb_data SET zprava = '$zprava', jmeno = '$jmeno', datum = '$datum', icq = '$icq', email = '$email', www = '$www', ip = '$ip';";
        if(!mysql_query($sql)) {
                die("Pøi vkládání pøíspìvku došlo k chybì, zkuste to prosím pozdìji.");
        } else {
                header("Location: index.php");
        }
}


function zobraz_zpravy_admin($strana,$na_stranku) {
        if(!$strana) { $strana = 1; }
        $od = ($strana - 1) * $na_stranku;
        $sql = "SELECT * FROM gb_data ORDER BY id DESC LIMIT $od,$na_stranku;";
        $query = mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        while($row = mysql_fetch_array($query)) {
                if($row[email] != "") {
                        $delka = strlen($row[email]);
                        for($i = 0; $i < $delka; $i++) {
                                $pismeno = substr($row[email], $i, 1);
                                $pismeno = ord($pismeno);
                                $email .= "&#0".$pismeno.";";
                        }
                        $email = "<a href=\"mailto:$email\" title=\"$email\">e-mail</a>";
                        if(($row[www] != "") || ($row[icq] != 0)) {
                                $email .= " |";
                        }
                } else {
                        $email = "";
                }

                if($row[www] != "") {
                        $www = "<a href=\"http://$row[www]\">www</a>";
                        if($row[icq] != 0) {
                                $www .= " |";
                        }
                } else {
                        $www = "";
                }

                if($row[icq] == 0) {
                        $icq = "";
                } else {
                        $icq = "icq: $row[icq]";
                }

                if((!$email) && (!$www) && (!$icq)) {
                        $email = "---";
                }

                echo "\t<div class=\"zprava\">
                <div class=\"hlavicka\">
                        Od: <b>$row[jmeno]</b> - $row[datum]
                </div>
                <p>
                        $row[zprava]
                </p>
                <div class=\"paticka\">
                        $email $www $icq
                </div>
                <div class=\"paticka\">
                        <a href=\"admin.php?akce=mazani&#38;strana=$strana&#38id=$row[id]\">smazat</a> | <a href=\"admin.php?akce=ip&#38;ip=$row[ip]\">zabanovat</a> | IP adresa: $row[ip]
                </div>
        </div>\n";
        }
}

function strankovani_admin($strana) {
        if(!$strana) { $strana = 1; }
        echo "\t<div class=\"stranky\">\n";
        $plus = $strana + 1;
        $minus = $strana - 1;
        if(($strana == 1) || (!$strana) || ($strana == 0)) {
                echo "\t\t<a href=\"admin.php?akce=mazani&#38;strana=$plus\">starší &gt;&gt;</a>
        </div>\n";
        } else {
                echo "\t\t<a href=\"admin.php?akce=mazani&#38;strana=$minus\">&lt;&lt; novìjší</a> <a href=\"admin.php?akce=mazani&#38;strana=$plus\">starší &gt;&gt;</a>
        </div>\n";
        }
}


function smazat_zpravu($id) {
        $sql = "DELETE FROM gb_data WHERE id = '$id' LIMIT 1;";
        mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
}


function zabanovat($ip) {
        $sql = "INSERT INTO gb_ip_ban SET ip = '$ip';";
        mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        header("Location: admin.php?akce=ip");
}


function zrusit_ban($id) {
        $sql = "DELETE FROM gb_ip_ban WHERE id = '$id';";
        mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
}


function vyprazdnit() {
        $sql = "TRUNCATE gb_data;";
        mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        header("Location: admin.php?akce=mazani");
}


function zobraz_ip() {
        $sql = "SELECT * FROM gb_ip_ban ORDER BY id DESC;";
        $query = mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        echo "<div style=\"line-height: 1.5em;\">\n";
        while($row = mysql_fetch_array($query)) {
                $ipcka .= "\t\t\t$row[ip] | <a href=\"admin.php?akce=ip&#38;id=$row[id]\">zrušit BAN</a><br />\n";
        }
        if(!$ipcka) {
                echo "- prázdné -\t\t</div>\n";
        } else {
                echo $ipcka."\t\t</div>\n";
        }
}



function smajlici_admin($smajlici) {
        echo "\t<form action=\"admin.php?akce=smajlici\" method=\"post\">";
        for($a = 1; $a <= 5; $a++) {
                echo "<input type=\"radio\" " . ($smajlici == $a ? "checked" : "") . " name=\"smajl\" value=\"$a\" style=\"width: 20px;\" /><br />";
                for($i = 1; $i <= 12; $i++) {
                        print("\t\t\t\t<img alt=\"$i\"  src=\"smajlici/sada$a/$i.gif\" />\n");
                }
                echo "<hr />";
        }
        echo "\t\t<input type=\"submit\" name=\"ok\" value=\"Ulož\" class=\"tlacitko\" /></form>";
}


function smajlici_zmena($smajl) {
        $sql = "UPDATE gb_nastaveni SET smajlici = '$smajl' WHERE id = '1';";
        mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        header("Location: admin.php?akce=smajlici");
}


function obecna_nastaveni_zobraz() {
        $sql = "SELECT * FROM gb_nastaveni WHERE id = '1';";
        $row = mysql_fetch_array(mysql_query($sql));
        echo "<h2>Název/titulek knihy:</h2>
                                <input type=\"text\" name=\"jmeno\" value=\"$row[jmeno]\" />
                        <h2>Poèet pøíspìvkù na stránku:</h2>
                                <select name=\"pocet\" size=\"1\" style=\"width: 50px;\"> 
                                        <option value=\"5\" " . ($row[na_stranku] == 5 ? "selected" : "") . ">5
                                        <option value=\"10\" " . ($row[na_stranku] == 10 ? "selected" : "") . ">10
                                        <option value=\"15\" " . ($row[na_stranku] == 15 ? "selected" : "") . ">15
                                        <option value=\"20\" " . ($row[na_stranku] == 20 ? "selected" : "") . ">20
                                </select>
                        <h2>Poèet starých pøíspìvkù v databázi:</h2>
                                <select name=\"historie\" size=\"1\" style=\"width: 50px;\"> 
                                        <option value=\"20\" " . ($row[historie] == 20 ? "selected" : "") . ">20
                                        <option value=\"50\" " . ($row[historie] == 50 ? "selected" : "") . ">50
                                        <option value=\"100\" " . ($row[historie] == 100 ? "selected" : "") . ">100
                                        <option value=\"200\" " . ($row[historie] == 200 ? "selected" : "") . ">200
                                        <option value=\"500\" " . ($row[historie] == 500 ? "selected" : "") . ">500
                                        <option value=\"1000\" " . ($row[historie] == 1000 ? "selected" : "") . ">1000
                                </select>
                        <h2>Ochrana proti spamu:</h2>
                                <input type=\"checkbox\" " . ($row[antispam] == 1 ? "checked" : "") . " name=\"antispam\" style=\"width: 20px;\"><br />
                        <h2>Chránìná jména:</h2>
                                <input type=\"checkbox\" " . ($row[jmena] == 1 ? "checked" : "") . " name=\"jmena\" style=\"width: 20px;\"><br />
                        <input type=\"submit\" name=\"ok\" value=\"Uložit\" class=\"tlacitko\" />";
}


function obecna_nastaveni_zmena($jmeno,$na_stranku,$historie,$antispam,$jmena) {
        if(!$jmeno) {
                print("Musíte vyplnit jméno návštìvní knihy.");
        } else {
                if($antispam == "on") {
                        $antispam = "1";
                } else {
                        $antispam = "0";
                }

                if($jmena == "on") {
                        $jmena = "1";
                } else {
                        $jmena = "0";
                }

                $jmeno = htmlspecialchars(($jmeno));
                $sql = "UPDATE gb_nastaveni SET jmeno = '$jmeno', na_stranku = '$na_stranku', historie = '$historie', antispam = '$antispam' , jmena = '$jmena' WHERE id = '1';";
                mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        }
}


function pridej_jmeno($jmeno,$heslo) {
        if((!$jmeno) || (!$heslo)) {
                print("Jedno z polí <b>Jméno, Heslo</b> nebylo vyplnìno!");
        } else {
                $jmeno = ($jmeno);
                $heslo = md5(strtolower(($heslo)));
                $sql = "INSERT INTO gb_jmena SET jmeno = '$jmeno', heslo = '$heslo';";
                mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
                header("Location: admin.php?akce=jmena");
        }
}


function vypis_jmena() { 
        $sql = "SELECT id,jmeno FROM gb_jmena ORDER BY jmeno;";
        $query = mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        while($row = mysql_fetch_array($query)) {
                $zobraz_jmena .= $row[jmeno]." | <a href=\"admin.php?akce=jmena&#38;smazat=".$row[id]."\">smazat</a><br />\n";
        }
        if(!$zobraz_jmena) {
                echo "- prázdné -";
        } else {
                echo $zobraz_jmena;
        }
}  


function smaz_jmeno($id) {
        $sql = "DELETE FROM gb_jmena WHERE id = '$id' LIMIT 1;";
        mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
}


function odinstalovat() {
        $sql = "DROP TABLE gb_data, gb_ip_ban, gb_jmena, gb_nastaveni;";
        mysql_query($sql) or die($hlavicka."Chyba databáze. Zkuste prosím akci zopakovat pozdìji.<br /><a href='javascript:history.go(-1)'>Zpìt</a>".$paticka);
        header("Location: http://www.php.jonweb.cz");
}


?>