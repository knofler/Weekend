//Function to make sure onclick remove button alert with warrning before deleting user association from apps.

	$(function() {
            
    $("#dialog-confirm").dialog({ autoOpen: false })
    .find("a.cancel")
    .click(function(e){
        e.preventDefault();
    $("#dialog-confirm").dialog("close");
    });
    
    
    $(".slideremove[href]:not(#dialog-confirm .slideremove)").click(function(e) {
        e.preventDefault();
        $("#dialog-confirm").dialog("option", "title", $(this).text()).dialog("open").find("a.ok").attr({href: this.href, target: this.target});
    });
});