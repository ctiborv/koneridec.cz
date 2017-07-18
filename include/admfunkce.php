<?php

  include('class.upload.php');

  function friendly_url($nadpis) {
    $url = $nadpis;
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
    return $url;
}


function ZobrazAdministraci($spojeni){

ZobrazUvod($spojeni,0,0);

?>

  <ul>
    <li><a href="?cmd=zobrazhlavni_Menu">Editace hlavního menu</a></li>
    <li><a href="?cmd=zobrazKoneMenu">Editace koní</a></li>
    <li><a href="?cmd=zobrazSliderMenu">Editace slideru - úvodní animace</a></li>
    <li><a href="gbook/admin.php">Editace vzkazů</a></li>
</ul>
  
<?php 

}

function UlozSoubor($cesta)
{
  $tmp_name = $_FILES["userfile"]["tmp_name"];
  if ($tmp_name) {
  $handle = new upload($_FILES['userfile']);
  if($handle->uploaded) {
      $handle->process($cesta);
      if($handle->processed) {
          $nazevs=$handle->file_dst_name;
          $handle->clean();
      }else{
          echo 'error : ' . $handle->error;
          return 0;
      }
    return $nazevs;  
    }        
  }
}

function browser_info($agent=null) {
  // Declare known browsers to look for
  $known = array('msie', 'firefox', 'safari', 'webkit', 'opera', 'netscape',
    'konqueror', 'gecko');

  // Clean up agent and build regex that matches phrases for known browsers
  // (e.g. "Firefox/2.0" or "MSIE 6.0" (This only matches the major and minor
  // version numbers.  E.g. "2.0.0.6" is parsed as simply "2.0"
  $agent = strtolower($agent ? $agent : $_SERVER['HTTP_USER_AGENT']);
  $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9]+(?:\.[0-9]+)?)#';
                                        
  // Find all phrases (or return empty array if none found)
  if (!preg_match_all($pattern, $agent, $matches)) return array();

  // Since some UAs have more than one phrase (e.g Firefox has a Gecko phrase,
  // Opera 7,8 have a MSIE phrase), use the last one found (the right-most one
  // in the UA).  That's usually the most correct.
  $i = count($matches['browser'])-1;
  return array($matches['browser'][$i] );
}

function convertTime($dformat,$sformat,$ts) {
    extract(strptime($ts,$sformat));
    return strftime($dformat,mktime(
                                  intval($tm_hour),
                                  intval($tm_min),
                                  intval($tm_sec),
                                  intval($tm_mon)+1,
                                  intval($tm_mday),
                                  intval($tm_year)+1900
                                ));
}

function VytvorSessId(){
      $token = md5(uniqid(mt_rand()));
      $ip=$_SERVER['REMOTE_ADDR'];
      $_SESSION["id"]=$token;
      $_SESSION["cas"]=time();
      $_SESSION["jmeno"]=null;
      $_SESSION["ip"]=$ip;
    }

function ZmenSessId(){
      $token = md5(uniqid(mt_rand()));
      $_SESSION["id"]=$token;
    }

function InitSession()  {
      session_start();
      
      
      if(!isset($_SESSION["id"])) {
        VytvorSessId();
        return 0;
        }
      else {
       return 1;
       }
}


function editContent_Data($spojeni)
{      
           
          $idmenu=$_GET["idm"];
          if ($idmenu) {
            $_SESSION["idcmenu"]=$idmenu;
            ZobrazUvod($spojeni,2,2);
          $sql="SELECT * from content_menu where id_content_Menu=$idmenu";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          $zaznam = mysqli_fetch_array($res);
          $text=$zaznam["text"];
          $butt="Uložit";
          editMenu_soubory($spojeni,$idmenu,$zaznam["nazev"]);
          ?>
          <form name="dataMenuT" ENCTYPE="multipart/form-data"  method="post" action="?cmd=editcontent_Data">
                <table>
                <td><textarea id="e1m1" name="text"><?echo $text ?></textarea></td>
                <tr>
                  <td align="center"><input type="submit" name="<?echo $butt?>" value="Uložit text"><input name="iddata" type="hidden" value="<?echo $zaznam["id_content_Menu"]?>"></td>
                </tr>
                </tr>
                </table>
            </form>
          <?php 
            }
          else {
          $text=$_POST["text"];
          $idm=$_POST["iddata"];
          $sql = "UPDATE content_menu SET text='$text' where id_content_Menu=$idm";
          $res = PrSql($spojeni,$sql);
          zobrazContent_Menu($spojeni);
          
          }
          
}           	

function prContent_Menu($spojeni)

{
  $idhmenu=$_SESSION["idhmenu"];
  $nahoru=$_POST["nahoru_x"];
  $dolu =$_POST["dolu_x"];
  $prejmenovat =$_POST["prejmenovat_x"];
  $novy=$_POST["novy_x"];
  $smazat = $_POST["smazat_x"]; 
  $id=$_POST["idmenu"];
  $novynazev=$_POST["nazev".$id];
  if ($novy) {
  $nazevn=$_POST["nazevn"];
  $poradi=$_POST["poradi"];   
  $sql = "INSERT INTO content_menu (nazev,poradi,id_hlavni_Menu) VALUES ('$nazevn',$poradi,$idhmenu)";
  $res = PrSql($spojeni,$sql);
  }
  
  if ($prejmenovat) {   
  $sql = "UPDATE content_menu SET nazev='$novynazev' where id_content_Menu=$id";
  $res = PrSql($spojeni,$sql);
  }
  if ($smazat) {
  $sql = "DELETE from content_menu where id_content_Menu=$id";
  $res = PrSql($spojeni,$sql);
  } 
  
  if ($nahoru || $dolu) {
    $poradi=$_POST["poradi"];
    if ($nahoru) {
    $sql = "SELECT * from content_menu where poradi<$poradi order by poradi DESC LIMIT 1";
    }
    else {
    $sql = "SELECT * from content_menu where poradi>$poradi order by poradi ASC LIMIT 1";
    }    
    $res = PrSQL($spojeni,$sql);
    $pocet = mysqli_num_rows($res);
    if ($pocet > 0) {
      $zaznam = mysqli_fetch_array($res);
      $idvrchni = $zaznam["id_content_Menu"];
      $porvrchni = $zaznam["poradi"];
      $sql = "UPDATE content_menu SET poradi='$porvrchni' where id_content_Menu=$id";
      $res = PrSql($spojeni,$sql);
      $sql = "UPDATE content_menu SET poradi='$poradi' where id_content_Menu=$idvrchni";
      $res = PrSql($spojeni,$sql);
    }
  }

  
  zobrazContent_Menu($spojeni);
  
  
}


