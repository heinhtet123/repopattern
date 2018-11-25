<?php 
/*
* @author hein htet
*/
namespace App\Repositories\TraitComponent;

trait BatchComponentTrait{
	
	/**
	* method name = monthsDiff
	* @param date startmonth
	* @param date endmonth
	* @return int months 
	*/
	public function monthsDiff($startmonth,$endmonth) {

	 	$startdate=strtotime($startmonth);
	 	$enddate=strtotime($endmonth);

	 	$startyear=date("Y",$startdate);
	 	$endyear=date("Y",$enddate);
	 	
	 	$startmonth=date("m",$startdate);
	 	$endmonth=date("m",$enddate);

	 	$diff = (($endyear - $startyear) * 12) + ($endmonth - $startmonth);
	 	return $diff;
	}



}