	// Style switcher cookie check (only for live-preview)
	if($.cookie("css")) {
		var path = $.cookie("css");
		$("link").each(function(){
			var href = path+$(this).attr("href").match(/\w+\.css/gi); 
			$(this).attr("href",href);
		});
	}

$(document).ready(function(){
	
	//jQuery Style switcher (only for live-preview)
	$("#skin a").click(function() {
		$.cookie("css", $(this).attr('rel'));
		document.location.reload(true);
		return false;
	});
	
	
    //check if javascript are enabled
    $("body").removeClass("noJs");
    
    //Dropdown menu
    $("#nav li").hover(function(){
        $(this).children("ul").stop(true, true).fadeIn(300);        
    }, function(){
        $(this).children("ul").stop(true, true).fadeOut(200);
    });	
	
	//Autofill input field
	$("input[type=text], textarea").each(function(){
	    $(this).val($(this).siblings("label[for="+$(this).attr('id')+"]").text());
	}).focus(function(){
	    if($(this).val() == $(this).siblings("label[for="+$(this).attr('id')+"]").text())
	        $(this).val("");
	}).blur(function(){
	     if($(this).val() == "")
	    $(this).val($(this).siblings("label[for="+$(this).attr('id')+"]").text());
	});
	
	
	//Adjust heights in homepage columns
	$.fn.adjustHeight = function(){
		this.each(function(){
			var height = $(this).outerHeight(),
				innerHeight = $(this).height(),
				margin = height-innerHeight,
				containerHeight = $(this).parent("div").innerHeight();
			$(this).height(containerHeight-margin);
		});
	};
	if(!$('#twitter_box').length){$(".oneOfThree, .twoOfThree").adjustHeight();}
	
	

	
	
	//---------------------------
	//Ajax Contact Form
	//---------------------------	
    
	$("#contact_form").submit(function(){
	    
	    var ContactForm = $(this),
	        loader = $("#loader"),
	        result = $("#result");
	        
	    loader.fadeIn();
	    result.hide();
	    
	    ContactForm.find(".required").each(function(){
	        var id = $(this).attr("id");
	        if($(this).hasClass("email")){
	            $(this).validateEmail();
	        }else{
	            //Must contain at least 3 characters and must be different from the default value
	            $(this).validateLength(3, $(this).siblings("label[for="+id+"]").text());
	        }
	    });
	    
	    //If there are no errors, send the email
	    if(ContactForm.find(".error").length === 0){
	        var array = ContactForm.serializeArray(),
	            URL = ContactForm.attr("action");
			$.ajax({
				type: 'post',
				url: URL,
				data: array,
				success: function(results) {
					loader.fadeOut(function() {
						if(results == "email sent!") {
							result.html("<span class='success'>The e-Mail has been sent correctly!</span>").fadeIn();
							ContactForm.find("input[type=text], textarea").each(function(){
							    $(this).val($(this).siblings("label[for="+$(this).attr('name')+"]").text());
	                        });
						}
						else 
							result.html("<span class='fail'>Some errors occurred. Try again, please.</span>").fadeIn();
					});
				}
			});
	    }   
	    loader.fadeOut();     
        return false;    
    });

    //Content length validation
    $.fn.validateLength = function(l, defaultValue){
        if(this.val().length < l || this.val() == defaultValue) {
            this.addClass('error');
        } else {
            this.removeClass('error');
        }
    };

	//email validation
	$.fn.validateEmail = function(){
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		if(filter.test(this.val())){
			this.removeClass("error");
		}else{
			this.addClass("error");
		}
	}	
	
});


$(window).load(function(){
	//Twitter widget functions
	if($('#twitter_box').length){
		var yourTwitterUsername = "ThemeForest"; //Insert your twitter username
		 $.ajax({
			url : "http://twitter.com/statuses/user_timeline/"+yourTwitterUsername+".json?callback=?",
			dataType : "json",
			timeout: 15000,
			
			success : function(data){
				var list = $("<ul class='tweet_list'>");
				for (i=0; i<4; i++){
					list.append("<li>" + data[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url){
								return '<a href="'+url+'" target="_blank">'+url+'</a>'}) + "</li>");
                }
				$("#twitter_box").html(list);
				$(".oneOfThree, .twoOfThree").adjustHeight();
			},
		
			error : function(){
				$("#twitter_box").html("There was an error connecting to Twitter");
				$(".oneOfThree, .twoOfThree").adjustHeight();
			}
		
		});
	};
});