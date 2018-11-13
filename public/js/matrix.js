
$(document).ready(function(){

	  var now = new Date();
		var today = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
		$('.todaydatePicker').datepicker({dateFormat: 'yy-mm-dd'}).val();
		
		
	
	// === Sidebar navigation === //
	
	$('.submenu > a').click(function(e)
	{
		e.preventDefault();
		var submenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var submenus = $('#sidebar li.submenu ul');
		var submenus_parents = $('#sidebar li.submenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenu.slideUp();
			} else {
				submenu.fadeOut(250);
			}
			li.removeClass('open');
		} else 
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenus.slideUp();			
				submenu.slideDown();
			} else {
				submenus.fadeOut(250);			
				submenu.fadeIn(250);
			}
			submenus_parents.removeClass('open');		
			li.addClass('open');	
		}
	});
	
	var ul = $('#sidebar > ul');
	
	$('#sidebar > a').click(function(e)
	{
		e.preventDefault();
		var sidebar = $('#sidebar');
		if(sidebar.hasClass('open'))
		{
			sidebar.removeClass('open');
			ul.slideUp(250);
		} else 
		{
			sidebar.addClass('open');
			ul.slideDown(250);
		}
	});
	
	// === Resize window related === //
	$(window).resize(function()
	{
		if($(window).width() > 479)
		{
			ul.css({'display':'block'});	
			$('#content-header .btn-group').css({width:'auto'});		
		}
		if($(window).width() < 479)
		{
			ul.css({'display':'none'});
			fix_position();
		}
		if($(window).width() > 768)
		{
			$('#user-nav > ul').css({width:'auto',margin:'0'});
            $('#content-header .btn-group').css({width:'auto'});
		}
	});
	
	if($(window).width() < 468)
	{
		ul.css({'display':'none'});
		fix_position();
	}
	
	if($(window).width() > 479)
	{
	   $('#content-header .btn-group').css({width:'auto'});
		ul.css({'display':'block'});
	}
	
	// === Tooltips === //
	$('.tip').tooltip();	
	$('.tip-left').tooltip({ placement: 'left' });	
	$('.tip-right').tooltip({ placement: 'right' });	
	$('.tip-top').tooltip({ placement: 'top' });	
	$('.tip-bottom').tooltip({ placement: 'bottom' });	
	
	
	
	// === Fixes the position of buttons group in content header and top user navigation === //
	function fix_position()
	{
		var uwidth = $('#user-nav > ul').width();
		$('#user-nav > ul').css({width:uwidth,'margin-left':'-' + uwidth / 2 + 'px'});
        
        var cwidth = $('#content-header .btn-group').width();
        $('#content-header .btn-group').css({width:cwidth,'margin-left':'-' + uwidth / 2 + 'px'});
	}
	
	// === Style switcher === //
	$('#style-switcher i').click(function()
	{
		if($(this).hasClass('open'))
		{
			$(this).parent().animate({marginRight:'-=190'});
			$(this).removeClass('open');
		} else 
		{
			$(this).parent().animate({marginRight:'+=190'});
			$(this).addClass('open');
		}
		$(this).toggleClass('icon-arrow-left');
		$(this).toggleClass('icon-arrow-right');
	});
	
	$('#style-switcher a').click(function()
	{
		var style = $(this).attr('href').replace('#','');
		$('.skin-color').attr('href','css/maruti.'+style+'.css');
		$(this).siblings('a').css({'border-color':'transparent'});
		$(this).css({'border-color':'#aaaaaa'});
	});
	
	$('.lightbox_trigger').click(function(e) {
		
		e.preventDefault();
		
		var image_href = $(this).attr("href");
		
		if ($('#lightbox').length > 0) {
			
			$('#imgbox').html('<img src="' + image_href + '" /><p><i class="icon-remove icon-white"></i></p>');
		   	
			$('#lightbox').slideDown(500);
		}
		
		else { 
			var lightbox = 
			'<div id="lightbox" style="display:none;">' +
				'<div id="imgbox"><img src="' + image_href +'" />' + 
					'<p><i class="icon-remove icon-white"></i></p>' +
				'</div>' +	
			'</div>';
				
			$('body').append(lightbox);
			$('#lightbox').slideDown(500);
		}


		
	});

	
	
	$('#roomChange').change(function(){
		$.ajaxSetup({
			headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		  });
		
		var rid = $('#roomChange').val();
		
		$.ajax({
			url:'getSeat',
			type: 'GET',
			data: {rid: rid},
			dataType:'json',
			success: function(response){
				if(response.success == true){
					$('#seat').css("display","block");
					$('#seat').html(response.html);
				}		
			},
			error: function (xhr, b, c) {
				console.log("xhr=" + xhr + " b=" + b + " c=" + c);
			}
		});
	});

	$('#UserChange').change(function(){
		$.ajaxSetup({
			headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		  });
		var cid = $('#UserChange').val()
		$.ajax({
				url:'getUserDetails',
				type:'GET',
				dataType:'json',
				data:{cid:cid},
				success:function(response){
					console.log(response);
					
					if(response.success == true){
						$('#getRentDeails').css("display","block");
						$('#getRentDeails').html(response.html);
					}	
				},
				error:function(xhr,b,c){
					console.log("xhr=" + xhr + " b=" + b + " c=" + c);
				}
		});
	});

	$('#amountPaid').change(function(){
		var amtpaid = $('#amountPaid').val();
		var amtpayable = $('#payableAmount').val();
		
		var bal = amtpayable - amtpaid;
	
		if(amtpayable > 0 ){
		var view = '<div class="control-group"> <label class="control-label">Balance</label> <div class="controls">  <input type="text" name="balance" value='+ bal +' readonly> </div></div>';
		
		$('#getBalance').append(view);
		}
		else{
			alert('Payable Amount less Then Zero. You Do not have permission for rent');
			$('#submitbtn').hide();
		}
	});

	$('#paymode').change(function(){
		var paymode = $('#paymode').val();
		var view = '<div class="control-group"> <label class="control-label">Transaction ID/Comment</label> <div class="controls">  <input type="text" name="cmnt"  required> </div></div>';
		if(paymode !== "Cash"){
			$('#cmnt').append(view);
		}

	});

	$('#customerSelect').change(function(){
		var cid = $('#customerSelect').val();
		$.ajaxSetup({
			headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		  });
		$.ajax({
				url:'getRentStatement',
				type:'GET',
				dataType:'json',
				data:{cid:cid},
				success:function(response){
					if(response.success == true){
						$('#rentdata').css("display","block");
						$('#rentdata').html(response.html);
					}	
				},
				error:function(xhr,b,c){
					console.log("xhr=" + xhr + " b=" + b + " c=" + c);
				}
		});
	});
		

	
});