function zobrazContent_Menu($spojeni)
        {  
                    ZobrazUvod($spojeni,1,2);
          $idhmenu=$_SESSION["idhmenu"];
          $sql="SELECT * FROM content_menu where id_hlavni_menu=$idhmenu order by poradi";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          ?>
            <table border="1" width="500">
            <tr>
              <th>Název</th>
              <th width="50">Upravit/<br>nový</th>
              <th>Pořadí</th>
              <th>Smazat</th>
              <th>Přidat údaje</th>
            </tr>
          <script language="JavaScript">
            function KontrolaNazvu(id)
                    {
                      var nazevform = "content_menu" + id;
                      var nazevpole = "nazev" + id;
                      var text_jmena = document.forms[nazevform][nazevpole].value;
                      var je_ok = text_jmena != "";
                      if (je_ok == false) alert('Nebyl zadán název menu!');
                      return je_ok; }         
           </script> 
          <?php  
          if ($pocet>0) {
          $i=0;
          while ($zaznam = mysqli_fetch_array($res))
           {
           $poradi=$zaznam["poradi"];
            ?>
            <tr>
      	    <form name="content_menu<?echo $zaznam["id_content_Menu"]?>" ENCTYPE="multipart/form-data"  method="post" action="?cmd=prcontent_Menu" onsubmit="return KontrolaNazvu(<?echo $zaznam["id_content_Menu"]?>);">
            <td><input id="idnaz<? echo $zaznam["id_content_Menu"]?>" type="text" value="<?echo $zaznam["nazev"];?>" name="nazev<? echo $zaznam["id_content_Menu"]?>"><input name="idmenu" type="hidden" value="<?echo $zaznam["id_content_Menu"]?>"></td>
            <td><input name="prejmenovat" type ="image" src="img/b_edit.png" value="1" ></td>
            <td><input type="hidden" name="poradi" value="<?echo $zaznam["poradi"]?>">
            <?php  if ($i>0) {?><input name="nahoru" type ="image" src="img/j_arrow_up.png" value="1"><br><?php }
            if ($i<($pocet-1)) {?><input name="dolu" type ="image" src="img/j_arrow_down.png" value="1"><?php }?>
            </td>
            <td><input name="smazat" type ="image" src="img/b_drop.png" value="1" onclick="return confirm('Budou tím smazány i veškeré data s touto položkou související, opravdu smazat tuto položku?')"></td>
            <td><a href="?cmd=editcontent_Data&idm=<?echo $zaznam["id_content_Menu"]?>">Editace textu</a></td>            
            </form>
            </tr>
            
            <?php 
            $i=$i+1;
          }           	
        } // END function ZobrazPrilohy

        ?>
         <tr>
      	    <form name="content_Menun" ENCTYPE="multipart/form-data"  method="post" action="?cmd=prcontent_Menu" onsubmit="return KontrolaNazvu('n');">
            <td><input type="text" value="" name="nazevn" value=""><input name="poradi" type="hidden" value="<?echo ($poradi+1)?>"></td>
            <td><input name="novy" type ="image" src="img/icon-16-new.png" value="1"></td>
            </form>
        </tr>      
        </table>  
        
                 
        <?php 

}



