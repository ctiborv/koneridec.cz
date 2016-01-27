<?php

function friendly_url($nadpis) {
    $url = $nadpis;
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
    return $url;
}


function zobrazGalerie($spojeni){

$sqlg="SELECT * FROM galerie order by priorita";  
$resg = PrSql($spojeni,$sqlg);

while ($zaznam = mysqli_fetch_array($resg)) {
    $inc=$inc."<div class=\"galerka\"><h3>".$zaznam["nazev"]."</h3><div class=\"galerie\">";
    $sqlf="SELECT * FROM foto where id_galerie=".$zaznam["id_galerie"];  
    $resf = PrSql($spojeni,$sqlf);
    while ($zaznamf = mysqli_fetch_array($resf)) {
      $inc=$inc."<a class=\"fancybox\" rel=\"example_group\" href=\"galerie/".$zaznamf["soubor"]."\">";
//      $inc=$inc."<div style=\"border: 1px solid #000; margin: 5px; float: left; width: 100px; height: 70px;background: url('galerie/".$zaznamf["soubormale"]."' \">";
      $inc=$inc."<div style=\"margin: 5px; float: left;\"><img height=\"80px\" src=\"galerie/".$zaznamf["soubormale"]."\"></div></a>";
      
//      $inc=$inc."</div></a>";
    }
    $inc=$inc."</div></div>\n";
   }
?>
<div id="strobsah">
  <div class="strana no-prvnistrana">
    <div id="obsahhl">  
    <h1>Fotogalerie rekrační stáje Řídeč</h1>
  <?php  echo $inc; ?>  
  </div>
</div>
</div>
<?php 

} 

function ZobrazMenu($spojeni) {

?>

<div id="vrch"> 
<div id="pole">
   <div id="logo"><a href="http://www.koneridec.cz/"><img height="100" src="img/logo.png" title="Vyjíždky na koních Koně řídeč "  alt="Vyjíždky na koních Koně Řídeč"/></a></div>
    <div id="menu">
       <ul id="nav">
<?php 
  $sql="SELECT * from hlavnimenu order by poradi";
  $res = PrSql($spojeni,$sql);
  $pocet = mysqli_num_rows($res);
  setlocale(LC_ALL,'czech'); 
  $i=1;
  
  while ($zaznam = mysqli_fetch_array($res)) {
  $id=$zaznam["id"];
  $nazev=$zaznam["nazev"];
  $typ=$zaznam["typ"];
  $input = friendly_url($nazev);
  $class="";  
  if ($i==1) {
  $class="class=\"first\"";
  }
  if ($i==$pocet) {
  $class="class=\"noborder\"";
  }
  
  ?>
        <li><a href="<?php echo $input?>.html"  <?php  echo $class?>><?php  echo $nazev ?></a>
  <?php 
/*  if ($typ=="T") {$rr=$rr."RewriteRule ^$input.html index.php?cmd=zobrazContent&id=$id\n";}
  if ($typ=="K") {$rr=$rr."RewriteRule ^$input.html index.php?cmd=zobrazKone&id=-1\n";}
  if ($typ=="G") {$rr=$rr."RewriteRule ^$input.html index.php?cmd=zobrazGalerii\n";}
  if ($typ=="U") {$rr=$rr."RewriteRule ^$input.html index.php\n";}
  if ($typ=="G") {$rr=$rr."RewriteRule ^$input.html index.php?cmd=zobrazGalerii\n";}
  if ($typ=="V") {$rr=$rr."RewriteRule ^$input.html index.php?cmd=zobrazVzkazy\n";}
*/  
  if ($typ=="K") {
    $sqlk="SELECT * from konemenu order by poradi";
    $resk = PrSql($spojeni,$sqlk);
    $pocetk = mysqli_num_rows($resk);
    $j=1;
    echo "      <ul>";
    while ($zaznamk = mysqli_fetch_array($resk)) {
      $id=$zaznamk["id"];
      $nazevk=$zaznamk["nazev"];
      $input = friendly_url($nazevk);
      if ($j==1) {
      $class="class=\"top\"";
    }
    if ($j==$pocetk) {
    $class="class=\"bottom\"";  
    }   
    ?>
          <li><a href="kone-ridec-<?php echo $input?>.html" <?php  echo $class?>><?php  echo $nazevk ?></a></li>
    <?php 
    $rr=$rr."RewriteRule ^kone-ridec-$input.html index.php?cmd=zobrazKone&id=$id\n";
    $j=$j+1;
    }
    echo "</ul>";
  }
  if ($typ=="M") {
    $sqlk="SELECT * from content_menu where id_hlavni_menu=".$zaznam["id"]." order by poradi";
    $resk = PrSql($spojeni,$sqlk);
    $pocetk = mysqli_num_rows($resk);
    $j=1;
    echo "      <ul>";
    while ($zaznamk = mysqli_fetch_array($resk)) {
      $id=$zaznamk["id_content_Menu"];
      $nazevk=$zaznamk["nazev"];
      $input = friendly_url($nazevk);
      if ($j==1) {
      $class="class=\"top\"";
    }
    if ($j==$pocetk) {
    $class="class=\"bottom\"";  
    }   
    ?>
          <li><a href="tabory-<?php echo $input?>.html" <?php  echo $class?>><?php  echo $nazevk ?></a></li>
    <?php 
    $rr=$rr."RewriteRule ^tabory-$input.html index.php?cmd=zobrazKone&id=$id\n";
    
    $j=$j+1;
    }
    
    echo "</ul>";
  }
  
  echo "</li>";
  $i=$i+1;
  }
  
  
?>
      <li><div id="facebook"><a href="https://www.facebook.com/profile.php?id=738842372871955&ref=ts&fref=ts"><img height="44px" src="img/logo-facebook.png"></a></div></li>
      </ul>
   </div>
  
 </div>

</div>

<?php 

}
function ZobrazTextMenu($spojeni) {
$id=$_GET["id"];
$sql="SELECT * from hlavnimenu where id=$id";
$res = PrSql($spojeni,$sql);
$pocet = mysqli_num_rows($res);
if ($pocet>0) {
  $zaznam = mysqli_fetch_array($res);
  $text=$zaznam["text"];
}
?>
<div id="strobsah">
  <div class="strana no-prvnistrana">
    <div id="obsahhl">  
  <?php  echo $text; ?>  
  </div>
</div>
</div>
<?php 
}


