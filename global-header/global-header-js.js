/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function($){
    
    $(document).ready(function(){
        $('.navbar-toggler').on('click', function(){
            $($(this).data('target')).toggleClass('in');
        });
        
        $('#headerSearchCTA').on('click', function(){
            $($(this).data('target')).toggle();
        });
        
        
    });
    
})(jQuery);

