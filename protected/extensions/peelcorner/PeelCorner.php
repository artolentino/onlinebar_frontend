<?php 
/**
 * PeelCorner - Flip corner advertisement widget
 * based on http://www.marcofolio.net/webdesign/create_a_peeling_corner_on_your_website.html
 * 
 */
/**
 * Copyright (c) 2012 David Soyez
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *  
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *  
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * 
 *
 * @author David Soyez <david.soyez@yiiframework.fr>
 * @link http://www.yiiframework.com/extension
 * @copyright Copyright &copy; 2012 yiiframework.fr
 * @license http://www.opensource.org/licenses/mit-license.php
 * @version 0.1
 * @package PeelCorner
 * @since 0.1
 */
 class PeelCorner extends CWidget
{
	protected static $_used;
	
	public $url;
	public $small_image;
	public $small_width = '100';
	public $small_height = '100';

	public $big_image;
	public $big_width = '650';
	public $big_height = '650';
		
	protected $small_path;
	protected $big_path;	
	protected $small_params;
	protected $big_params;	
	
	/**
	 * Initializes Peel widget
	 */
	public function init()
	{
		// single use
		if(self::$_used == NULL)
			$this->registerScript();
			
		self::$_used = TRUE;
	}

	/**
	 * Register Peel javascript file
	 */
	protected function registerScript() 
	{
		$path = Yii::app()->extensionPath. DIRECTORY_SEPARATOR.'peelcorner'.DIRECTORY_SEPARATOR.'assets';
		$aUrl = Yii::app()->getAssetManager()->publish($path);

		Yii::app()->clientScript->registerScriptFile($aUrl.'/peel.js');
		
		$this->url 				= ($this->url);
		
		$this->small_path 		= $aUrl.'/small.swf';		
		if($this->small_image == NULL)
			$this->small_image		= ($aUrl.'/small.jpg');
		$this->small_params		= 'ico=' . $this->small_image;
		
		$this->big_path			= $aUrl.'/large.swf';
		if($this->big_image == NULL)
			$this->big_image		= ($aUrl.'/large.jpg');
		$this->big_params		= 'big=' . $this->big_image . '&ad_url=' . $this->url;			
		
		$js  = "jaaspeel.ad_url = ".CJavaScript::encode($this->url) . ";\n";
		$js .= "jaaspeel.small_path = ".CJavaScript::encode($this->small_path) . ";\n";
		$js .= "jaaspeel.small_image = ".CJavaScript::encode($this->small_image) . ";\n";
		$js .= "jaaspeel.small_width = ".CJavaScript::encode($this->small_width) . ";\n";
		$js .= "jaaspeel.small_height = ".CJavaScript::encode($this->small_height) . ";\n";
		$js .= "jaaspeel.small_params = ".CJavaScript::encode($this->small_params) . ";\n";
		$js .= "jaaspeel.big_path = ".CJavaScript::encode($this->big_path) . ";\n";
		$js .= "jaaspeel.big_image = ".CJavaScript::encode($this->big_image) . ";\n";
		$js .= "jaaspeel.big_width = ".CJavaScript::encode($this->big_width) . ";\n";
		$js .= "jaaspeel.big_height = ".CJavaScript::encode($this->big_height) . ";\n";
		$js .= "jaaspeel.big_params = ".CJavaScript::encode($this->big_params) . ";\n";
		
		$js .= "jaaspeel.putObjects();";
		
		Yii::app()->clientScript->registerScript(__CLASS__, $js, CClientScript::POS_HEAD);
	}

}