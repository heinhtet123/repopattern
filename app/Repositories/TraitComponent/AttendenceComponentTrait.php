<?php
/*
* @author hein htet
*/
namespace App\Repositories\TraitComponent;

trait AttendenceComponentTrait{

	function generate_times_bymonth($year,$month){
		return $year."/".$month;
	}

	
}