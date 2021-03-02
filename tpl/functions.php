<?php
	
	function pre($arg)
	{
		echo "<pre>";
		print_r($arg);
		echo "</pre>";
	}
	function filterInput($data){
		$data = str_replace(['/', "\\", "`", "'", '"'], "", $data);
		$data = htmlspecialchars($data);
		return $data;
	  }
?>