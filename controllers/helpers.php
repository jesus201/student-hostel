<?php 

function prettyDate($date){

	return date("M d, Y", strtotime($date));

}


function date_time($date_time){  //date_time is date time of validation

	$date_time_now = date("Y-m-d H:i:s"); //todays date
	$start_date = new DateTime($date_time);
	$end_date = new DateTime($date_time_now);

	$interval= $start_date -> diff($end_date);

	if ($interval -> y >= 1) {   //from one year and above
		  if($interval == 1)
		  		$time_message = $interval -> y. "year ago";
		  	else
		  		$time_message = $interval -> y. "years ago";
	}

//months
	elseif ($interval -> m >= 1 ) {
       

     
		if ($interval -> d ==0) {
			 $days = " ago";
		}elseif ($interval ->d == 1) {
			 $days = $interval ->d . " day ago";
		}else {
			$days = $interval ->d . " days ago";
		}

		


	
		if ($interval ->m ==1) {
			 $time_message = $interval ->m ." month ". $days;
		}else{
			$time_message = $interval ->m ." months ". $days;
		}

		
		   
	}

	//days

	elseif ($interval ->d >= 1) {
		  if ($interval ->d == 1) {
		  	    $time_message = $interval ->d ." Yesterday";
		  }else{
		  	    $time_message = $interval ->d ." days ago";
		  }
	}



	//hours
	elseif ($interval -> h >= 1) {
		  if ($interval -> h == 1 ) {
		  	   $time_message = $interval ->h ." hour ago";
		  }else{
		  	$time_message = $interval ->h ." hours ago";
		  }
	}


	//minutes
	elseif ($interval ->i >=1) {
		  if ($interval ->i == 1 ) {
		  	   $time_message = $interval ->i ." minute ago";
		  }else{
		  	$time_message = $interval ->i ." minutes ago";
		  }
	}else{
		 if ($interval ->s < 30 ) {
		  	   $time_message = "Just now";
		  }else{
		  	$time_message = $interval ->s ." seconds ago";
		  }
	}





return $time_message;


}





?>