function editMenu_soubory($spojeni,$idmenu,$nazevmenu)
{

          if ($_POST) {
            $novy=$_POST["novy_x"] || $_POST["novy"];
            $nahoru=$_POST["nahoru_x"];
            $dolu =$_POST["dolu_x"];
            $smazat = $_POST["smazat_x"];
            $id=$_POST["iddata"];
            if ($smazat) {
              $sql = "DELETE from soubory_menu where id=$id";
              $res = PrSql($spojeni,$sql);
            }
            else {           
              $poradi=$_POST["poradinove"];
              $text=$_POST["textn"];
              $nazevmenu = friendly_url($nazevmenu);
              $nazevs="$nazevmenu-soub-$iddum-$idmenu-$nazevdomu-$datum";
              $cesta='soubory/';
              $nazevs=UlozSoubor($cesta);
              $nazevs = $cesta.$nazevs;
              $sql = "INSERT INTO soubory_menu (id_content_Menu,nazev,cesta,poradi) VALUES ($idmenu,'$text','$nazevs',$poradi)";
              $res = PrSql($spojeni,$sql);
            }          
          }
          ?>
          <script language="JavaScript">
            function KontrolaNazvu(id)
                    {
                      var nazevform = "dataMenu" + id;
                      var nazevpole = "text" + id;
                      var text_jmena = document.forms[nazevform][nazevpole].value;
                      var je_ok = text_jmena != "";
                      if (je_ok == false) alert('Nebyl zadán název souboru!');
                      return je_ok; }         
           </script> 
          <table>
          <?
          $sql="SELECT * FROM soubory_menu where id_content_Menu=$idmenu  order by poradi";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          $poradi=0;
          if ($pocet>0) {
          ?>
          <tr><td colspan="3">Nahrané soubory</td></tr><tr>
          <?
           $i=0;
           $j=1;
           while ($zaznam = mysqli_fetch_array($res))
           {
             ?>
	          <form name="dataMenu<?echo $zaznam["id"]?>" ENCTYPE="multipart/form-data"  method="post" action="" onsubmit="return KontrolaNazvu(<?echo $zaznam["id_domy_Data"]?>);">
             <td><input size="30" type="text" name="text" value="<?echo $zaznam["nazev"]?>"><br> 
             <a href="<?echo $zaznam["cesta"]?>"><?echo $zaznam["nazev"]?></a><br>
             <input name="prejmenovat" type ="image" src="img/b_edit.png" value="1" >
              <? if ($i>0) {?><input name="nahoru" type ="image" src="img/j_arrow_left.png" value="1"><?}
              if ($i<($pocet-1)) {?><input name="dolu" type ="image" src="img/j_arrow_right.png" value="1"><?}?>
              <input name="smazat" type ="image" src="img/b_drop.png" onclick="return confirm('Opravdu smazat?')" value="1"><input name="poradi" type="hidden" value="<?echo $zaznam["poradi"]?>"><input name="iddata" type="hidden" value="<?echo $zaznam["id"]?>"></td>
              </form>
              <?
              $poradi=$zaznam["poradi"];
              $i=$i+1;
              $j=$j+1;
              if ($j>3) {echo "</tr><tr>";$j=1;}
              
            }
          ?></tr>
          <?}
          ?>
          <form name="dataMenun" ENCTYPE="multipart/form-data"  method="post" action="" onsubmit="return KontrolaNazvu('n');">
          <tr>
          <td><input name="novy" type ="image" src="img/icon-16-new.png" value="1"></td><td>Název souboru : <input type="text" value="" name="textn" value=""></td><td>Soubor : <input type="file" size="30" name="userfile" ><input name="poradinove" type="hidden" value="<?echo ($poradi+1)?>"></td>
          </tr>
          </form>            
          </table>
<?
}


function ZobrazUvod($spojeni,$uroven,$cast)
{
switch ($cast) {
  case "0":
?>
          <div><h2><a href="admin.php">Administrace</a></h2></div><br><hr><br> 
<?php 
  break;
  case "1":
    $zpet= "<a href=\"admin.php\">";
  ?>
            <div><h2><a href="admin.php">Administrace</a> -> <a href="admin.php?cmd=zobrazKoneMenu">Koně menu</a> 
  <?php 

    if ($uroven>=1) {
        $idhm=$_GET["idm"];
        $zpet= "<a href=\"?cmd=zobrazKoneMenu\">";
        $sql="SELECT * FROM konemenu where id=$idhm";
        $res = PrSql($spojeni,$sql);
        $zaznam = mysqli_fetch_array($res);
        $nazevhlMenu=$zaznam["nazev"];
         ?>      
           - > <?php  echo $nazevhlMenu ?>  </a>
      <?php 
  }

  
  ?>
   </div><div class="zpet"><?php echo $zpet?>ZPĚT</A></div><br> 
  <?php 

  break;
  case "2":
    $zpet= "<a href=\"admin.php\">";
    $idhm=$_SESSION["idhmenu"];
  ?>
            <div><h2><a href="admin.php">Administrace</a> -> <a href="admin.php?cmd=zobrazhlavni_Menu">Hlavní menu</a> 
  <?php 

    if ($uroven>=1) {
        $idhm=$_SESSION["idhmenu"];
         $zpet= "<a href=\"?cmd=zobrazhlavni_Menu\">";
         $sql="SELECT * FROM hlavnimenu where id=$idhm";
         $res = PrSql($spojeni,$sql);
         $zaznam = mysqli_fetch_array($res);
         $nazevhlMenu=$zaznam["nazev"];
         ?>      
           - > <?php  echo $nazevhlMenu ?>  </a>
      <?php 
  }
    if ($uroven>=2) {
        $idcm=$_SESSION["idcmenu"];
        $zpet= "<a href=\"?cmd=zobrazcontent_Menu&idm=$idhm\">";
        $sql="SELECT nazev FROM content_menu where id_content_Menu=$idcm";
        $res = PrSql($spojeni,$sql);
        $zaznam = mysqli_fetch_array($res);
        $nazevcMenu=$zaznam["nazev"];
         ?>      
           - > <?php echo $zpet.$nazevcMenu ?></a>
      <?php 
  }
  
  ?>
   </div><div class="zpet"><?php echo $zpet?>ZPĚT</A></div><br> 
  <?php 
  break;
  case "3":
    $zpet= "<a href=\"admin.php\">";
  ?>
            <div><h2><a href="admin.php">Administrace</a> -> <a href="admin.php?cmd=zobrazSliderMenu">Slider menu</a> 
  <?php 

    if ($uroven>=1) {
        $idhm=$_GET["idm"];
        $zpet= "<a href=\"?cmd=zobrazKoneMenu\">";
        $sql="SELECT * FROM slider where id=$idhm";
        $res = PrSql($spojeni,$sql);
        $zaznam = mysqli_fetch_array($res);
        $nazevhlMenu=$zaznam["nazev"];
         ?>      
           - > <?php  echo $nazevhlMenu ?>  </a>
      <?php 
  }
  break;
    
 }
  
}



function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 

