



    var unloaded = false;
$(window).on('beforeunload', unload);
$(window).on('unload', unload);  
function unload(){      
    if(!unloaded){
        $('body').css('cursor','wait');
        $.ajax({
            type: 'post',
            async: false,
            url: 'log_out',
            success:function(){ 
                unloaded = true; 
                $('body').css('cursor','default');
            },
            timeout: 5000
        });
    }
}         




