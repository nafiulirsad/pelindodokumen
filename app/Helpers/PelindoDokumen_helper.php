<?php	
	function showDate($date){       
	    setlocale(LC_TIME, 'id_ID');
	    if(!empty($date)){
	        $time = strtotime($date);
            $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
	        $date_new = $formatter->format($time);
	        return $date_new;
	    }else{
	        return '-';
	    }
	}
?>