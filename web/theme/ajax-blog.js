$(document).ready(function() {
	
	/*============================================
	Load Post
	==============================================*/
	$('.ajax-blog .read-more').click(function(e){
		e.preventDefault();
		
		var $this = $(this),
			postLink = $(this).attr('href');
		
		if($this.is('.loading')){
			return false;
		}
		
		$this.animate({opacity:0},200,function(){
			$this.addClass('loading').text('Loading');
			$this.animate({opacity:1},200);
		});
		
		$.get(postLink, function(data){
		
			var postContent = $(data).find('.post-content, .post-footer'),
				$thePost = 	$this.parents('.col-sm-10');
			
			$thePost.append('<div class="ajax-content" style="display:none;"></div>');
			$thePost.find('.ajax-content').html(postContent);
			$thePost.find('.ajax-content .post-excerpt, .ajax-content .posts-nav').remove();
			
			var shareTitle = $thePost.find(".social-media").data('title') ? $thePost.find(".social-media").data('title') : $thePost.find('.post-title').text();
			
			$thePost.find('.social-media').socialLikes({
				counters: false,
				title: shareTitle,
				url: postLink
			});
			
			setTimeout(function(){
				$thePost.find('.ajax-content').slideDown(500);
				
				$thePost.parents('.post').addClass('loaded');
				$this.parents('footer').animate({'height':0,'opacity':0},500,function(){$(this).remove()});
			},500);
		
		});
		
	});
	
});	