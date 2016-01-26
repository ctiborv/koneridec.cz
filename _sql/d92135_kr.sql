-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Počítač: wm81.wedos.net:3306
-- Vytvořeno: Úte 26. led 2016, 09:45
-- Verze serveru: 5.6.17
-- Verze PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `d92135_kr`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(11) NOT NULL,
  `id_galerie` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `soubor` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `soubormale` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `datumvlozeni` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `foto`
--

INSERT INTO `foto` (`id_foto`, `id_galerie`, `nazev`, `popis`, `soubor`, `soubormale`, `datumvlozeni`) VALUES
(156, 1, 'img_5437.jpg', '', 'obrazky/1-img_5437.jpg', 'obrazky/1-smimg_5437.jpg', '2015-02-08'),
(157, 1, 'img_5441.jpg', '', 'obrazky/1-img_5441.jpg', 'obrazky/1-smimg_5441.jpg', '2015-02-08'),
(158, 1, 'maruska_fotky_1_072.jpg', '', 'obrazky/1-maruska_fotky_1_072.jpg', 'obrazky/1-smmaruska_fotky_1_072.jpg', '2015-02-08'),
(159, 1, 'p8280801.jpg', '', 'obrazky/1-p8280801.jpg', 'obrazky/1-smp8280801.jpg', '2015-02-08'),
(160, 1, 'p8300718.jpg', '', 'obrazky/1-p8300718.jpg', 'obrazky/1-smp8300718.jpg', '2015-02-08'),
(161, 1, 'p8300720.jpg', '', 'obrazky/1-p8300720.jpg', 'obrazky/1-smp8300720.jpg', '2015-02-08'),
(162, 2, 'cely_orphan.jpg', '', 'obrazky/2-cely_orphan.jpg', 'obrazky/2-smcely_orphan.jpg', '2015-02-08'),
(163, 2, 'dsc07411.jpg', '', 'obrazky/2-dsc07411.jpg', 'obrazky/2-smdsc07411.jpg', '2015-02-08'),
(164, 2, 'dscn3822.jpg', '', 'obrazky/2-dscn3822.jpg', 'obrazky/2-smdscn3822.jpg', '2015-02-08'),
(165, 2, 'img_5427.jpg', '', 'obrazky/2-img_5427.jpg', 'obrazky/2-smimg_5427.jpg', '2015-02-08'),
(166, 2, 'kojeni_orphanka.jpg', '', 'obrazky/2-kojeni_orphanka.jpg', 'obrazky/2-smkojeni_orphanka.jpg', '2015-02-08'),
(167, 2, 'maruska_fotky_1_068.jpg', '', 'obrazky/2-maruska_fotky_1_068.jpg', 'obrazky/2-smmaruska_fotky_1_068.jpg', '2015-02-08'),
(168, 2, 'p8280974.jpg', '', 'obrazky/2-p8280974.jpg', 'obrazky/2-smp8280974.jpg', '2015-02-08'),
(169, 2, 'p8280999.jpg', '', 'obrazky/2-p8280999.jpg', 'obrazky/2-smp8280999.jpg', '2015-02-08'),
(170, 2, 'p8300867.jpg', '', 'obrazky/2-p8300867.jpg', 'obrazky/2-smp8300867.jpg', '2015-02-08'),
(171, 3, 'dscn3779.jpg', '', 'obrazky/3-dscn3779.jpg', 'obrazky/3-smdscn3779.jpg', '2015-02-10'),
(172, 3, 'dscn3781.jpg', '', 'obrazky/3-dscn3781.jpg', 'obrazky/3-smdscn3781.jpg', '2015-02-10'),
(173, 3, 'dscn3811.jpg', '', 'obrazky/3-dscn3811.jpg', 'obrazky/3-smdscn3811.jpg', '2015-02-10'),
(174, 3, 'dscn5442.jpg', '', 'obrazky/3-dscn5442.jpg', 'obrazky/3-smdscn5442.jpg', '2015-02-10'),
(175, 3, 'img_5537.jpg', '', 'obrazky/3-img_5537.jpg', 'obrazky/3-smimg_5537.jpg', '2015-02-10'),
(176, 3, 'p8280996.jpg', '', 'obrazky/3-p8280996.jpg', 'obrazky/3-smp8280996.jpg', '2015-02-10'),
(177, 3, 'p8300942.jpg', '', 'obrazky/3-p8300942.jpg', 'obrazky/3-smp8300942.jpg', '2015-02-10'),
(178, 4, 'dscn3990.jpg', '', 'obrazky/4-dscn3990.jpg', 'obrazky/4-smdscn3990.jpg', '2015-02-10'),
(179, 4, 'img_5493.jpg', '', 'obrazky/4-img_5493.jpg', 'obrazky/4-smimg_5493.jpg', '2015-02-10'),
(180, 4, 'img_5503.jpg', '', 'obrazky/4-img_5503.jpg', 'obrazky/4-smimg_5503.jpg', '2015-02-10'),
(181, 4, 'img_5511.jpg', '', 'obrazky/4-img_5511.jpg', 'obrazky/4-smimg_5511.jpg', '2015-02-10'),
(182, 4, 'karlov_tour_2009_089.jpg', '', 'obrazky/4-karlov_tour_2009_089.jpg', 'obrazky/4-smkarlov_tour_2009_089.jpg', '2015-02-10'),
(183, 4, 'p8300797.jpg', '', 'obrazky/4-p8300797.jpg', 'obrazky/4-smp8300797.jpg', '2015-02-10'),
(184, 4, 'p8300841.jpg', '', 'obrazky/4-p8300841.jpg', 'obrazky/4-smp8300841.jpg', '2015-02-10'),
(185, 4, 'p8300905.jpg', '', 'obrazky/4-p8300905.jpg', 'obrazky/4-smp8300905.jpg', '2015-02-10'),
(186, 5, 'dscn5407.jpg', '', 'obrazky/5-dscn5407.jpg', 'obrazky/5-smdscn5407.jpg', '2015-02-10'),
(187, 5, 'krejci_-_kone_na_jare_013.jpg', '', 'obrazky/5-krejci_-_kone_na_jare_013.jpg', 'obrazky/5-smkrejci_-_kone_na_jare_013.jpg', '2015-02-10'),
(188, 5, 'krejci_-_kone_na_jare_019.jpg', '', 'obrazky/5-krejci_-_kone_na_jare_019.jpg', 'obrazky/5-smkrejci_-_kone_na_jare_019.jpg', '2015-02-10'),
(189, 5, 'p8300832.jpg', '', 'obrazky/5-p8300832.jpg', 'obrazky/5-smp8300832.jpg', '2015-02-10'),
(190, 5, 'p8300911.jpg', '', 'obrazky/5-p8300911.jpg', 'obrazky/5-smp8300911.jpg', '2015-02-10'),
(191, 6, 'cely_orphan.jpg', '', 'obrazky/6-cely_orphan.jpg', 'obrazky/6-smcely_orphan.jpg', '2015-02-10'),
(192, 6, 'dsc07411.jpg', '', 'obrazky/6-dsc07411.jpg', 'obrazky/6-smdsc07411.jpg', '2015-02-10'),
(193, 6, 'dscn3822.jpg', '', 'obrazky/6-dscn3822.jpg', 'obrazky/6-smdscn3822.jpg', '2015-02-10'),
(194, 6, 'img_5427.jpg', '', 'obrazky/6-img_5427.jpg', 'obrazky/6-smimg_5427.jpg', '2015-02-10'),
(195, 6, 'kojeni_orphanka.jpg', '', 'obrazky/6-kojeni_orphanka.jpg', 'obrazky/6-smkojeni_orphanka.jpg', '2015-02-10'),
(196, 6, 'maruska_fotky_1_068.jpg', '', 'obrazky/6-maruska_fotky_1_068.jpg', 'obrazky/6-smmaruska_fotky_1_068.jpg', '2015-02-10'),
(197, 6, 'p8280974.jpg', '', 'obrazky/6-p8280974.jpg', 'obrazky/6-smp8280974.jpg', '2015-02-10'),
(198, 6, 'p8280999.jpg', '', 'obrazky/6-p8280999.jpg', 'obrazky/6-smp8280999.jpg', '2015-02-10'),
(199, 6, 'p8300867.jpg', '', 'obrazky/6-p8300867.jpg', 'obrazky/6-smp8300867.jpg', '2015-02-10'),
(200, 7, 'dsc00073.jpg', '', 'obrazky/7-dsc00073.jpg', 'obrazky/7-smdsc00073.jpg', '2015-02-10'),
(201, 7, 'img_5530.jpg', '', 'obrazky/7-img_5530.jpg', 'obrazky/7-smimg_5530.jpg', '2015-02-10'),
(202, 7, 'krejci_-_kone_a_sane_011.jpg', '', 'obrazky/7-krejci_-_kone_a_sane_011.jpg', 'obrazky/7-smkrejci_-_kone_a_sane_011.jpg', '2015-02-10'),
(203, 7, 'p8280712.jpg', '', 'obrazky/7-p8280712.jpg', 'obrazky/7-smp8280712.jpg', '2015-02-10'),
(204, 7, 'p8300946.jpg', '', 'obrazky/7-p8300946.jpg', 'obrazky/7-smp8300946.jpg', '2015-02-10');

