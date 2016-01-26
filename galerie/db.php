<?php

  define("SQL_HOST","wm81.wedos.net");
  define("SQL_DBNAME","d92135_kr");
  define("SQL_USERNAME","w92135_kr");
  define("SQL_PASSWORD","4txCATLm");
  
function MysqlSpojeni() {

setlocale(LC_TIME, 'cs_CZ.utf-8');
$spojeni= mysqli_connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD);
$db=mysqli_select_db($spojeni,SQL_DBNAME);
PrSql($spojeni,"SET NAMES utf8");
return $spojeni;
}


function ProvedSql($spojeni,$sqldotaz,$txtUspech,$txtNeuspech){

  $result = mysqli_query($spojeni,$sqldotaz);
  if ($result) {
      echo $txtUspech;
    }
    else {
      echo "SQL : ".$sqldotaz;
      die ($txtNeuspech." :".mysqli_error($spojeni));
    }
}

function PrSql($pspojeni,$sqldotaz){
  $result = mysqli_query($pspojeni,$sqldotaz);
  if (!$result) {
     echo "SQL dotaz: ".$sqldotaz."<BR>";
     die ("Chyba DB :".mysqli_error($pspojeni));
    
    }
  return $result;
}

?>