$(function() {
    
                var allPanels = $('.accordion > dd').hide();
                  
                $('.accordion > h3').click(function() {
                  allPanels.slideUp();
                  $(this).parent().next().slideDown();
                  return false;
                });
 
    $( ".accordion" ).accordion({ heightStyle: "content", active:false },{ collapsible: true },{animate: "bounceslide"},
                                {activate: function( event, ui )
                                    {$( ".accordion" ).on( "accordionactivate", function( event, ui ) {}
                                        )}
                                });
            });