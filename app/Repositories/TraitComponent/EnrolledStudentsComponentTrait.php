<?php 

namespace App\Repositories\TraitComponent;
use Carbon\Carbon;
trait EnrolledStudentsComponentTrait{


	function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}

	function generate_endmonth($start_month)
	{
		return $start_month;
	}
	
	
	function generate_timetable_date($start_month,$end_month,$type,$format=0)
	{

		$days=array();
		$count=0;
		if($type=="months")
		{
			$interval="1 day";
		}else
		{
			$interval="1 day";
		}


		$start = \DateTime::createFromFormat('d/m/Y', $start_month);
		 // $start->modify('first day of this month');
		
		$end = \DateTime::createFromFormat('d/m/Y', $end_month);
		$end->modify('first day of next month');
		
		$interval = \DateInterval::createFromDateString($interval);
		$period   = new \DatePeriod($start, $interval, $end);

		foreach ($period as $dt) {
		    $day_num=$dt->format("N");

		   
			    if($type=="Weekend"){
			    	if($day_num>5){
			    		
			    		if($format==0){
			    			$days[$count++]=$dt->format('Y-m-d');	
			    		}else if($format==1){
			    			$days[$count++]=$dt->format('d/m/y');
			    		}
			    		
			    	}
			    }else if($type=="Weekday")
			    {
			    	if($day_num<6){

			    		if($format==0){
			    			$days[$count++]=$dt->format('Y-m-d');	
			    		}else if($format==1){
			    			$days[$count++]=$dt->format('d/m/y');
			    		}

			    	}
			    }else if($type=="months"){
			    	$days[$count++]=$dt->format('F Y');
			    }
			
		    
		}
		
		
		
		if($type=="months")
		{
			$days=array_unique($days);
			$days = array_combine(range(1, count($days)), array_values($days));
			// for ($i=0; $i < count($days); $i++) { 
			// 	# code...
			// 	for ($j=0; $j < count($days); $j++) { 
			// 		# code...
			// 		if($i!=$j && $days[$i]==$days[$j])
			// 		{
					
			// 			unset($days[$j]);
						
			// 		}
			// 	}
			// }

		}


		return $days;
		exit();
	}
	


}