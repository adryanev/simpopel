<?php 

/**
* 
*/
class Standard
{
	public $config;
	function __construct($config)
	{
		$this->config = $config;
	}

	function epag($perpage){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		else{
			$page = 1;
		}
		if($page <= 1){
			$halaman = 1;
		}else{
			$halaman = $page;
		}
		return ($halaman - 1) * $perpage . ", ".$perpage;
	}


}

