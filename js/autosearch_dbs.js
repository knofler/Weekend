            jQuery(document).ready(function(){
                
            //jQuery auto Single Line
            
		    //$('#searchform').autocomplete({source:'search_assist.php', minLength:2});
                    
            //jQuery Auto Grouped
            
                $.widget('custom.groupedSearch', $.ui.autocomplete,
            {
            _renderMenu: function(ul, items)
            {
		var currentCategory = "";
		$.each( items, $.proxy(function(index, item)
		{
			// evaluate the category and render an LI tag
			if (item.category != currentCategory)
			{
				ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
				currentCategory = item.category;
			}
 
			// render the item (this returns the LI DOMNode instance)
			var li = this._renderItem(ul, item);
		}, this));
                }
            });
                    $('#loc_auto').groupedSearch({source : 'location_autosearch.php' ,minLength : 2});
		    
		});
        
        