function UlozObrazek($cesta,$nazev,$typmenu)
{
  $tmp_name = $_FILES["userfile"]["tmp_name"];
  if ($tmp_name) {
  $handle = new upload($_FILES['userfile']);
  $x=$handle->image_src_x;
  $y=$handle->image_src_y;
  $mratiox=0;
        // Only proceed if the file has been uploaded
  if($handle->uploaded) {
            // Set the new filename of the uploaded image
            $handle->file_new_name_body   = "nahled-".$nazev;
            // Make sure the image is resized
            switch ($typmenu) {
              case "V":
                $maxx=X_VISUAL_NAHLED;
                $maxy=Y_VISUAL_NAHLED;
              break;
              case "P":
                $maxx=X_PUDORYS_NAHLED;
                $maxy=Y_PUDORYS_NAHLED;
              break;
              case "M":
                $maxx=X_DUM_NAHLED;
                $maxy=Y_DUM_NAHLED;
              break;
              default:
                $maxx=X_DUM_NAHLED;
                $maxy=Y_DUM_NAHLED;
            }              
            if ((($x<>$maxx) || ($y<>$maxy))) {
            // Set the width of the image
            if ($mratiox) {
              $handle->image_resize         = true;
              $handle->image_x              = $maxx;
              $handle->image_ratio_y              = true;
              echo "OBRAZEK ZMENEN NA $maxx,$maxy : a ratiox:".$mratiox;
            }
            else {
            $handle->image_resize         = true;
            $handle->image_x              = $maxx;
            $handle->image_y        = $maxy;
            }
            $handle->jpeg_quality = 100;
            $handle->process($cesta);
            }
            else {
            $handle->image_resize         = false;
            $handle->process($cesta);
            }

      switch ($typmenu) {
        case "V":
          $ratiox=X_VISUAL_VELKE;
        break;
        case "P":
          $ratiox=X_PUDORYS_VELKE;
        break;
        case "M":
          $ratiox=0;
        default:
          $ratiox=0;
      }              
      
      if ($ratiox) {
        if ($x>$ratiox) {
        $handle->image_resize         = true;
        $handle->image_ratio_y = true;
        $handle->image_x              = $ratiox;
        }
        else {
        $handle->image_resize         = false;
        $handle->image_x              = $x;
        $handle->image_y        = $y;
        }
        
        $handle->file_new_name_body   = "obr-".$nazev;
        $handle->process($cesta);
      }
      if($handle->processed) {
          $nazevobr=$handle->file_dst_name;
          $handle->clean();
      }else{
          echo 'error : ' . $handle->error;
          return 0;
      }
    return $nazevobr;  
    }        
  }
}



function prSliderMenu($spojeni)

{
  $idhmenu=$_SESSION["idhmenu"];
  $nahoru=$_POST["nahoru_x"];
  $dolu =$_POST["dolu_x"];
  $prejmenovat =$_POST["prejmenovat_x"];
  $novy=$_POST["novy_x"];
  $smazat = $_POST["smazat_x"]; 
  $id=$_POST["idmenu"];
  $novynazev=$_POST["nazev".$id];
  if ($novy) {
  $nazevn=$_POST["nazevn"];
  $poradi=$_POST["poradi"];   
  $sql = "INSERT INTO slider (nazev,poradi) VALUES ('$nazevn',$poradi)";
  $res = PrSql($spojeni,$sql);
  }
  
  if ($prejmenovat) {   
  $sql = "UPDATE slider SET nazev='$novynazev' where id=$id";
  $res = PrSql($spojeni,$sql);
  }
  if ($smazat) {
  $sql = "DELETE from slider where id=$id";
  $res = PrSql($spojeni,$sql);
  } 
  
  if ($nahoru || $dolu) {
    $poradi=$_POST["poradi"];
    if ($nahoru) {
    $sql = "SELECT * from slider where poradi<$poradi order by poradi DESC LIMIT 1";
    }
    else {
    $sql = "SELECT * from slider where poradi>$poradi order by poradi ASC LIMIT 1";
    }    
    $res = PrSQL($spojeni,$sql);
    $pocet = mysqli_num_rows($res);
    if ($pocet > 0) {
      $zaznam = mysqli_fetch_array($res);
      $idvrchni = $zaznam["id"];
      $porvrchni = $zaznam["poradi"];
      $sql = "UPDATE slider SET poradi='$porvrchni' where id=$id";
      $res = PrSql($spojeni,$sql);
      $sql = "UPDATE slider SET poradi='$poradi' where id=$idvrchni";
      $res = PrSql($spojeni,$sql);
    }
  }

  
  zobrazSliderMenu($spojeni);
  
  
}

function prKoneMenu($spojeni)

{
  $idhmenu=$_SESSION["idhmenu"];
  $nahoru=$_POST["nahoru_x"];
  $dolu =$_POST["dolu_x"];
  $prejmenovat =$_POST["prejmenovat_x"];
  $novy=$_POST["novy_x"];
  $smazat = $_POST["smazat_x"]; 
  $id=$_POST["idmenu"];
  $novynazev=$_POST["nazev".$id];
  if ($novy) {
  $nazevn=$_POST["nazevn"];
  $poradi=$_POST["poradi"];   
  $sql = "INSERT INTO konemenu (nazev,poradi) VALUES ('$nazevn',$poradi)";
  $res = PrSql($spojeni,$sql);
  }
  
  if ($prejmenovat) {   
  $sql = "UPDATE konemenu SET nazev='$novynazev' where id=$id";
  $res = PrSql($spojeni,$sql);
  }
  if ($smazat) {
  $sql = "DELETE from konemenu where id=$id";
  $res = PrSql($spojeni,$sql);
  } 
  
  if ($nahoru || $dolu) {
    $poradi=$_POST["poradi"];
    if ($nahoru) {
    $sql = "SELECT * from konemenu where poradi<$poradi order by poradi DESC LIMIT 1";
    }
    else {
    $sql = "SELECT * from konemenu where poradi>$poradi order by poradi ASC LIMIT 1";
    }    
    $res = PrSQL($spojeni,$sql);
    $pocet = mysqli_num_rows($res);
    if ($pocet > 0) {
      $zaznam = mysqli_fetch_array($res);
      $idvrchni = $zaznam["id"];
      $porvrchni = $zaznam["poradi"];
      $sql = "UPDATE konemenu SET poradi='$porvrchni' where id=$id";
      $res = PrSql($spojeni,$sql);
      $sql = "UPDATE konemenu SET poradi='$poradi' where id=$idvrchni";
      $res = PrSql($spojeni,$sql);
    }
  }

  
  zobrazkonemenu($spojeni);
  
  
}


