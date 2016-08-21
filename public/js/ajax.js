	$(document).ready(function() {
    // process the form
    $('#btncadastrar').click(function(event) {
        // process the form
        $.ajax({
        	type        : 'POST', 
        	url         : $(".urlcadastro").val(), 
        	data: $('.formulariocadastro').serialize(),
        	success: function(data)
        	{
        		if (data.code != 200) {
        			$('#msgs').html("<div class='alert alert-danger'>"+data.msg+"</div>");
        		}else{
        			$('.formulariocadastro')[0].reset();
        			$('.modalcadastro').modal('hide');
        		}
           },error: function(msg){
                    console.log(msg);
            }
       });

        event.preventDefault();
    });


    

});