function ZobrazSoubory($spojeni,$idmenu) {
$sql="SELECT * FROM soubory_menu where id_content_Menu=$idmenu  order by poradi";
$res = PrSql($spojeni,$sql);
$pocet = mysqli_num_rows($res);
$poradi=0;
if ($pocet>0) {
?>
<hr>
<h2>Soubory ke stažení :</h2>
<ul class="soubory">
<?
 while ($zaznam = mysqli_fetch_array($res))
 {
 ?>  
  <li><div style='vertical-align:middle;'><a href="<?echo $zaznam["cesta"]?>"><?echo $zaznam["nazev"]?></a></div></li>
 <?
 }
?>
</ul>
<?
}
}
function ZobrazTextContentMenu($spojeni) {
$id=$_GET["id"];
$sql="SELECT * from content_menu where id_content_menu=$id";
$res = PrSql($spojeni,$sql);
$pocet = mysqli_num_rows($res);
if ($pocet>0) {
  $zaznam = mysqli_fetch_array($res);
  $text=$zaznam["text"];
}

?>
<div id="strobsah">
  <div class="strana no-prvnistrana">
    <div id="obsahhl">  
  <?php  
  echo $text; 
  ZobrazSoubory($spojeni,$id);
  
  ?>  
  </div>
</div>
</div>
<?php 
}



function ZobrazKone($spojeni) {
$id=$_GET["id"];
if ($id==-1) {$sql="SELECT * from konemenu order by poradi";}
else {$sql="SELECT * from konemenu where id=$id";}
$res = PrSql($spojeni,$sql);
$pocet = mysqli_num_rows($res);
if ($pocet>0) {
while ($zaznam = mysqli_fetch_array($res))
{
  $text=$zaznam["text"];

?>
<div id="strobsah">
  <div class="strana no-prvnistrana">
    <div id="obsahhl">  
  <?php  echo $text; ?>  
  </div>
</div>
</div>
<?php 

}
}
}

function ZobrazKontakt($spojeni) {


?>
<div id="strobsah">
  <div class="strana no-prvnistrana">
    <div id="obsahhl">  
            	<div class="grid_6 indent-sw-1">


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2577.0897872165388!2d17.259769!3d49.765568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471239d11be90453%3A0xc0694c9f04826124!2zxZjDrWRlxI0gMzA2LCA3ODUgMDEgxZjDrWRlxI0!5e0!3m2!1scs!2scz!4v1423424696574" width="400" height="300" frameborder="1" style="border:1"></iframe>
					<dl>
					    <dt class="color-3 indent-bot">Mgr. Vladimír Lorenc<br />Řídeč 306,<br />Řídeč 78501 </dt>
					     <dt><span>Telefon:</span>+420 604 305 911</dt>
					     <dt>E-mail: <a href="mailto:koneridec@seznam.cz">koneridec@seznam.cz</a></dt>
					</dl>                                                                 
					     <p>Rekreační stáj se nachází vpravo od autobusové točny v obci Řídeč. Obec je vzdálená 20 km severně od krajského města Olomouc.</p>
                </div>
            </div>
        </div>
  </div>
</div>
</div>
<?php 

}

