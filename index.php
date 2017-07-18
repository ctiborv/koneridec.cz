<?php

include("include/funkce.php"); 
include("include/db.php");
$glspojeni = MysqlSpojeni();
$GLOBALS["spojeni"]=$glspojeni;

?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="robots" content="index, follow">
<meta name="description" content="Rekreační stáj Řídeč, děti, projíždky,">
<meta name="keywords" content="jezdectví,vyjížďky, výuka, jízda, kůn, koně, děti, projíždky, vyjíždky, příroda, hippoterapie">
<meta name="author" content="Ctibor Venus">
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Podkova">
<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/slider.css" type="text/css" media="screen, projection">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
<script type="text/javascript" src="js/jquery-1.11.2.min.js "></script>
<script type="text/javascript" src="js/bootstrap.min.js "></script>
     
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="js/jquery.responsivemenu.js"></script>    
<script type="text/javascript" src="js/superfish.js"></script>    
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>      
<script type="text/javascript" src="js/jquery.ui.totop.js"></script>       
                                                                           
<script type="text/javascript" src="js/slides.min.jquery.js"></script>     
<script type="text/javascript" src="js/script.js"></script>     

<script type="text/javascript" src="js/jquery.hoverIntent.js"></script> 	
<script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>     
<script type="text/javascript" src="js/jquery.color.js"></script>     
<script type="text/javascript" src="js/jquery.backgroundPosition.js"></script>     


	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});        
	</script>
  
<script type="text/javascript">
	
	function CaptionTop() {
		if ($('#slides').width() == '940') {TopPos = '105px'}
			else {TopPos = '45px'}
		$(".caption").css({'top':TopPos});
	}
	
	$(function(){
		CaptionTop();
		$(".jCarouselLite").jCarouselLite({
			  btnNext: "#next",
			  btnPrev: "#prev",
			  speed: 300,		  
			  vertical: true,
			  circular: true,
			  visible: 2,
			  start: 0,
			  scroll: 1
		 });

		$('.close-button').click(
				function(){$(this).parents('#slides').find('.caption').css({'display':'none'})}
		);
	
	})
	
	
	$(window).resize(function(){
		CaptionTop();
	});
	
	</script>
         
          


<title>Vyjíždky na koních Vladimír Lorenc </title>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64905220-2', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body class="<?php if ($_GET) echo "no-";?>prvnistrana">
<?php

ZobrazMenu($spojeni);

$cmd=$_GET["cmd"];
//print_r($_GET);

  switch ($cmd)     {
    case "zobrazContent":
       zobrazTextMenu($spojeni);
    break;
    case "zobrazContentMenu":
       zobrazTextContentMenu($spojeni);
    break;    
    case "zobrazKone":
       zobrazKone($spojeni);
    break;
    case "zobrazKontakt":
       zobrazKontakt($spojeni);
    break;
    case "zobrazGalerie":
       zobrazGalerie($spojeni);
    break;
    
    case "zobrazContentMenu":
       zobrazContentMenu($spojeni);
    break;
    case "zobrazdum":
       zobrazObsahDomu($spojeni);
    break;
    case "zobrazkontakt" :
      ZobrazKontakt($spojeni);
    break;
    case "zobrazVzkazy" :
      ZobrazVzkazy($spojeni);
    break;
    
    default:
      ZobrazUvod($spojeni);
}

?>
<div id="strdole">
  <div class="strana">
  
  <div class="footpage"><p><strong>&nbsp;(c)Rekreační stáje Řídeč - www.koneridec.cz &nbsp;-&nbsp;výlety na koních,&nbsp;+420 604 307 804<span style="float:right"> Vyrobil:  Ctibor Venus - <a href="http://www.ctiborvenus.eu">www.ctiborvenus.eu</a></strong></span></p></div>
</div>
</div>
 

</body></html>