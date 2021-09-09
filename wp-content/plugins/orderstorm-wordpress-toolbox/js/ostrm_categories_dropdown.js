jQuery
(
	function ()
	{
		jQuery("#" + categoriesDropdownGlobals.id).change
		(
			function (event)
			{
				var	selectedValue = jQuery(event.target).val();
				
				if (selectedValue > 0)
				{
					location.href = categoriesDropdownGlobals.home_url + "/?cat=" + selectedValue;
				}
			}	
		);
	}
);
