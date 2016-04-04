$(function(){
	$("#navHandle").on("click",function(){
		$(".container nav").slideToggle();
	});


	// ajax@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	$(".nav-type").on("click",function(e){
		e.preventDefault();

		var url = $(this).attr('href');

		History.pushState(null,null,url);
	});

// '.pagination a' makes the pagination to work even on reloading the new page
	$(".main.group").on("click",'.pagination a',function(e){
		e.preventDefault();

		var url = $(this).attr('href');

		History.pushState(null,null,url);
	});

	History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
        var state = History.getState(); // Note: We are using History.getState() instead of event.state
    	var spinner =new Spinner().spin();
		$('.main.group').append(spinner.el);

		$.get(state.url,function(res){

			$('.main.group').empty().append(res);
			// console.log(res);
		});
		});
    	


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ spinner
		// var spinner =new Spinner().spin();
		// $('.main.group').append(spinner.el);

		// $.get(url,function(res){

		// 	$('.main.group').empty().append(res);
		// 	// console.log(res);
		// });

	// editables@@@@@@@@@@@@@@@@@@@@
	// i=count
	// el=element
	// _method is called emulate
	$('[data-editable]').each(function(i,el){
		var url = $(el).data("url");
		var options={
			type:"textarea",
			cssclass:"editable",
			submit:"OK",
			submitdata:{
				_method:"PUT",
				_token:$('#token').text(),
				column:$(el).data("editable")
			}
		};
		$(el).editable(url,options);
	});

	//WYSIWYG

	
	$(document).on("DOMNodeInserted",function(e){
		if($(e.target).hasClass('editable')){
			tinymce.editors=[];//removing existing references
			tinymce.init({selector:'textarea'});
		}
	});
	
});
