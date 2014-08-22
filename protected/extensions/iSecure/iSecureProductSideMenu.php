<?php
class iSecureProductSideMenu extends CWidget 

{

	public $CategoryID = 0;

    public function init() {
         } // public function init()

    // Your class name and php file should be same.
     public function run() {
     	
        $this->render('ProductSideMenu'); // In here put your Your Component File name.
    }

}
?>