function zobrazKoneMenu($spojeni)
        {  
                    ZobrazUvod($spojeni,0,1);
          $sql="SELECT * FROM konemenu  order by poradi";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          ?>
            <table border="1" width="500">
            <tr>
              <th>Název</th>
              <th width="50">Upravit/<br>nový</th>
              <th>Pořadí</th>
              <th>Smazat</th>
              <th>Přidat údaje</th>
            </tr>
          <script language="JavaScript">
            function KontrolaNazvu(id)
                    {
                      var nazevform = "konemenu" + id;
                      var nazevpole = "nazev" + id;
                      var text_jmena = document.forms[nazevform][nazevpole].value;
                      var je_ok = text_jmena != "";
                      if (je_ok == false) alert('Nebyl zadán název menu!');
                      return je_ok; }         
           </script> 
          <?php  
          if ($pocet>0) {
          $i=0;
          while ($zaznam = mysqli_fetch_array($res))
           {
           $poradi=$zaznam["poradi"];
            ?>
            <tr>
      	    <form name="konemenu<?php echo $zaznam["id"]?>" ENCTYPE="multipart/form-data"  method="post" action="?cmd=prKoneMenu" onsubmit="return KontrolaNazvu(<?php echo $zaznam["id"]?>);">
            <td><input id="idnaz<?php  echo $zaznam["id"]?>" type="text" value="<?php echo $zaznam["nazev"];?>" name="nazev<?php  echo $zaznam["id"]?>"><input name="idmenu" type="hidden" value="<?php echo $zaznam["id"]?>"></td>
            <td><input name="prejmenovat" type ="image" src="img/b_edit.png" value="1" ></td>
            <td><input type="hidden" name="poradi" value="<?php echo $zaznam["poradi"]?>">
            <?php  if ($i>0) {?><input name="nahoru" type ="image" src="img/j_arrow_up.png" value="1"><br><?php }
            if ($i<($pocet-1)) {?><input name="dolu" type ="image" src="img/j_arrow_down.png" value="1"><?php }?>
            </td>
            <td><input name="smazat" type ="image" src="img/b_drop.png" value="1" onclick="return confirm('Budou tím smazány i veškeré data s touto položkou související, opravdu smazat tuto položku?')"></td>
            <td><a href="?cmd=editKoneData&idm=<?php echo $zaznam["id"]?>">Editace textu</a></td>            
            </form>
            </tr>
            
            <?php 
            $i=$i+1;
          }           	
        } // END function ZobrazPrilohy

        ?>
         <tr>
      	    <form name="konemenun" ENCTYPE="multipart/form-data"  method="post" action="?cmd=prKoneMenu" onsubmit="return KontrolaNazvu('n');">
            <td><input type="text" value="" name="nazevn" value=""><input name="poradi" type="hidden" value="<?php echo ($poradi+1)?>"></td>
            <td><input name="novy" type ="image" src="img/icon-16-new.png" value="1"></td>
            </form>
        </tr>      
        </table>  
        
                 
        <?php 

}

function zobrazSliderMenu($spojeni)
        {  
                    ZobrazUvod($spojeni,0,3);
          $sql="SELECT * FROM slider  order by poradi";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          ?>
            <table border="1" width="500">
            <tr>
              <th>Název</th>
              <th width="50">Upravit/<br>nový</th>
              <th>Pořadí</th>
              <th>Smazat</th>
              <th>Přidat údaje</th>
            </tr>
          <script language="JavaScript">
            function KontrolaNazvu(id)
                    {
                      var nazevform = "konemenu" + id;
                      var nazevpole = "nazev" + id;
                      var text_jmena = document.forms[nazevform][nazevpole].value;
                      var je_ok = text_jmena != "";
                      if (je_ok == false) alert('Nebyl zadán název menu!');
                      return je_ok; }         
           </script> 
          <?php  
          if ($pocet>0) {
          $i=0;
          while ($zaznam = mysqli_fetch_array($res))
           {
           $poradi=$zaznam["poradi"];
            ?>
            <tr>
      	    <form name="konemenu<?php echo $zaznam["id"]?>" ENCTYPE="multipart/form-data"  method="post" action="?cmd=prSliderMenu" onsubmit="return KontrolaNazvu(<?php echo $zaznam["id"]?>);">
            <td><input id="idnaz<?php  echo $zaznam["id"]?>" type="text" value="<?php echo $zaznam["nazev"];?>" name="nazev<?php  echo $zaznam["id"]?>"><input name="idmenu" type="hidden" value="<?php echo $zaznam["id"]?>"></td>
            <td><input name="prejmenovat" type ="image" src="img/b_edit.png" value="1" ></td>
            <td><input type="hidden" name="poradi" value="<?php echo $zaznam["poradi"]?>">
            <?php  if ($i>0) {?><input name="nahoru" type ="image" src="img/j_arrow_up.png" value="1"><br><?php }
            if ($i<($pocet-1)) {?><input name="dolu" type ="image" src="img/j_arrow_down.png" value="1"><?php }?>
            </td>
            <td><input name="smazat" type ="image" src="img/b_drop.png" value="1" onclick="return confirm('Budou tím smazány i veškeré data s touto položkou související, opravdu smazat tuto položku?')"></td>
            <td><a href="?cmd=editSliderData&idm=<?php echo $zaznam["id"]?>">Editace slideru</a></td>            
            </form>
            </tr>
            
            <?php 
            $i=$i+1;
          }           	
        } // END function ZobrazPrilohy

        ?>
         <tr>
      	    <form name="konemenun" ENCTYPE="multipart/form-data"  method="post" action="?cmd=prSliderMenu" onsubmit="return KontrolaNazvu('n');">
            <td><input type="text" value="" name="nazevn" value=""><input name="poradi" type="hidden" value="<?php echo ($poradi+1)?>"></td>
            <td><input name="novy" type ="image" src="img/icon-16-new.png" value="1"></td>
            </form>
        </tr>      
        </table>  
        
                 
        <?php 

}