function ZobrazVzkazy() {


?>
<div id="strobsah">
  <div class="strana no-prvnistrana">
    <div id="obsahhl">
    <iframe style="background-color: #F3EFB4;" frameborder="0" src="gbook/index.php" width="100%" height="600" >  
    
  </div>
</div>
</div>
<?php 

}


function ZobrazUvod($spojeni) {
?>


<div class="slider-wrapper">
   <div id="slides">  
     <div class="slides_container">
        <div class="slide">
									<div class="caption">
			                            <div class="slider-inner">Objevte spoustu krásných míst z koňského sedla. Kolem Řídeče jsou hluboké lesy i divoké louky s krásnými výhledy na Hanou.</div>
	                </div>
          <a rel=""  href="img/projizkda1.jpg" >       	<img  src="img/projizkda1.jpg" alt="" /> </a>
        </div>
	     <div class="slide">
									<div class="caption">
                           <div class="slider-inner">K dispozici je 9 koní ( Monty, Mc Scream, Nigela, Ory, Orphan, Soňa, Jolanka, Leona , Bony)</div>
                       </div>
	          <a id="example1" rel=""  href="img/2.jpg" >    	<img src="img/2.jpg" alt="" />  </a>
       </div>
	     <div class="slide">
									<div class="caption">
                           <div class="slider-inner">Vybavení stáje je nadstandartní jak pro koně, tak pro klienty ( šatny, WC, klubovna ). </div>
                       </div>
	          <a id="example1" rel=""  href="img/3.jpg" >    	<img src="img/3.jpg" alt="" />  </a>
       </div>
	     <div class="slide">
									<div class="caption">
                           <div class="slider-inner">VYJÍŽĎKY DO OKOLÍ PRO DĚTI - vyjížďky do přírody, koně vedeni vodičem, vhodné pro školy, školky, pracovní kolektivy, rodiny apod.</div>
                       </div>
	          <a id="example1" rel=""  href="img/3-dite.jpg" >    	<img src="img/3-dite.jpg" alt="" />  </a>
       </div>
	     <div class="slide">
									<div class="caption">
                           <div class="slider-inner">V KOŇSKÉM SEDLE - jezdecký výcvik po skupinkách pod vedením odborných cvičitelů o jarních, letních a zimních prázdninách, celodenní péče o koně, 6 nocí na pokojích v budově, strava 5x denně</div>
                       </div>
	          <a id="example1" rel=""  href="img/4-vyuka.jpg" >    	<img src="img/vyukam.jpg" alt="" />  </a>
       </div>
	     <div class="slide">
									<div class="caption">
                         <div class="slider-inner">Vyjížďka do přírody na saních(v zimě) nebo v kočáře taženém dvěma chladnokrevnými koňmi. </div>
                  </div>
          <a rel=""  href="img/vyjizdka-kocar.jpg" >       	<img  src="img/vyjizdka-kocar.jpg" alt="" /> </a>
      </div>

	  </div>
          </div>
 </div>

<div id="web-newbox">
<div class="strana">
  
  </div>
</div>
<div id="strobsah">
  <div class="strana no-prvnistrana">
    <div id="obsahhl">  
          <?php 
$id=$_GET["id"];
if (!$id) {
   $id=1;
}
$sql="SELECT * from hlavnimenu where id=$id";
$res = PrSql($spojeni,$sql);
$pocet = mysqli_num_rows($res);
if ($pocet>0) {
  $zaznam = mysqli_fetch_array($res);
  $text=$zaznam["text"];
}
echo $text;          
          ?>


         </div>
         <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>
 </div>
 


<?php 
}

function odpad() {
?>
									<div class="caption">
			                            <div class="slider-inner">Objevte spoustu krásných míst z koňského sedla. Kolem Řídeče jsou hluboké lesy i divoké louky s krásnými výhledy na Hanou.</div>
	                </div>
 			                            <div class="slider-inner">K dispozici je 9 koní ( Monty, Mc Scream, Nigela, Ory, Orphan, Soňa, Jolanka, , )</div>
	                                </div>

                                  			                        	<a class="close-button" href="#"></a>
			                        	<div class="slider-box-title p3">Vyjíždky na saních</div>
			                            <div class="slider-inner">V zimě se projeďte na saních jako v pohádce Mrazík...</div>
	                                </div>

<?php 

}
