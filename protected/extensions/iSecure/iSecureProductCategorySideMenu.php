<?php
class iSecureProductCategorySideMenu extends CWidget 

{

	public $ProductCategoryID = 0;

    public function init() {
         } // public function init()

    // Your class name and php file should be same.
     public function run() {
     	
        $this->render('ProductCategorySideMenu'); // In here put your Your Component File name.
    }

}
?>