function nahrajKoneObrazky($spojeni)
{
    $nahoru=$_POST["nahoru_x"];
  $dolu =$_POST["dolu_x"];
  $prejmenovat =$_POST["prejmenovat_x"];
  $novy=$_POST["novy_x"];
  $smazat = $_POST["smazat_x"]; 
  $id_kone=$_GET['idm'];
  if (isset($_POST['Nahratnovy'])) {
  
      	$uploaded= $_FILES['userfile']['name'];
        $poradi = (int)$_POST['poradinove'];
      	foreach ($uploaded as $key => $value){				
            $fname	=	$value;
            $fext =      explode(".",$value);
            $fext		=  end($fext );		
            $ftype	=	$_FILES['userfile']['type'][$key];
            $ftmp	=	$_FILES['userfile']['tmp_name'][$key];
            $fsize	=	$_FILES['userfile']['size'][$key];					
            $ferror=	$_FILES['userfile']['error'][$key];     
            $nazev_obr =  friendly_url(basename($fname)); 
            $res = perform_upload($nazev_obr, $fext, $ftmp, $fsize, $ftype,$ferror,1500,1500,1);
            $sql = "INSERT INTO kone_obrazky 
            SET poradi=$poradi,
            obrazek='$res',
            id_kone=$id_kone";
            $res = PrSql($spojeni,$sql);
            $poradi++;
    }
  }
  $id=(int)$_POST['id_obrazek'];
 if ($nahoru || $dolu) {
    $poradi=$_POST["poradi"];
    if ($nahoru) {
    $sql = "SELECT * from kone_obrazky where poradi<$poradi order by poradi DESC LIMIT 1";
    }
    else {
    $sql = "SELECT * from kone_obrazky where poradi>$poradi order by poradi ASC LIMIT 1";
    }    
    $res = PrSQL($spojeni,$sql);
    $pocet = mysqli_num_rows($res);
    if ($pocet > 0) {
      $zaznam = mysqli_fetch_array($res);
      $idvrchni = $zaznam["id_obrazek"];
      $porvrchni = $zaznam["poradi"];
      $sql = "UPDATE kone_obrazky SET poradi='$porvrchni' where id_obrazek=$id";
      $res = PrSql($spojeni,$sql);
      $sql = "UPDATE kone_obrazky SET poradi='$poradi' where id_obrazek=$idvrchni";
      $res = PrSql($spojeni,$sql);
    }
  }
    
  if ($smazat) {
  echo "SMAZANO";
  $sql = "DELETE from kone_obrazky where id_obrazek=$id";
  $res = PrSql($spojeni,$sql);
  } 
  
  
  editKoneData($spojeni);
  
}


function editKoneData($spojeni)
{      
           
          $idmenu=$_GET["idm"];
          if ($idmenu) {
            ZobrazUvod($spojeni,1,1);
          $sql="SELECT * from konemenu where id=$idmenu";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          $zaznam = mysqli_fetch_array($res);
          $text=$zaznam["text"];
          $butt="Uložit";
          ?>
                <table>
                <?
          $sql="SELECT * FROM kone_obrazky where id_kone=$idmenu order by poradi";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          if ($pocet>0) {
          ?>
          <tr><td colspan="3">Nahrané obrázky</td></tr><tr>
          <?
           $i=0;
           $j=1;
           while ($zaznam = mysqli_fetch_array($res))
           {
             ?>
	          <form name="dataMenu" ENCTYPE="multipart/form-data"  method="post" action="?cmd=obrazek_kone&idm=<?=$idmenu?>">
             <td>
             <img width="100" src="<?= CESTA_OBRAZKY."thumbs/thumb_m_".$zaznam["obrazek"]?>" alt="nahled"/><br>
              <? if ($i>0) {?><input name="nahoru" type ="image" src="img/j_arrow_left.png" value="1"><?}
              if ($i<($pocet-1)) {?><input name="dolu" type ="image" src="img/j_arrow_right.png" value="1"><?}?>
              <input name="smazat" type ="image" src="img/b_drop.png" onclick="return confirm('Opravdu smazat?')" value="1"><input name="poradi" type="hidden" value="<?echo $zaznam["poradi"]?>"><input name="id_obrazek" type="hidden" value="<?echo $zaznam["id_obrazek"]?>">
              <input name="typm" type="hidden" value="<?echo $typ?>"></td>
              </form>
              <?
              $poradi=$zaznam["poradi"];
              $i=$i+1;
              $j=$j+1;
              if ($j>6) {echo "</tr><tr>";$j=1;}
            }
            
          ?></tr>
          </table>
          <table>
          <?}?>
          <form name="dataMenuN" ENCTYPE="multipart/form-data"  method="post" action="?cmd=obrazek_kone&idm=<?=$idmenu?>">
          <tr>
          <td colspan="3">Přidat obrázky: <input type="file" name="userfile[]" value="" multiple><input name="poradinove" type="hidden" value="<?echo ($poradi+1)?>">
          <input type="submit" name="Nahratnovy" value="Nahrát obrázky">
          </td>
          </tr>
          </form>            
          <form name="dataMenuT" ENCTYPE="multipart/form-data"  method="post" action="?cmd=editKoneData">
                <td><textarea id="e1m1" name="text"><?php echo $text ?></textarea></td>
                <tr>
                  <td align="center"><input type="submit" name="<?php echo $butt?>" value="Uložit text"><input name="iddata" type="hidden" value="<?=$idmenu?>"></td>
                </tr>
                </tr>
                </table>
            </form>
          <?php 
            }
          else {
          $text=$_POST["text"];
          $idm=$_POST["iddata"];
          $sql = "UPDATE konemenu SET text='$text' where id=$idm";
          $res = PrSql($spojeni,$sql);
          zobrazKoneMenu($spojeni);
          
          }
          
}           	