-- --------------------------------------------------------

--
-- Struktura tabulky `galerie`
--

CREATE TABLE IF NOT EXISTS `galerie` (
  `id_galerie` int(11) NOT NULL,
  `nazev` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci,
  `datumvlozeni` date NOT NULL,
  `priorita` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `galerie`
--

INSERT INTO `galerie` (`id_galerie`, `nazev`, `popis`, `datumvlozeni`, `priorita`) VALUES
(1, 'Mek', 'Mekovy fotky', '2015-02-08', 1),
(2, 'Orfík', 'Kůň orfík', '2015-02-08', 2),
(3, 'Jolanka', '', '2015-02-10', 3),
(4, 'Monty', '', '2015-02-10', 4),
(5, 'Nigela', '', '2015-02-10', 6),
(6, 'Orfík', '', '2015-02-10', 7),
(7, 'Soňa', '', '2015-02-10', 8);

-- --------------------------------------------------------

--
-- Struktura tabulky `gb_data`
--

CREATE TABLE IF NOT EXISTS `gb_data` (
  `id` int(10) unsigned NOT NULL,
  `zprava` text COLLATE utf8_czech_ci NOT NULL,
  `jmeno` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `datum` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `icq` int(10) unsigned DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `www` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `ip` varchar(30) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `gb_data`
--

INSERT INTO `gb_data` (`id`, `zprava`, `jmeno`, `datum`, `icq`, `email`, `www`, `ip`) VALUES
(1, ' Vítejte v návštěvní knize www.koneridec.cz', 'Admin', '20:56/10.2.2015', 0, '', '', '194.228.223.3'),
(2, ' Oříšek je nejlepší :)', 'Fia', '8:26/12.2.2015', 0, '', '', '85.70.114.43'),
(3, ' Dobrý den, chtěla bych se zeptat jak na táboře probíhá ježdění a vyjížďky ?  <img src="smajlici/sada1/5.gif" alt="5" />  ', 'Terka', '9:47/22.4.2015', 0, '', '', '37.48.39.179'),
(4, ' Má váš lektor na výcvikové hodiny státní instruktorskou zkoušku? <img src="smajlici/sada1/1.gif" alt="1" /> ', 'Lenka', '12:54/19.5.2015', 0, '', '', '188.175.65.15'),
(5, ' dobrý den má u vás na táborech jeden jezdec přiděleného koně na celí týden? ¨\r <br /> nebo více jezdců se stará o jednoho koně', 'sarulena', '8:20/24.5.2015', 0, 'sarisimi@email.cz', '', '85.92.42.101'),
(6, ' Dobrý den, míváme dřevěné piliny a je nám líto je pálit pokud by jste je spotřebovali pod koně. Jsme z Jeseníku na sev. Moravě\r <br /> Děkuji za odpověď. Na email : mahhi@seznam.cz tel.774327468  \r <br /> Makarenková.', 'Ivana', '21:02/29.6.2015', 0, 'mahhi@seznam.cz', '', '95.173.218.32'),
(7, ' Hubertova jízda se nám moc líbila, výborně jsme se bavili. Někdy příští týden přijde pár pěkných fotek (zatím procházejí výstupní kontrolou kvality). Na shledanou na jaře! Machulkovi', 'Machulkovi', '10:25/8.11.2015', 0, 'miloslava.machulkova@seznam.cz', '', '88.100.48.82'),
(8, '  <a href="http://pengobatandarahtinggi.greenworldglobals.com/">http://pengobatandarahtinggi.g&hellip;</a> ', 'PENGOBATAN DARAH TINGGI', '8:20/9.1.2016', 0, 'tradisional.baru@yahoo.co.id', 'pengobatandarahtinggi.greenworldglobals.com/', '36.80.1.155'),
(9, '  <a href="http://goo.gl/SlW7J4">http://goo.gl/SlW7J4</a> ', 'OBAT KATARAK', '2:00/16.1.2016', 0, 'tradisional.baru@yahoo.co.id', 'goo.gl/SlW7J4', '36.72.190.19'),
(10, '  <a href="http://goo.gl/LFfRmF">http://goo.gl/LFfRmF</a> ', 'OBAT PARU PARU BASAH', '4:44/18.1.2016', 0, 'tradisional.baru@yahoo.co.id', 'goo.gl/LFfRmF', '36.72.173.129');

-- --------------------------------------------------------

--
-- Struktura tabulky `gb_ip_ban`
--

CREATE TABLE IF NOT EXISTS `gb_ip_ban` (
  `id` int(10) unsigned NOT NULL,
  `ip` varchar(30) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `gb_jmena`
--

CREATE TABLE IF NOT EXISTS `gb_jmena` (
  `id` int(10) unsigned NOT NULL,
  `jmeno` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `heslo` varchar(250) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `gb_nastaveni`
--

CREATE TABLE IF NOT EXISTS `gb_nastaveni` (
  `id` smallint(6) NOT NULL,
  `jmeno` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `na_stranku` smallint(5) unsigned NOT NULL,
  `historie` smallint(5) unsigned NOT NULL,
  `antispam` smallint(6) NOT NULL,
  `jmena` smallint(6) NOT NULL,
  `smajlici` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `gb_nastaveni`
--

INSERT INTO `gb_nastaveni` (`id`, `jmeno`, `na_stranku`, `historie`, `antispam`, `jmena`, `smajlici`) VALUES
(1, '', 10, 100, 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `hlavnimenu`
--

CREATE TABLE IF NOT EXISTS `hlavnimenu` (
  `id` int(11) NOT NULL,
  `poradi` int(11) NOT NULL,
  `nazev` varchar(25) COLLATE utf8_czech_ci NOT NULL,
  `typ` varchar(1) COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_czech_ci
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `hlavnimenu`
--

INSERT INTO `hlavnimenu` (`id`, `poradi`, `nazev`, `typ`, `text`) VALUES
(1, 1, 'Úvod', 'U', '<h1 class="nadpis2">V&iacute;t&aacute;me V&aacute;s na str&aacute;nk&aacute;ch rekreačn&iacute; st&aacute;je Ř&iacute;deč</h1>\r\n<p><img style="float: left; margin: 15px;" src="/img/5.jpg" alt="" height="250" /></p>\r\n<p>&nbsp;</p>\r\n<p>Provoz nov&eacute; st&aacute;je navazuje sv&yacute;m zaměřen&iacute;m na st&aacute;j v Rad&iacute;kově, tedy v&aacute;m nad&aacute;le nab&iacute;z&iacute;me vyj&iacute;žďky do př&iacute;rody pro zač&aacute;tečn&iacute;ky i pokročil&eacute;.</p>\r\n<p>Nab&iacute;z&iacute;me tak&eacute; v&yacute;ukov&eacute; hodiny na j&iacute;zd&aacute;rně.V na&scaron;&iacute; nab&iacute;dce je i j&iacute;zda koč&aacute;rem a při sněhov&yacute;ch podm&iacute;nk&aacute;ch i j&iacute;zda na san&iacute;ch. K dispozici je 9 kon&iacute; ( Monty, Mc Scream, Nigela, Ory, Orphan, Soňa, Jolanka, Bony , Leonka ). Vybaven&iacute; st&aacute;je je nadstandartn&iacute; jak pro koně, tak pro klienty ( &scaron;atny, WC, klubovna, Wi-fi ).</p>\r\n<h2>Ceny za vyj&iacute;žďky se neměn&iacute; :</h2>\r\n<p>vyj&iacute;žďka do ter&eacute;nu 300 Kč/90 min&nbsp;</p>\r\n<p>v&yacute;uka na j&iacute;zd&aacute;rně 300Kč/60min<br /> vyj&iacute;žďka v koč&aacute;ře či san&iacute;ch 500 Kč/60 min<br /> jednodenn&iacute; v&yacute;let ( 5 - 7 hod v sedle ) 700 Kč/os<br /> v&iacute;cedenn&iacute; v&yacute;let 700 Kč/os/den + minim&aacute;ln&iacute; režijn&iacute; n&aacute;klady, j&iacute;dlo a pit&iacute; si klient plat&iacute; s&aacute;m</p>\r\n<p>Bliž&scaron;&iacute; informace o na&scaron;&iacute; nov&eacute; st&aacute;ji v Ř&iacute;deči, pr&aacute;vě prob&iacute;haj&iacute;c&iacute;ch akc&iacute;ch a spoustu fotek najdete na facebooku: {https://www.facebook.com/www.koneridec.cz}</p>'),
(2, 2, 'Tábory', 'T', '<h1 style="text-align: left;">T&aacute;bory v&nbsp;koňsk&eacute;m sedle</h1>\r\n<p>&nbsp;</p>\r\n<p><strong>JARN&Iacute; SOUTŘEDĚN&Iacute; S&nbsp;KOŇMI 2016</strong></p>\r\n<p><strong>Datum kon&aacute;n&iacute; 14.2.-21.2.2016</strong></p>\r\n<p><strong>&nbsp;</strong><strong>Provozovatel soustředěn&iacute;: </strong>Rekreačn&iacute; st&aacute;j Ř&iacute;deč, Vladim&iacute;r Lorenc, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ř&iacute;deč 306, 785 01 &Scaron;ternberk</p>\r\n<p><strong>M&iacute;sto kon&aacute;n&iacute;:</strong> Ř&iacute;deč, 5km od &Scaron;ternberku směr Paseka</p>\r\n<p><strong>N&aacute;stup</strong>: v&nbsp;neděli 14.2. 2016 do 12ti hodin</p>\r\n<p><strong>Odjezd</strong>: v&nbsp;sobotu 21.2. 2016 do 12ti hodin</p>\r\n<p><strong>Cena</strong>: 3900,-</p>\r\n<p><strong>Věkov&aacute; hranice</strong>: 9-18let (vzhledem k&nbsp;charakteru a n&aacute;ročnosti soustředěn&iacute;)</p>\r\n<p><strong>Program: </strong></p>\r\n<ul>\r\n<li>Denně jezdeck&yacute; v&yacute;cvik</li>\r\n<li>P&eacute;če o koně (krmen&iacute;,čistěn&iacute;, &uacute;klid st&aacute;j&iacute;)</li>\r\n<li>Hran&iacute; společensk&yacute;ch a naučn&yacute;ch her</li>\r\n</ul>\r\n<p><strong>Strava:</strong> 5x denně+ celodenn&iacute; pitn&yacute; režim</p>\r\n<p><strong>Ubytov&aacute;n&iacute;:</strong> 3 lůžkov&eacute; pokoje a společensk&aacute; m&iacute;stnost</p>\r\n<p><em>Maxim&aacute;ln&iacute; kapacita je 15 dět&iacute; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; K&nbsp;dispozici je 9 kon&iacute;</em></p>\r\n<p><strong>S&nbsp;sebou v&nbsp;den n&aacute;stupu:</strong></p>\r\n<ul>\r\n<li>Prohl&aacute;&scaron;en&iacute; z&aacute;konn&yacute;ch z&aacute;stupců- ke stažen&iacute;&nbsp;<a href="/soubory/list+lekar.docx">zde</a></li>\r\n<li>List &uacute;častn&iacute;ka- ke stažen&iacute;&nbsp;<a href="/soubory/list+lekar.docx">zde</a></li>\r\n<li>Potvrzen&iacute; od l&eacute;kaře</li>\r\n<li>Průkaz poji&scaron;těnce, nebo jeho kopie</li>\r\n</ul>\r\n<p><strong>Způsob platby:</strong></p>\r\n<ul>\r\n<li>Hotově v&nbsp;Ř&iacute;deči</li>\r\n<li>Na &uacute;čet č. 100289956/0300, variabiln&iacute; symbol r.č. d&iacute;těte, do koment&aacute;řů pros&iacute;m napsat jm&eacute;no d&iacute;těte</li>\r\n<li>Složenkou typu C</li>\r\n</ul>\r\n<p><strong>Stornovac&iacute; poplatek:</strong>&nbsp; 1900,- (tzn. V&nbsp;př&iacute;padě ne&uacute;časti na soustředěn&iacute; bude &uacute;hrada vr&aacute;cena po ukončen&iacute; a vy&uacute;čtov&aacute;n&iacute;&nbsp; s&nbsp; soustředěn&iacute; bez tohoto poplatku) Stornovac&iacute; poplatek se nevztahuje na nepř&iacute;tomnost d&iacute;těte z&nbsp;důvodu nemoci, l&eacute;kařem ř&aacute;dně doložen&eacute;</p>\r\n<p><strong>Doporučen&iacute;:</strong> Vzhledem k&nbsp;charakteru soustředěn&iacute; doporučujeme d&iacute;tě &uacute;razově připojistit</p>\r\n<p><strong>Přihl&aacute;&scaron;ka:&nbsp; </strong>Přihl&aacute;&scaron;ka je ke stažen&iacute; <a href="/soubory/Prihlaska.doc">zde</a>, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; vyplněnou ji za&scaron;lete na mail <a href="mailto:koneridec@seznam.cz">koneridec@seznam.cz</a>, po&scaron;tou, nebo osobně odevzdejte v&nbsp;Ř&iacute;deči</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Rady jak přihl&aacute;sit d&iacute;tě a co s&nbsp;sebou</h2>\r\n<ol>\r\n<li>St&aacute;hnout a vyplnit přihl&aacute;&scaron;ku, vyplněnou odeslat na mail <a href="mailto:koneridec@seznam.cz">koneridec@seznam.cz</a>, po&scaron;tou, nebo osobně předat</li>\r\n<li>Uhradit soustředěn&iacute; převodem na &uacute;čet 100289956/0300 (do koment&aacute;ře jm&eacute;no d&iacute;těte), nebo uhradit osobně, nebo složenkou typu C</li>\r\n<li>V&nbsp;den př&iacute;jezdu odevzdat list &uacute;častn&iacute;ka, potvrzen&iacute; od l&eacute;kaře (oba dokumenty ke stažen&iacute; v&yacute;&scaron;e) a průkaz poji&scaron;těnce</li>\r\n</ol>\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Co s&nbsp;sebou na jarn&iacute; soustředěn&iacute;</strong></p>\r\n<p>Vzhledem k&nbsp;chladn&eacute;mu počas&iacute; a celodenn&iacute;mu pobytu venku s&nbsp;sebou doporučujeme velmi tepl&eacute; oblečen&iacute;, nepromokavou teplou bundu. Nepromokav&eacute; vysok&eacute; boty, tepl&eacute; ponožky. Spodn&iacute; pr&aacute;dlo (thermo kalhoty, nebo punčoch&aacute;če atd.), rukavice (2 p&aacute;ry), čepice.</p>\r\n<p>Z&nbsp;hygienick&yacute;ch potřeb dětem přibalte v&scaron;e, kromě toaletn&iacute;ho pap&iacute;ru.</p>\r\n<p>Dal&scaron;&iacute; tipy: společensk&yacute; hry, batoh, pet lahev, kapesn&eacute;</p>\r\n<p><strong>Na soustředěn&iacute; nejsou v&iacute;t&aacute;ny mobiln&iacute; telefony, jejich už&iacute;v&aacute;n&iacute; bude omezeno!</strong></p>\r\n<p>&nbsp;</p>\r\n<h2>&nbsp;</h2>\r\n<h2>XVII. T&aacute;bor v&nbsp;koňsk&eacute;m sedle Ř&iacute;deč 2016</h2>\r\n<h1><img style="float: right;" src="/img/183305_1279885493017_1706447669_498009_2867690_n.jpg" alt="" width="374" height="249" /></h1>\r\n<p><strong>Provozovatel t&aacute;bora:</strong> Rekreačn&iacute; st&aacute;j Ř&iacute;deč, Vladim&iacute;r Lorenc, Ř&iacute;deč 306, 785 01 &Scaron;ternberk, mob.: 604&nbsp;305&nbsp;911</p>\r\n<ol>\r\n<li><strong>TURNUS: 03.07.-09.07. 2016&nbsp;&nbsp;</strong></li>\r\n<li><strong>TURNUS: 10.07.-16.07. 2016 &nbsp;</strong></li>\r\n<li><strong>TURNUS: 17.07.-23.07. 2016&nbsp;</strong>&nbsp;</li>\r\n<li><strong>TURNUS: 24.07.-30.07. 2016&nbsp;</strong></li>\r\n<li><strong>TURNUS: 31.07.-06.08. 2016 &nbsp;</strong></li>\r\n<li><strong>TURNUS: 07.08.-13.08. 2016 &nbsp;</strong></li>\r\n<li><strong>TURNUS: 14.08.-20.08. 2016 &nbsp;</strong></li>\r\n<li><strong>TURNUS: 21.08.-27.08. 2016 &nbsp;</strong></li>\r\n</ol>\r\n<p>V&scaron;echny turnusy zač&iacute;naj&iacute; v&nbsp;neděli individu&aacute;ln&iacute;m př&iacute;jezdem &uacute;častn&iacute;ků do 12ti hodin a konč&iacute; v&nbsp;sobotu individu&aacute;ln&iacute;m odjezdem do 12ti hodin.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p><strong>M&iacute;sto kon&aacute;n&iacute;</strong>: Ř&iacute;deč, 5 km od &Scaron;ternberku směr Paseka&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p><strong>Věkov&aacute; hranice:</strong> 9-18 let</p>\r\n<p><strong>Cena:</strong> 3900,- Kč na osobu</p>\r\n<p><strong>Způsob &uacute;hrady</strong>: složenkou typu C (dostanete na po&scaron;tě) nebo hotově v&nbsp;Ř&iacute;deči, na &uacute;čet č. <em>100289956/0300</em>, variabiln&iacute; symbol zvolte rodn&eacute; č&iacute;slo d&iacute;těte, do koment&aacute;řů zapsat jm&eacute;no d&iacute;těte a č&iacute;slo turnusu. Možno vystavit i fakturu pro zaměstnavatele.</p>\r\n<p><strong>Term&iacute;n &uacute;hrady</strong>: do 01.06. 2015. D&iacute;tě je z&aacute;vazně přihl&aacute;&scaron;en&eacute; dnem &uacute;hrady ceny t&aacute;bora.</p>\r\n<p><strong>Cena t&aacute;bora zahrnuje:&nbsp;&nbsp; </strong></p>\r\n<ul>\r\n<li>Ubytov&aacute;n&iacute; ve 4 lůžkov&yacute;ch pokoj&iacute;ch, nebo apartm&aacute;nu pro 10 n&aacute;v&scaron;těvn&iacute;ků</li>\r\n<li>Stravov&aacute;n&iacute; 5x denně, pitn&yacute; režim (obědy formou dovozu z&nbsp;restaurace Formanka)</li>\r\n<li>Program-celodenn&iacute; p&eacute;če o koně (či&scaron;těn&iacute; kon&iacute; a v&yacute;běhů, krmen&iacute;, vyv&aacute;děn&iacute; kon&iacute; na pastvu) jezdeck&yacute; v&yacute;cvik 2-3 hodiny denně (k dispozici 10 kon&iacute;)</li>\r\n<li>Vozatajstv&iacute; ( j&iacute;zda v&nbsp;koč&aacute;ře)</li>\r\n<li>Vyj&iacute;žďky do ter&eacute;nu</li>\r\n<li>Odborn&iacute; lektoři</li>\r\n<li>Doplňkov&yacute; program- hry, t&aacute;bor&aacute;ky, k&aacute;noe, koup&aacute;n&iacute;, soutěže, olympi&aacute;da, v&yacute;let, diskot&eacute;ka</li>\r\n</ul>\r\n<p><strong>Stornovac&iacute; poplatek:</strong> 1900,- Kč (tzn. V&nbsp;př&iacute;padě ne&uacute;časti na t&aacute;boře bude &uacute;hrada vr&aacute;cena po ukončen&iacute; a vy&uacute;čtov&aacute;n&iacute; t&aacute;bora bez tohoto poplatku) Stornovac&iacute; poplatek se nevztahuje na nepř&iacute;tomnost d&iacute;těte z&nbsp;důvodu nemoci, l&eacute;kařem ř&aacute;dně doložen&eacute;.</p>\r\n<p><strong>Upozorněn&iacute;:</strong> sv&eacute; d&iacute;tě můžete nav&scaron;t&iacute;vit ve čtvrtek od 17:00 do 20:00. V&nbsp;jinou dobu jsou n&aacute;v&scaron;těvy <strong>NEVHODN&Eacute;. Mobiln&iacute; telefony nejsou na t&aacute;boře v&iacute;t&aacute;ny, jejich použ&iacute;v&aacute;n&iacute; bude omezeno.</strong></p>\r\n<p><strong>Doporučen&iacute;:</strong> Vzhledem k&nbsp;charakteru t&aacute;bora doporučujeme d&iacute;tě &uacute;razově připojistit.&nbsp;</p>\r\n<p>N&iacute;že uvedenou přihl&aacute;&scaron;ku doručte do Rekreačn&iacute; st&aacute;je Ř&iacute;deč do 01. 06. 2015</p>\r\n<p><strong>Přihl&aacute;&scaron;ka</strong> :</p>\r\n<ul>\r\n<li><a title="Vyplněnou přihl&aacute;&scaron;ku " href="/soubory/Prihlaska.doc">Prihlaska.doc</a>&nbsp; Vyplněnou přihl&aacute;&scaron;ku za&scaron;lete na email <a href="mailto:koneridec@seznam.cz">koneridec@seznam.cz</a></li>\r\n<li><strong>List &uacute;častn&iacute;ka a potvrzen&iacute; od l&eacute;kaře</strong> -&nbsp;<a href="/soubory/list+lekar.docx">zde</a>&nbsp;<strong>odevzejte při př&iacute;jezdu d&iacute;těte!</strong></li>\r\n</ul>\r\n<p>Bliž&scaron;&iacute; informace na pož&aacute;d&aacute;n&iacute; pod&aacute; Mgr. Vladim&iacute;r Lorenc - 604&nbsp;305&nbsp;911</p>\r\n<p>&nbsp;</p>\r\n<h3 style="text-align: center;"><strong>Rady jak přihl&aacute;sit d&iacute;tě a co s sebou</strong></h3>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>St&aacute;hnout a vyplnit přihl&aacute;&scaron;ku, vyplněnou odeslat na email <a href="mailto:koneridec@seznam.cz">koneridec@seznam.cz</a>, nebo po&scaron;tou</li>\r\n<li>Nejpozději do 1.6. uhradit t&aacute;bor, nejl&eacute;pe z &uacute;čtu na &uacute;čet, do koment&aacute;řů zapsat jm&eacute;no d&iacute;těte a č&iacute;slo turnusu č&iacute;slo &uacute;čtu je&nbsp;<em>100289956/0300</em></li>\r\n<li>V den př&iacute;jezdu odevzdat list &uacute;častn&iacute;ka a potvrzen&iacute; od l&eacute;kaře, oba dukmenty jsou ke stažen&iacute; v&yacute;&scaron;e&nbsp;</li>\r\n</ol>\r\n<p>S sebou doporučujeme vysokou uzavřenou obuv (gum&aacute;ky), dlouh&eacute; přil&eacute;hav&eacute; kalhoty, helmy m&aacute;me k zapůjčen&iacute;.</p>\r\n<p>V are&aacute;lu je mal&yacute; bufet, děti tedy maj&iacute; možnost si koupit drobn&eacute; občestven&iacute;.</p>\r\n<p>Pro jak&yacute;koli dotaz pros&iacute;m pi&scaron;te email na <a href="mailto:koneridec@seznam.cz,">koneridec@seznam.cz,</a>&nbsp;nebo volejte na 604 305 911- Vladim&iacute;r Lorenc</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h1 style="text-align: center;">PODZIMN&Iacute; SOUSTŘEDĚN&Iacute; S KOŇMI</h1>\r\n<p>&nbsp;</p>\r\n<p><strong>Term&iacute;n: </strong>&nbsp;28.10-1.11. 2015</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;N&aacute;stup ve středu do 10:00</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Odjezd v neděli do 12:00</p>\r\n<p><strong>Cena:</strong> 2900,-</p>\r\n<p><strong>Program:</strong></p>\r\n<ul>\r\n<li>Denně jezdeck&yacute; v&yacute;cvik, nebo vyj&iacute;žďky do ter&eacute;nu (k dispozici 9 kon&iacute;)</li>\r\n<li>Celodenn&iacute; p&eacute;če o koně (či&scaron;těn&iacute;, sedl&aacute;n&iacute;, krmen&iacute;)</li>\r\n<li>Doplňkov&yacute; program (soutěže, hry, t&aacute;bor&aacute;k, vyj&iacute;žďka v koč&aacute;ře)</li>\r\n</ul>\r\n<p>Strava 5x denně + celodenn&iacute; pitn&yacute; režim</p>\r\n<p>Ubytov&aacute;n&iacute; v pokoj&iacute;ch pro 3 a společensk&eacute; m&iacute;stnosti pro 10 lid&iacute;</p>\r\n<p><strong>Při př&iacute;jezdu odevzdat:</strong> prohl&aacute;&scaron;en&iacute; z&aacute;konn&yacute;ch z&aacute;stupců, potvrzen&iacute; od l&eacute;kaře, list &uacute;častn&iacute;ka, průkaz poji&scaron;těnce</p>\r\n<p>Maxim&aacute;ln&iacute; počet &uacute;častn&iacute;ků je 15</p>\r\n<h2 style="text-align: center;"><strong>Jak se přihl&aacute;sit?</strong></h2>\r\n<p>Vyplnit přihl&aacute;&scaron;ku, kterou najdu u letn&iacute;ho t&aacute;bora v&yacute;&scaron;e, nebo po&scaron;tou.</p>\r\n<p>Vyplnit i ostatn&iacute; formul&aacute;ře (list &uacute;častn&iacute;ka atd.) ke stažen&iacute;&nbsp;v&yacute;&scaron;e u letn&iacute;ho t&aacute;bora</p>\r\n<p>Term&iacute;n odevzd&aacute;n&iacute; přihl&aacute;&scaron;ek nen&iacute; omezen časově, ale počtem přihl&aacute;&scaron;en&yacute;ch.&nbsp;</p>\r\n<p>Aktu&yacute;&aacute;ln&iacute; počet přihl&aacute;&scaron;en&yacute;ch : 7</p>\r\n<p><strong>Způsob &uacute;hrady:</strong> Hotově v Ř&iacute;deči, nebo převodem na &uacute;čet č. 100289956/0300 ( var. symbol rč. d&iacute;těte, do koment&aacute;ře pros&iacute;m uveďte &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;jm&eacute;no d&iacute;těte)</p>\r\n<p>&nbsp;</p>\r\n<h2 style="text-align: center;">Co s sebou?</h2>\r\n<p>Tepl&eacute; oblečen&iacute;, vysok&eacute; boty (gum&aacute;ky, kozačky atd.), tepl&eacute; ponožky, rukavice, čepice, hygienick&eacute; potřeby (ručn&iacute;k, m&yacute;dlo, kart&aacute;ček, pastu)</p>\r\n<p>&nbsp;</p>\r\n<p>V&iacute;ce informac&iacute; V&aacute;m poskytne Vladim&iacute;r Lorenc 604 305 911</p>\r\n<h2 style="text-align: center;">&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(3, 3, 'Ubytování', 'T', '<h1 style="text-align: center;">Ubytov&aacute;n&iacute; Rekreačn&iacute; st&aacute;j Ř&iacute;deč</h1>\r\n<p>&nbsp;</p>\r\n<p>Nab&iacute;z&iacute;me ubytov&aacute;n&iacute; s v&yacute;hledem na v&yacute;běh s koňmi a j&iacute;zd&aacute;rnu. Kdispozici V&aacute;m jsou 3 dvoulůžkov&eacute; apartm&aacute;ny a fale&scaron;n&yacute; strop až pro 10 nen&aacute;ročn&yacute;ch sp&aacute;čů.Pokoje byly nově vybudovan&eacute; v roce 2015, zař&iacute;zen&eacute; pro Va&scaron;e pohodl&iacute;. Každ&yacute; apartm&aacute;n je vybaven koupelnou se sprchou a wc, malou kuchyn&iacute; a prostorem na span&iacute;. &nbsp;Pokoje poj&iacute; chodba se společnou vět&scaron;&iacute; kuchyn&iacute; a společenskou m&iacute;stnost&iacute;, kde nebude chybět ping-pongov&yacute; stůl a dal&scaron;&iacute; společensk&eacute; hry.&nbsp;</p>\r\n<p>Cel&yacute; objekt pokr&yacute;va Wi-fi s&iacute;ťa v&scaron;echny pokoje maj&iacute; připojen&iacute; na TV.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li style="text-align: left;"><strong>3 dvoulůžkov&eacute; apartm&aacute;ny</strong></li>\r\n<li style="text-align: left;"><strong>fale&scaron;n&yacute; strop až pro 10 osob</strong></li>\r\n<li style="text-align: left;"><strong>wi-fi</strong></li>\r\n<li style="text-align: left;"><strong>v&yacute;hled na j&iacute;zd&aacute;rnu a v&yacute;běh pro koně</strong></li>\r\n<li style="text-align: left;"><strong>společensk&aacute; m&iacute;stnost ide&aacute;ln&iacute; na oslavy a ostatn&iacute; společensk&eacute; ud&aacute;losti</strong></li>\r\n</ul>\r\n<p style="text-align: left;"><strong>&nbsp;</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="/img/ubytovani.jpg" alt="" width="397" height="223" /></p>'),
(4, 4, 'Naše koně', 'K', NULL),
(5, 5, 'Co nabízíme', 'T', '<h1>Na&scaron;e koňsk&eacute; služby</h1>\r\n<h2><br />Rekreačn&iacute; st&aacute;j Ř&iacute;deč V&aacute;m nab&iacute;z&iacute;:</h2>\r\n<ul>\r\n<li><strong>VYJ&Iacute;ŽĎKY DO TER&Eacute;NU&nbsp;</strong>- vyj&iacute;žďka do ter&eacute;nu pro zač&aacute;tečn&iacute;ky i pokročil&eacute; jezdce, min.&nbsp;90 minut - 300 Kč/kůň</li>\r\n<li><strong>VYJ&Iacute;ŽĎKY DO TER&Eacute;NU&nbsp;PRO DĚTI</strong> - vyj&iacute;žďky do př&iacute;rody, koně vedeni vodičem, vhodn&eacute; pro &scaron;koly, &scaron;kolky, pracovn&iacute; kolektivy, rodiny apod., 60 minut - 250 Kč/kůň</li>\r\n<li><strong>V&Yacute;UKOV&Eacute; J&Iacute;ZDY NA KONI</strong> - v&yacute;cvikov&aacute; hodina na venkovn&iacute; j&iacute;zd&aacute;rně pod veden&iacute;m zku&scaron;en&eacute;ho cvičitele, 60 minut - 300 Kč/hod</li>\r\n</ul>\r\n<p>J&iacute;zd&aacute;rna zat&iacute;m nen&iacute; dostavěn&aacute;, o term&iacute;nu zhotoven&iacute; V&aacute;s budeme informovat.</p>\r\n<ul>\r\n<li><strong>VYJ&Iacute;ŽĎKY V KOČ&Aacute;ŘE</strong> ( v zimě za dobr&yacute;ch sněhov&yacute;ch podm&iacute;nek vyj&iacute;žďky na san&iacute;ch )\r\n<ul>\r\n<li>vyj&iacute;žďka do př&iacute;rody v koč&aacute;ře tažen&eacute;m dvěma chladnokrevn&yacute;mi koňmi, max. pro 4 osoby, 60 minut - 500 Kč/koč&aacute;r/hod</li>\r\n<li>vhodn&eacute; i na svatby, oslavy apod., orientačn&iacute; cena 3900&nbsp;Kč/koč&aacute;ř/den (cena bude odvozena od vzd&aacute;lenosti m&iacute;sta)</li>\r\n</ul>\r\n</li>\r\n<li><strong>T&Aacute;BORY V KOŇSK&Eacute;M SEDLE</strong> - jezdeck&yacute; v&yacute;cvik po skupink&aacute;ch pod veden&iacute;m odborn&yacute;ch cvičitelů o jarn&iacute;ch, letn&iacute;ch i zimn&iacute;ch pr&aacute;zdnin&aacute;ch, celodenn&iacute; p&eacute;če o koně, 6 noc&iacute; na pokoj&iacute;ch v apartm&aacute;nech, strava 5x denně\r\n<ul>\r\n<li>lesn&iacute; ter&eacute;n, venkovn&iacute; j&iacute;zd&aacute;rna, celodenn&iacute; v&yacute;lety, kompletn&iacute; p&eacute;če o koně</li>\r\n<li>doplňov&yacute; program: m&iacute;čov&eacute; hry, soutěže, koup&aacute;n&iacute;, t&aacute;bor&aacute;ky, diskot&eacute;ka,k&aacute;noe</li>\r\n<li>Cena : 3900 kč/d&iacute;tě</li>\r\n</ul>\r\n</li>\r\n<li><strong>HIPOTERAPIE</strong> - j&iacute;zda na speci&aacute;lně připraven&eacute;m koni pod veden&iacute;m zku&scaron;en&eacute;ho hipologa- 100 kč/15 min.</li>\r\n<li><strong>V&Iacute;KENDOV&Eacute; POBYTY S V&Yacute;UKOU J&Iacute;ZDY NA KONI</strong> - ubytov&aacute;n&iacute; v nadstandardn&iacute;ch apartm&aacute;nech, strava formou dovozu z restaurace,6 hodin j&iacute;zdy na koni, vhodn&eacute; pro zač&aacute;tečn&iacute;ky i pokročil&eacute; - 2900 Kč/os.</li>\r\n<li><strong>JEDNODENN&Iacute; V&Yacute;LET NA KON&Iacute;CH</strong> - odjezd kolem 10h, zast&aacute;vka na oběd cca 2hod, př&iacute;jezd kolem 18h- 700 Kč/os.</li>\r\n<li><strong>TŘ&Iacute;DENN&Iacute; DOBRODRUŽN&Eacute; V&Yacute;LETY NA KON&Iacute;CH</strong> - putov&aacute;n&iacute; v sedle denně 5-8 hodin, pobyt v př&iacute;rodě, nocleh pod stanem nebo pod &scaron;ir&aacute;kem, t&aacute;bor&aacute;ky apod., jen pro zku&scaron;en&eacute; jezdce<br />- 2500 Kč/koně ( cena uvedena za koně, ostatn&iacute; n&aacute;klady si každ&yacute; hrad&iacute; s&aacute;m )</li>\r\n</ul>\r\n<p><em>Tip: Věnujte sv&yacute;m bl&iacute;zk&yacute;m origin&aacute;ln&iacute; d&aacute;rek ve formě j&iacute;zdy na koni - na v&scaron;echny "koňsk&eacute;" služby nab&iacute;z&iacute;me zakoupen&iacute; d&aacute;rkov&eacute;ho poukazu.</em><br /><br /><strong>&rArr; bliž&scaron;&iacute; info Mgr. Vladim&iacute;r Lorenc&nbsp;&nbsp;&nbsp; +420 604 305 911</strong></p>\r\n<p>&nbsp;</p>\r\n<h3 style="text-align: center;"><strong>Co dělat, když chci objednat vyj&iacute;ždku, nebo jinou službu</strong></h3>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>Nejl&eacute;pe zavolat na telefon 604 305 911, sdělit term&iacute;n, čas, počet osob, jezdeck&eacute; schopnosti. Uv&eacute;st jezdce tež&scaron;&iacute; 90 kg&nbsp;</li>\r\n<li>Dostavit se v dan&yacute; term&iacute;n do Ř&iacute;deče 15 minut předem (k vyj&iacute;ždce patř&iacute; i či&scaron;těn&iacute; a sedl&aacute;n&iacute; kon&iacute;)</li>\r\n<li>S sebou je vhodn&eacute; si vz&iacute;t dlouh&eacute; kalhoty a uzavřenou ide&aacute;lně vysokou obuv (gum&aacute;ky), helmy m&aacute;me k zapůjčen&iacute;</li>\r\n</ol>'),
(6, 6, 'Novinky', 'T', '<h2>Hubertova j&iacute;zda</h2>\r\n<p><strong>Datum kon&aacute;n&iacute;: </strong>sobota 7.11. 2015</p>\r\n<p><strong>M&iacute;sto kon&aacute;n&iacute;: </strong>Rekreačn&iacute; st&aacute;j Ř&iacute;deč, Ř&iacute;deč 306</p>\r\n<p><strong>Startovn&eacute;: </strong>300 kč</p>\r\n<p><strong>V ceně startovn&eacute;ho zahrnuto: </strong>gul&aacute;&scaron;, 2 piva (kofoly), stužka, ceny pro v&iacute;těze,</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; občerstven&iacute; během akce a&nbsp; možnost ust&aacute;jen&iacute; koně</p>\r\n<p><strong>Podm&iacute;nky &uacute;časti: </strong>průkaz koně</p>\r\n<p><strong>Dress</strong> <strong>code</strong><strong>: </strong>vstup ve slavnostn&iacute;m oblečen&iacute;</p>\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;ČASOV&Yacute; HARMONOGRAM</strong></p>\r\n<p><strong>&nbsp; 9:00-9:30</strong>&nbsp; Sraz a veterin&aacute;rn&iacute; kontrola</p>\r\n<p><strong>&nbsp; 9:30 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>&nbsp;Slavnostn&iacute; n&aacute;stup na j&iacute;zd&aacute;rně</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;vyj&iacute;žďka do ter&eacute;nu spojen&aacute; s honem na li&scaron;ku</p>\r\n<p><strong>&nbsp; 14:00 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Doprovodn&eacute; soutěže</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(parkur do 90 cm, mini-maxi, barel racing a j&iacute;zda zručnosti)</p>\r\n<p>&nbsp;</p>\r\n<p><strong>&nbsp; &nbsp;19:00</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tradičn&iacute; soud a vyhla&scaron;ov&aacute;n&iacute; v&yacute;sledků</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Akce se kon&aacute; za každ&eacute;ho počas&iacute; !!</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Veřejnost v&iacute;tan&aacute;</p>\r\n<p>Bližs&iacute; informace :</p>\r\n<p>Vladim&iacute;r Lorenc 604 305 911</p>\r\n<p><a href="http://www.koneridec.cz/">www.</a><a href="http://www.koneridec.cz/">koneridec.cz</a></p>\r\n<p>Facebook/ koně Ř&iacute;deč</p>\r\n<h2>&nbsp;</h2>\r\n<h2>Pron&aacute;jem kon&iacute;</h2>\r\n<p>Př&aacute;li byste si m&iacute;t koně, ale nem&aacute;te ide&aacute;ln&iacute; podm&iacute;nky? Nem&aacute;te dostatek času každ&yacute; den? Nyn&iacute; m&aacute;te možnost si zkusit, jak&eacute; by to bylo m&iacute;t vlastn&iacute;ho koně. Nab&iacute;z&iacute;me možnost pron&aacute;jmu kon&iacute; na zimn&iacute; obdob&iacute; (listopad až květen) V&iacute;ce informac&iacute; a podm&iacute;nky o pron&aacute;jmu dle osobn&iacute; dohody s Vladim&iacute;rem Lorencem.&nbsp;</p>\r\n<p>Tel: &nbsp;+420 604 305 911</p>\r\n<p>Email: <a href="mailto:koneridec@seznam.cz">koneridec@seznam.cz</a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(7, 7, 'Galerie', 'G', NULL),
(8, 8, 'Kontakt', 'V', NULL),
(9, 9, 'Provozní řád', 'T', NULL),
(10, 10, 'Vzkazy', 'V', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `konemenu`
--

CREATE TABLE IF NOT EXISTS `konemenu` (
  `id` int(11) NOT NULL,
  `nazev` varchar(15) COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_czech_ci,
  `poradi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `konemenu`
--

INSERT INTO `konemenu` (`id`, `nazev`, `text`, `poradi`) VALUES
(1, 'Jolanka', '<h1>Jolanka</h1>\r\n<p><img style="float: right;" src="/img/img_5537.jpg" alt="" /><br /><br />Jm&eacute;no: <strong>JOLANKA</strong><br />Typ: chladnokrevn&yacute;<br />Pohlav&iacute;: klisna<br />Otec: ---<br />Matka: 13/450 Jalta<br />Datum narozen&iacute;: 11.2.2005<br />Barva: prokvetl&aacute; tmav&aacute; hnědka ( dle průkazu ),ve skutečnosti prkvt.tm.běl.&nbsp; smiley<br /><br />Povaha: hodn&aacute; a mazliv&aacute;, v ter&eacute;nu, vzhledem k typu koně chodiv&aacute;, r&aacute;d&aacute; i cv&aacute;l&aacute;, pohodln&yacute; pracovn&iacute; klus, v z&aacute;přahu zač&aacute;tečn&iacute;k<br /><br /><br /></p>', 1),
(2, 'Mek', '<div id="heading-content">\r\n<h1>Mek</h1>\r\n</div>\r\n<div class="editable">\r\n<p><img style="float: right;" src="/img/p8300718.jpg" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;">Jm&eacute;no:<strong> MC SCREAM</strong><br /> Naz&yacute;v&aacute;n: Mek<br /> Plemeno: Česk&yacute; teplokrevn&iacute;k<br /> Pohlav&iacute;: valach ( kastrace 6.4.2011 )<br /> Otec: 1165 Toy de Maziere<br /> Matka: 68/396 Nigela<br /> Datum narozen&iacute;: 9.6.2008<br /> Barva: ryz&aacute;k</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;"><span style="text-decoration: underline;">Povaha:</span> jeho matka je na&scaron;e Nigela, při či&scaron;těn&iacute; &scaron;klebiv&yacute;, na ježděn&iacute; nejkvalitněj&scaron;&iacute; kůň ze st&aacute;je.</span></p>\r\n</div>', 2),
(3, 'Monty', '<div id="heading-content">\r\n<h1>Monty</h1>\r\n</div>\r\n<div class="editable">\r\n<p><img style="float: right;" src="/img/img_5511.jpg" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;">Jm&eacute;no: <strong>MONTI DŽEK</strong><br /> Naz&yacute;v&aacute;n: Monty<br /> Plemeno: Česk&yacute; teplokrevn&iacute;k<br /> Pohlav&iacute;: valach<br /> Otec: 718 Mineral s.v.<br /> Matka: 67/179 Meiti<br /> Datum narozen&iacute;: 9.3.2000<br /> <strong>Barva</strong>: hněd&aacute;k ( dle průkazu ), </span><br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <span style="font-size: 16px;">ve</span>&nbsp;<span style="font-size: 16px;">skutečnosti&nbsp;</span><span style="font-size: 16px;">ryz&aacute;k</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;"><span style="text-decoration: underline;">Povaha:</span> l&iacute;biv&yacute; kon&iacute;k s kr&aacute;snou hř&iacute;vou, je to mazel, m&aacute; r&aacute;d pohlazen&iacute;. Naprosto bez probl&eacute;mu při či&scaron;těn&iacute;, pod sedlem poslu&scaron;n&yacute;, občas vesel&yacute;.</span></p>\r\n</div>', 3),
(4, 'Nigela', '<div id="heading-content">\r\n<h1>Nigela</h1>\r\n</div>\r\n<div class="editable">\r\n<p><img style="float: right;" src="/img/p8300832.jpg" alt="" /><br /> &nbsp;</p>\r\n<p><span style="font-size: 16px;">Jm&eacute;no: <strong>NIGELA</strong><br /> Plemeno: Česk&yacute; teplokrevn&iacute;k<br /> Pohlav&iacute;: klisna<br /> Otec: 2563 Silvaner Buňovsk&yacute;<br /> Matka: 82 North Star VI ( Nostra )<br /> Datum narozen&iacute;: 7.4.1994<br /> Barva: ryzka</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;"><span style="text-decoration: underline;">Povaha:</span> prvn&iacute; kůň ve st&aacute;ji, sebevědom&aacute;, občas &scaron;klebiv&aacute;, nem&aacute; r&aacute;da či&scaron;těn&iacute; a dotahov&aacute;n&iacute; sedla. Pro pohodln&eacute; chody ide&aacute;ln&iacute; pro zač&aacute;tečn&iacute;ky. V ter&eacute;nu naprosto klidn&aacute;, někdy až moc.</span><br /> <br />&nbsp;&nbsp;</p>\r\n</div>', 4),
(5, 'Orfík', '<div id="heading-content">\r\n<h1>Orf&iacute;k</h1>\r\n</div>\r\n<div class="editable">\r\n<p><br /> <img style="float: right;" src="/img/dsc07411.jpg" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;">Jm&eacute;no: <strong>QUEEN&acute;S&nbsp; ORPHAN</strong><br /> Naz&yacute;v&aacute;n: Orf&iacute;k<br /> Plemeno: Česk&yacute; teplokrevn&iacute;k<br /> Pohlav&iacute;: valach ( kastrace 6.4.2011 )<br /> Otec: 2901 Lancelot<br /> Matka: 49/258 Quinta<br /> Datum narozen&iacute;: 20.5.2008<br /> Barva: tmav&yacute; hněd&aacute;k</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;"><span style="text-decoration: underline;">Povaha:</span> matka zemřela u porodu, je odchov&aacute;n lidmi z l&aacute;hve, m&aacute; r&aacute;d lidi, je mazliv&yacute;. V ter&eacute;nu pohod&aacute;ř, vlastně ve v&scaron;em pohod&aacute;ř. Je to nejvy&scaron;&scaron;&iacute; kůň ze st&aacute;je.</span></p>\r\n<p>&nbsp;</p>\r\n</div>', 5),
(6, 'Ory', '<div id="wrapper-top">\r\n<div id="main-content">\r\n<div id="heading-content">\r\n<h1>Ory</h1>\r\n</div>\r\n<div class="editable">\r\n<p><img style="float: right;" src="/img/dsc07365.jpg" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;">Jm&eacute;no: <strong>ORY</strong></span><br /><span style="font-size: 16px;">Plemeno: Česk&yacute; teplokrevn&iacute;k</span><br /><span style="font-size: 16px;">Pohlav&iacute;: valach</span><br /><span style="font-size: 16px;">Otec: 2144 Serv&aacute;tor - 21</span><br /><span style="font-size: 16px;">Matka: Olivia</span><br /><span style="font-size: 16px;">Datum narozen&iacute;: 23.2.1994</span><br /><span style="font-size: 16px;">Barva: ryz&aacute;k</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;"><span style="text-decoration: underline;">Povaha:</span> kon&iacute;k "učitel", vždy se snaž&iacute; jezdci vyhovět, chodiv&yacute;, lehce ovladateln&yacute;, ochotně sk&aacute;če, nem&aacute; r&aacute;d či&scaron;těn&iacute;</span></p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>', 6),
(7, 'Soňa', '<div id="heading-content">\r\n<h1>Soňa</h1>\r\n</div>\r\n<div class="editable">\r\n<p><img style="float: right;" src="/img/img_5530.jpg" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;">Jm&eacute;no: <strong>SOŇA</strong><br /> Plemeno: Norick&yacute; kůň<br /> Pohlav&iacute;: klisna<br /> Otec: 2691 Streimur<br /> Matka: SM 2644 Silva<br /> Datum narozen&iacute;: 15.6.1999<br /> Barva: č. bělka</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;"><span style="text-decoration: underline;">Povaha:</span> sebevědom&aacute;, je si vědoma sv&eacute; s&iacute;ly,<br /> někdy &scaron;klebiv&aacute; u či&scaron;těn&iacute;, z&aacute;visl&aacute; na Jolance, &scaron;ikovn&aacute; v z&aacute;přahu i tahu</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>', 7),
(8, 'Leonka', '<div id="heading-content">\r\n<h1>Leonka</h1>\r\n</div>\r\n<div class="editable">\r\n<p><img style="float: right;" src="/img/leona.jpg" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;">Jm&eacute;no: <strong>Leona</strong><br /> Plemeno: <br /> Pohlav&iacute;: klisna<br /> Otec: <br /> Matka: <br /> Datum <br /> Barva: tmav&aacute; hnědka<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;"><span style="text-decoration: underline;">Povaha:</span>&nbsp;Leonka je u n&aacute;s soukromě ust&aacute;jen&aacute;, je v&scaron;ak využ&iacute;van&aacute; na vyj&iacute;žďky. Moc hodn&aacute; na o&scaron;etřov&aacute;n&iacute;, pod sedlem je to rychl&iacute;k. Ve st&aacute;dě je bohužel utlačovan&aacute;.</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style="color: #ff0000;"><span style="font-size: 16px;">&nbsp;</span></span></strong></p>\r\n</div>', 8),
(9, 'Bony', '<div id="heading-content">\r\n<h1>Bono</h1>\r\n</div>\r\n<div class="editable">\r\n<p><img style="float: right;" src="/img/bony1.jpg" alt="" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;">Jm&eacute;no: <strong>Bono</strong><br /> Plemeno: Slovensk&yacute; teplokrevn&iacute;k<br /> Pohlav&iacute;: valach<br /> Otec: 4556 Baldini<br /> Matka: 4032 Bona<br /> Datum narozen&iacute;: 10.5. 2006<br /> Barva: ryz&aacute;k<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 16px;"><span style="text-decoration: underline;">Povaha:</span>&nbsp;Mazel, hodn&yacute; na o&scaron;etřov&aacute;n&iacute;. Je u n&aacute;s kr&aacute;tce, zat&iacute;m nech&aacute;pe proč by měl jezdit za něk&yacute;m, když může jet prvn&iacute;. Pro to, zat&iacute;m pro zku&scaron;en&eacute; jezdce. Pokud jede prvn&iacute;, je v&yacute;born&yacute;.</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style="color: #ff0000;"><span style="font-size: 16px;">&nbsp;</span></span></strong></p>\r\n</div>', 9);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD UNIQUE KEY `id_foto` (`id_foto`);

--
-- Klíče pro tabulku `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id_galerie`),
  ADD UNIQUE KEY `id_galerie` (`id_galerie`);

--
-- Klíče pro tabulku `gb_data`
--
ALTER TABLE `gb_data`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `gb_ip_ban`
--
ALTER TABLE `gb_ip_ban`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `gb_jmena`
--
ALTER TABLE `gb_jmena`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `hlavnimenu`
--
ALTER TABLE `hlavnimenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `konemenu`
--
ALTER TABLE `konemenu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT pro tabulku `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id_galerie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pro tabulku `gb_data`
--
ALTER TABLE `gb_data`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pro tabulku `gb_ip_ban`
--
ALTER TABLE `gb_ip_ban`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `gb_jmena`
--
ALTER TABLE `gb_jmena`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `hlavnimenu`
--
ALTER TABLE `hlavnimenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pro tabulku `konemenu`
--
ALTER TABLE `konemenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
