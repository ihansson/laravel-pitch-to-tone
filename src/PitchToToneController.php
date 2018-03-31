<?php

namespace Ihansson\PitchToTone;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PitchToToneController extends Controller
{

	public const SEMI_TONE = 1.059463094359;

	public const A = 440;

	public const TONE_LETTERS = ['a','a#','b','c','c#','d','d#','e','f','f#','g','g#'];

	public const POSITIVE_MODIFIERS = ['#','s','+'];

	public const NEGATIVE_MODIFIERS = ['b','f','-'];

    public function toneFromPitch($pitch){
    	if(!is_numeric($pitch)){
    		return 'Not a number';
    	}

    	$number = round(log($pitch / 440, self::SEMI_TONE));

    	if($number > 0){
	    	while($number > 12){
	    		$number -= 12;
	    	}
	    } else {
	    	while($number < 0){
	    		$number += 12;
	    	}
	    }

    	return self::TONE_LETTERS[$number];
    }

    public function pitchFromTone($tone){

    	$firstLetter =  strtolower($tone[0]);
    	$modifier = 0;

    	$distanceFromA = array_search($firstLetter, self::TONE_LETTERS);

    	if(!$distanceFromA){
    		return 'Not a tone letter';
    	}

    	if(isset($tone[1])){
    		if(in_array($tone[1], self::POSITIVE_MODIFIERS)){
    			$modifier = 1;
    		} else if (in_array($tone[1], self::NEGATIVE_MODIFIERS)){
	    		$modifier = -1;
	    	}
    	}

    	$distanceFromA += $modifier;

    	return self::A * pow(self::SEMI_TONE, $distanceFromA);
    }

}
