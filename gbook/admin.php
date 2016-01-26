<?php
        session_start();
        $prihlaseni = false;
        $akce = $_GET[akce];

        if(file_exists("funkce.php")) {
                include_once("funkce.php");
        } else {
                die("Soubor <b>funkce.php</b> nebyl nalezen!");
        }
        
        if(isset($_POST[vstup])) {
                prihlaseni($_POST[login],$_POST[heslo]);    
        } elseif((isset($_SESSION[gb_login])) && (isset($_SESSION[gb_heslo]))) {
                if(overeni($_SESSION[gb_login],$_SESSION[gb_heslo]) == true) {
                        $prihlaseni = true;
                } else {
                        $prihlaseni = false;
                }
        }
        
        if($akce == "odhlaseni") {
                odhlaseni();
        }
        
        if($prihlaseni) {
                if(!$akce) { 
                        header("Location: admin.php?akce=obecna"); 
                }
                if(($akce == "jmena") && ($_POST[ok])) {
                        pridej_jmeno($_POST[jmeno],$_POST[heslo]);
                } elseif(($akce == "jmena") && ($smazat != "")) {
                        smaz_jmeno($smazat);
                } elseif(($akce == "obecna") && ($_POST[ok])) {
                        obecna_nastaveni_zmena($_POST[jmeno],$_POST[pocet],$_POST[historie],$_POST[antispam],$_POST[jmena]);
                } elseif(($akce == "mazani") && ($id)) {
                        smazat_zpravu($id);
                } elseif(($akce == "mazani") && ($vyprazdnit == "ok")) {
                        vyprazdnit();
                } elseif(($akce == "ip") && ($ip)) {
                        zabanovat($ip);
                } elseif(($akce == "ip") && ($id)) {
                        zrusit_ban($id);
                } elseif(($akce == "smajlici") && ($_POST[smajl])) {
                        smajlici_zmena($_POST[smajl]);
                } elseif(($akce == "odinstalace") && ($uninstal == 1)) {
                        odinstalovat();
                }
        }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
        <meta http-equiv="Content-type" content="text/html; charset=windows-1250" />
        <meta name="description" content="Guestbook" />
        <meta name="author" content="Jan Ondroušek - www.php.jonweb.cz" />
        <meta name="keywords" content="guestbook, návštìvní kniha" />
        <meta name="robots" content="noindex" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <link rel="stylesheet" type="text/css" href="styl.css" media="screen" />
        <title>
<?php
        if($prihlaseni == 1) {
                print("\t\tAdministrace\n");
        } else {
                print("\t\tVstup do administrace\n");
        }
?>
        </title>
</head>

<body id="main">
<?php
        if($prihlaseni == 1) {
?>
        <h1>Administrace</h1>
        <hr />
        <a href="admin.php?akce=odhlaseni">odhlásit se</a> | <a href="index.php">návštìvní kniha</a>
        <hr />
        <a href="admin.php?akce=obecna">obecná nastavení</a> | <a href="admin.php?akce=mazani">mazání pøíspìvkù + zabanování</a> | <a href="admin.php?akce=jmena">chránìná jména</a> | <a href="admin.php?akce=ip">zakázané IP adresy</a> | <a href="admin.php?akce=smajlici">sady smajlíkù</a> | <a href="admin.php?akce=odinstalace">odinstalování</a>
        <hr /><br />
<?php
                if($akce == "obecna") {
?>
        <h2>Obecná nastavení</h2><br />
                <form action="<?php echo "$_SERVER[REQUEST_URI]";?>" method="post">
                        <?php obecna_nastaveni_zobraz(); ?>
                </form>
<?php
                } elseif($akce == "mazani") {
?>
        <h2>Smazat všechny pøíspìvky:</h2><br />
        <b>Upozornìní:</b> Všechny doposud uložené pøíspìvky budou nenávratnì smazány!<br />Smazat všechny pøíspìvky?<br /><br /><a href="admin.php?akce=mazani&#38;vyprazdnit=ok">Ano, smazat</a><br /><br /><br />
        <h2>Mazání jednotlivých pøíspìvkù:</h2>
                <?php strankovani_admin($strana); zobraz_zpravy_admin($strana,$na_stranku); strankovani_admin($strana); ?>
<?php
                } elseif($akce == "jmena") {
?>
        <h2>Chránìná jména</h2><br />
                <form action="<?php echo "$_SERVER[REQUEST_URI]";?>" method="post">
                        <h2>Jméno/nick:</h2>
                                <input type="text" name="jmeno" />
                        <h2>Heslo:</h2>
                                <input type="text" name="heslo" /><br />
                        <input type="submit" name="ok" value="Pøidat" class="tlacitko" />
                </form><br />
        <h2>Seznam chránìných jmen:</h2><br />
                <div style="line-height: 1.5em;">
                        <?php vypis_jmena(); ?>
                </div>
<?php
                } elseif($akce == "ip") {
?>
        <h2>Zakázané IP adresy:</h2><br />
                <?php zobraz_ip(); ?>
<?php
                } elseif($akce == "odinstalace") {
?>
        <h2>Odinstalování návštìvní knihy:</h2><br />
                <b>Upozornìní:</b> Všechna data a nastavení budou nenávratnì smazána!<br />
                Opravdu si pøejete návštìvní knihu odinstalovat?<br /><br />
                <a href="admin.php?akce=odinstalace&#38;uninstal=1">Ano, odinstalovat.</a>
<?php
                } elseif($akce == "smajlici") {
?>
        <h2>Sady smajlíkù:</h2><br />
                <?php smajlici_admin($smajlici); ?>
<?php
                }
        } else {
?>
        <h1>Vstup do administrace</h1>
        <form action="admin.php" method="post" name="post">
                <fieldset>
                        <legend>Pøihlášení</legend><br />
                        <h2>Pøihlašovací jméno:</h2>
                                <input type="text" name="login" />
                        <h2>Heslo:</h2>
                                <input type="password" name="heslo" /><br />
                        <input type="submit" name="vstup" value="Vstup" class="tlacitko" />
                        <div id="info">Pøihlášení vyžaduje povolené cookies.</div>
                </fieldset>
        </form>
<?php
}
?>
</body>
</html>