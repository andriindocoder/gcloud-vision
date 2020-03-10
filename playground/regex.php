<?php 	
	$string = 'Personal Loan KAD PENGENA IVALA HAIN SASTA MyKad wykad 940205-10-5675 S2 KERATA YSIA RAJAANSALA STAR AKERALAANMASI A L AANMALAYSAKER NORARIFIN BIN SELAMAT ARERA BARAN AAN WA K EREAALS SIAKERAJAAN KERAJA MALAYSIA JANMALAY AY BLOK U-2-23 PANGSAPURI BAIDURI BANDAR TASIK KESUMA 43700 BERANANG SELANGOR WARGANEGARA ISLAM LELAKI';
	// $string = 'abcefghijklmnopqrs';
	// preg_match_all("/\d{6}-\d{2}-\d{4}/", $string, $matches);
	// foreach($matches[0] as $value) {
	// 	$ICnumber = $value;
	// }
	// echo $ICnumber;


	// $word = "ISLAM";

	// if(strpos(strtolower($string), strtolower($word)) !== false){
	//     echo "YES";
	// } else{
	//     echo "NO";
	// }

	$maleName = " BIN ";

	if(strpos(strtolower($string), strtolower($maleName)) !== false){
	    // echo "YES";
	    $pieces = explode(" ", $string);
	    $ind = '';
	    foreach($pieces as $key => $value) {
	    	if(strtolower($value) == 'bin'){
	    		$ind = $key;
	    		break;
	    	}
	    }
	    $name = $pieces[$key-1] . " " .$pieces[$key]. " ". $pieces[$key+1];
	    echo $name;
	} else{
	    echo "NO";
	}

?>