function editSliderData($spojeni)
{      
           
          $idmenu=$_GET["idm"];
          if ($idmenu) {
            ZobrazUvod($spojeni,1,3);
          $sql="SELECT * from slider where id=$idmenu";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          $zaznam = mysqli_fetch_array($res);
          $text=$zaznam["popis"];
          $butt="Uložit";
          ?>
          <form name="dataMenuT" ENCTYPE="multipart/form-data"  method="post" action="?cmd=editSliderData">
            <table>
              
              <tr>
                <td>
                              <?if ($zaznam['obrazek']) {?>
              
                <img width="100" src="/galerie/obrazky/<?=$zaznam['obrazek']?>">
              <?php } ?>

               <input type="file" name="userfile" value="">
              </tr>
              <tr>  
                
                <td><div style="font-size:16px">TEXT:</div><textarea id="" cols="80" rows="5" name="text"><?php echo $text ?></textarea></td>
              </tr>  
              <tr>
                  <td align="center"><input type="submit" name="<?php echo $butt?>" value="Uložit slider"><input name="iddata" type="hidden" value="<?=$idmenu?>"></td>
                </tr>
              </tr>
            </table>
          </form>
          <?php 
            }
          else {
          if (($_FILES['userfile']['name'])) {
            $input = $_FILES['userfile'];
            $fname	=	$_FILES['userfile']['name'];
            $fext =  explode(".",$fname);
            $fext		=  end($fext);	
            $ftype	=	$_FILES['userfile']['type'];
            $ftmp	=	$_FILES['userfile']['tmp_name'];
            $fsize	=	$_FILES['userfile']['size'];					
            $ferror=	$_FILES['userfile']['error'];
            $nazev_obr =  friendly_url(basename($fname)); 
            $image=perform_upload($nazev_obr, $fext, $ftmp, $fsize, $ftype,$ferror,760,428,1);
            $sqlimage=", obrazek='$image'";
          }
          else $sqlimage="";
          $text=$_POST["text"];
          $idm=$_POST["iddata"];
          $sql = "UPDATE slider SET popis='$text' $sqlimage where id=$idm";
          $res = PrSql($spojeni,$sql);
          zobrazSliderMenu($spojeni);
          
          }
          
}           	


function editHlavni_Data($spojeni)
{      
           
          $idmenu=$_GET["idm"];
          if ($idmenu) {
            ZobrazUvod($spojeni,1,2);
          $sql="SELECT * from hlavnimenu where id=$idmenu";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          $zaznam = mysqli_fetch_array($res);
          $text=$zaznam["text"];
          $butt="Uložit";
          ?>
          <form name="dataMenuT" ENCTYPE="multipart/form-data"  method="post" action="?cmd=edithlavni_Data">
                <table>
                <td><textarea id="e1m1" name="text"><?php echo $text ?></textarea></td>
                <tr>
                  <td align="center"><input type="submit" name="<?php echo $butt?>" value="Uložit text"><input name="iddata" type="hidden" value="<?php echo $zaznam["id"]?>"></td>
                </tr>
                </tr>
                </table>
            </form>
          <?php 
            }
          else {
          $text=$_POST["text"];
          $idm=$_POST["iddata"];
          $sql = "UPDATE hlavnimenu SET text='$text' where id=$idm";
          $res = PrSql($spojeni,$sql);
          zobrazHlavni_menu($spojeni);
          
          }
          
}           	


