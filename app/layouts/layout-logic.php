<?php
//-----------------------------
// FYI: klein > service > render always executes the template file first before
// executing the view. The view is actually executed by the template file via yieldView.
// That means this code here is always run before the view file. So the view files should
// always expect $this->Template to be an object.
if( is_array($this->Template) )
{ $this->Template = (object) $this->Template; }

//-----------------------------
// FYI: If you need to var_dump something either do it near HERE and follow it with exit
// or do it within the html or else you might not actually see it.

//-----------------------------
// Run yieldView first so that any 
// Klein\ServiceProvider level vars 
// that are set within an actual view file 
// can be used to modify the parent template
// (additional css, additional js, etc).
ob_get_contents();
$this->yieldView();
$bufferContent = ob_get_clean();

if( empty($this->Template->mainContent) ) 
	{ $mainContent = $bufferContent; }
else 
	{ $mainContent = $this->Template->mainContent; }

if( empty( $mainContent ) )
{
	trigger_error("Template Error: No \"main content\" value found in buffer content or Template->mainContent. 
	Might your view file be empty or not setting the mainContent template variable? View file path: \"$this->view\". This warning was generated "
	, E_USER_WARNING);
}
