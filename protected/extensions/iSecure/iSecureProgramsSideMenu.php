<?php
class iSecureProgramsSideMenu extends CWidget 

{

	public $ProgramID = 0;

    public function init() {
         } // public function init()

    // Your class name and php file should be same.
     public function run() {
     	
        $this->render('ProgramsSideMenu'); // In here put your Your Component File name.
    }

}
?>