function zobrazHlavni_Menu($spojeni)
        {  
           ZobrazUvod($spojeni,0,2);

          $sql="SELECT * FROM hlavnimenu order by poradi";
          $res = PrSql($spojeni,$sql);
          $pocet = mysqli_num_rows($res);
          ?>
            <table border="1" width="500">
            <tr>
              <th>Názvy</th>
              <th>Typ</th>
              <th>Přidat údaje</th>
            </tr>
          <script language="JavaScript">
            function KontrolaNazvu(id)
                    {
                      var nazevform = "content_menu" + id;
                      var nazevpole = "nazev" + id;
                      var text_jmena = document.forms[nazevform][nazevpole].value;
                      var je_ok = text_jmena != "";
                      if (je_ok == false) alert('Nebyl zadán název menu!');
                      return je_ok; }         
           </script> 
          <?php  
          if ($pocet>0) {
          $i=0;
          while ($zaznam = mysqli_fetch_array($res))
           {
           $poradi=$zaznam["poradi"];
            ?>
            <tr>
            <td>
            <?php  echo $zaznam["nazev"] ?>
            </td>
            <td>
            <?php  echo $zaznam["typ"]; ?>
            </td>
            <td>
            <?php 
            switch ($zaznam["typ"]) {
              case "M":
                ?><a href="?cmd=zobrazcontent_Menu&idm=<?php echo $zaznam["id"]?>">Editovat submenu</a><?php 
              break;
              case "G":
                ?><a href="../galerie/admin.php">Editovat galerii</a><?php 
              	break;
              case "T":
                ?><a href="?cmd=edithlavni_Data&idm=<?php echo $zaznam["id"]?>">Editovat text</a><?php 
              break;
              case "U":
                ?><a href="?cmd=edithlavni_Data&idm=<?php echo $zaznam["id"]?>">Editovat text</a><?php 
              break;
              case "K":
              
              break;
            }
            ?>
            </td>
            </form>
            </tr>
            
            <?php 
            $i=$i+1;
          }           	
        } // END function ZobrazPrilohy

        ?>
        </table>  
        
                 
        <?php 

}



    function resizePhoto($cesta,$nazev,$width,$height,$aspectratio,$quality,$typ)  {
    
       /*
       $vstup //cesta k původnímu obrázku
       $vystup //cesta ke zmenšenému obrázku
       $width //šířka zmenšeného obrázku
       $height //délka zmenšeného obrázku
       $aspectratio //zachovávat poměr stran (0/1)
       $quality //komprese (100 - nejlepsi) - doporucuji 75
        */
    
      $vstup = $cesta;
        if(file_exists($vstup)){  //nejprve zjistíme, zda-li byl zadán vstup a existuje
            $vstup = ImageCreateFromJPEG($vstup);  //načteme si obrázek do proměnné
        } else {
            return false;
        }
        $vstup_wd = imagesx($vstup); //zjistíme šířku původního obrázku
        $vstup_ht = imagesy($vstup);  //zjistíme délku původního obrázku
    
        if($vstup_wd <= $width && $vstup_ht <= $height) {
            //pokud je obrázek menší než požadovaná velikost nebudeme počítat nové hodnoty
            $width = $vstup_wd;
            $height = $vstup_ht;
        } else {
            if($aspectratio) {
                //pokud je zaplý aspect ratio spočítáme novou velikost v daném poměru
                $w = round($vstup_wd * $height / $vstup_ht);
                $h = round($vstup_ht * $width / $vstup_wd);
                if(($height-$h)<($width-$w)){
                    $width =& $w;
                } else {
                    $height =& $h;
                }
            }
             else { 
              if( $vstup_wd > $vstup_ht ) {
                    // For landscape images
                    $x_offset = ($vstup_wd - $vstup_ht) / 2;
                    $y_offset = 0;
                    $square_size = $vstup_wd - ($x_offset * 2);
                } else {
                    // For portrait and square images
                    $x_offset = 0;
                    $y_offset = ($vstup_ht - $vstup_wd) / 2;
                    $square_size = $vstup_ht - ($y_offset * 2);
                }
              }             
            
        }
        $temp = imageCreateTrueColor($width,$height);
        //vytvoříme obrázek o rozměrech zmenšeného obrázku
        if ($aspectratio) imageCopyResampled($temp, $vstup, 0, 0, 0, 0, $width, $height, $vstup_wd, $vstup_ht);
        else imageCopyResampled(
            $temp,
            $vstup,
                0,
                0,
                $x_offset,
                $y_offset,
                $width,
                $height,
                $square_size,
                $square_size
                );
        
//        imagecopy(resource dst_im, resource src_im, int dst_x, int dst_y, int src_x, int src_y, int src_w, int src_h) 
        //obrázky zkopíruje na sebe, takže dojde vlastně ke zmenšení výsledného obrázku
        $vystup=CESTA_OBRAZKY."/thumbs/thumb_".$typ."_".$nazev;
        ImageJPEG($temp, $vystup, $quality);
        //uložíme zmenšený obrázek na výstup
        imagedestroy($vstup); //uvolnime pamět
        imagedestroy($temp); //uvolnime pamět
        return $vystup;
    }

        function perform_upload($filename, $fextension, $temp_file, $filesize, $filetype,$fileerror,$resize_x,$resize_y,$zachovat_strany){

        $goodSize=($filesize < 9950000);

        $allowedExts= array("jpg", "jpeg", "gif", "png");	
        $extensionMatch = in_array(strtolower($fextension), $allowedExts);
        if(!$extensionMatch ) {
            echo "extension dont match";
            return 0;
        }
        if ($goodSize  && $extensionMatch) {
            if ($fileerror > 0) {
                echo "fileerror";
                return 0;
            }   
        else   {
            $location = CESTA_OBRAZKY;
            $soubor = $location.$filename.".$fextension";
            if (file_exists($soubor)) {
             $filename="1".$filename;
             $soubor=$location.$filename.".$fextension";;
            }
            

            
            if(!move_uploaded_file($temp_file, $soubor))
                            echo "failed to move the upload file to $location<br>";
            else
                            echo "Stored in: " . $location;
            if (strtolower($fextension)=='jpg') {
                $vystup=$filename.".$fextension";
                resizePhoto($soubor,$filename.".$fextension",$resize_x,$resize_y,$zachovat_strany,'75','l');
                resizePhoto($soubor,$filename.".$fextension",500,500,0,'75','m');
                resizePhoto($soubor,$filename.".$fextension",50,50,0,'55','s');
            }
            else $vystup = $soubor;
	}
    
        }
        else {
            echo "extension error";
            $vystup=0;
        }
        
        return $vystup;
        }


