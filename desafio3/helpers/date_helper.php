<?php
Class DateHelper
{
	public function format($date){
		$date = DateTime::createFromFormat('Y-m-d', $date);
		return  $date->format('d/m/Y');
	}
}
?>