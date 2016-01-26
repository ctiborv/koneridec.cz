<?php
        if(file_exists("funkce.php")) {
                include_once("funkce.php");
        } else {
                die("Soubor <b>funkce.php</b> nebyl nalezen!");
        }

        if(isset($_POST[odeslat])) {
                pridat_zpravu($_POST[jmeno],$_POST[heslo],$_POST[email],$_POST[icq],$_POST[www],$_POST[sifra],$_POST[cislo],$_POST[gbook_zprava],$historie,$smajlici,$jmena);
        }

        $form = 1 * $form;
        $strana = 1 * $strana;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
        <meta http-equiv="Content-type" content="text/html; charset=windows-1250" />
        <meta name="description" content="Guestbook" />
        <meta name="author" content="Jan Ondroušek - www.php.jonweb.cz" />
        <meta name="keywords" content="guestbook, návštěvní kniha" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <link rel="stylesheet" type="text/css" href="styl.css" media="screen" />
        <title>
                <?php echo $jmeno_knihy,"\n"; ?>
        </title>
        <script src="area.js" type="text/javascript"></script>
</head>

<body id="main">
        <h1><a href="index.php"><?php echo $jmeno_knihy; ?></a></h1>
        <form onsubmit="return CheckForm(this)" action="index.php" method="post" name="post">
                <fieldset>
<?php
        formular($form,$antispam,$smajlici,$jmena);
?>
                </fieldset>
        </form>
<?php   strankovani($strana);
        zobraz_zpravy($strana,$na_stranku);
        strankovani($strana);
?>
</body>
</html>