$(document).ready(function () {
  $(document).on('click', '.follow', function () {
    console.log('hello tout le monde follow me');
    var userId = $(this).data("userid");		
    var action = 'followUser';
    $.ajax({
    	url:'user_action.php',
    	method:"POST",
    	data:{userId:userId, action:action},
    	dataType:"json",
    	success:function(response){				
    		if(response.success == 1) {
    			$("#follow_"+userId).text("Following");
    			//$("#following").text(parseInt($("#following").text()) + 1);
    		}					
    	}
    });
  });


  $(document).on('click', '.unfollow', function () {
    console.log('hello tout le monde unfollow me');
    var userId = $(this).data("userid");		
    var action = 'unfollowUser';
    $.ajax({
    	url:'user_action.php',
    	method:"POST",
    	data:{userId:userId, action:action},
    	dataType:"json",
    	success:function(response){				
    		if(response.success == 1) {
    			$("#follow_"+userId).text("Following");
    			$("#following").text(parseInt($("#following").text()) + 1);
    		}					
    	}
    });
  });

});