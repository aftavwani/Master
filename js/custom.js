		$(document).ready(function(){
			$('.status_fld').change(function(){
				if($(this).val() != '' && $(this).val() == 'ForLease') {
					$('.proper-lfts').removeClass('hide');
				} else {
					$('.proper-lfts').addClass('hide');
				}
			});
		});


		$(document).ready(function(){
		$('.broker_opt').change(function(){
		  var broker_id = ($(".broker_opt").val());
				 if($(this).val() != '' && $(this).val() == 'yes') {
						$('#war').addClass('warning');	
					}
					else{
						$('#war').removeClass('warning');		
						}
				});                               
			});
		$(document).ready(function(){
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"30%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
function getstates(obj) {
	con = obj.val();
	$('.dd_geo_states').html('<option>-Select State-</option>');
	$.post(base_url+'/propertydetails/fetchstates', {con:con}).done(function(data){
	
		$('.dd_geo_states').html(data);
		
		
	});
}
function getcity(obj) {
	con = obj.val();
	$('.dd_geo_states').html('<option>-Select State-</option>');
	$.post(base_url+'/propertydetails/fetchstates', {con:con}).done(function(data){
	
		$('.dd_geo_states').html(data);
		
		
	});
}             
