<?php
// Start the session
/* session_start();
require_once('inc/inc.php');
require_once('inc/define.php');
require_once('inc/fcts.php'); */
?>

&copy; &nbsp; LRDS 2017-<?php echo date ( Y );?>


  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/stgx/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/stgx/jquery-ui.min.js"></script>


<script src="<?php echo base_url() ?>assets/js/stgx/split-pane.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/stgx/global_fcts.js"  type="text/javascript"></script>







<script>

var spl_true = split_pane_js(true);



  function resize_layout_content_left(){
      console.log('test left');
  }


  function resize_layout_content_right(){
      console.log('test right');
  }

  function my_todo_open(){
      console.log('test ctrl t');
  }



$(document).ready(function(){

	$('#left').hide('');
	$('#top').hide('');
	$('#close-pg').hide();

	$('#bt-st').removeClass();


	//$('#menu-bin-right-component').load('menu_bin.php');


	$('#left-component').load('<?php echo base_url() ?>assets/_storygraph/cytoscape.php');
	$('#right-component').addClass('btn_assets_bin_active');




	var url = 'sequences_bin.php';
	$("#iframe-right-component").attr("src", url);




// ################################################################   menu_bin.php

    function removeClass_btn_active_menuBin_doublon() { // ds menu_bin.php  todo
        $('#btn_menu_sequences_bin').removeClass('btn_bin_active');
        $('#btn_menu_cases_bin').removeClass('btn_bin_active');
        $('#btn_menu_medias_bin').removeClass('btn_bin_active');
    }





	function stg_bg_Node_img(id=false){
		var project = '<?php echo $_SESSION["PROJECT"];?>';
		
				$.ajax({
			       url: "/<?php echo $_SESSION["NAME_FOLDER_APP"];?>/cases_get_bg.php",
				   type : 'GET',
				   async: false,
			       // data: { variable: 'value' }, 
			       dataType : 'json', // On désire recevoir du HTML
			       success : 	function(data, statut){
						       		// console.log('--- success ---');
						       		// console.log(data);
						       		// console.log('-----------');
									for (var i in data) {
						                // console.log(i);
						                // console.log(data[i]);
						                if(id!=false){ i=id;}
						                var bg_img = data[i];
						                
						                // console.log(project);
						                var url = '__projects/'+project+'/cases/case_'+i+'/thumbs/'+bg_img;
						                // cy.$('#'+i).css({"background-image": url, "background-fit": "cover"});
						                // cy.$('#15').css({"backgroundColor": "red", "color": "red"});
						                // cy.$('#15').hide();

									}
					},

				   error : 		function(resultat, statut, erreur){
							   		console.log('----- error ------');
									console.log(resultat);
									console.log(statut);
									console.log(erreur);
									console.log('-----------');
				   },

				   complete : 	function(resultat, statut){
									// console.log('complete');
				   }

				});




		
	}  




$('.stg_bg_Node_img_refresh').click(function() {
  // add_event('shot');
  console.log('stg_bg_Node_img_refresh test');
});







// When all loaded
$(window).load(function() {


//  setTimeout( function(){
//    cy.fit();
   // }, 1000 );

   $('#left-component').show();
   $('#loading').hide();


 $( '#fit,fitM').click (); // todo better
 //console.log('END');



//    // SPLIT PANE RESIZE              
   // function split_pane_js($close){

//    var w = $(document).width();
//    var r = (w/100)*15;
//    console.log(r);

//    // init size
//    $('div.split-pane').splitPane('lastComponentSize', 0);

//      if($close==true){
//        $('div.split-pane').splitPane('lastComponentSize', 0);
//      }

//        $('div.split-pane').splitPane();

//        $('button:first').on('click', function() {
//          $('div.split-pane').splitPane('lastComponentSize', 10);
//        });

//        $('button:last').on('click', function() {
//          $('div.split-pane').splitPane('firstComponentSize', 0);
//        });

   // }




   });


















});






</script>

