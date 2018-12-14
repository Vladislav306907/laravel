<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TranslationEvent;

class GraphController extends Controller
{
	function index(){
		return view('graph');
	}
    function get(Request $request){
    	$result = [
    		'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      		'datasets' => array([
		        'label' => 'GitHub Commits',
		        'backgroundColor' => '#f87979',
		        'data' => [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
		      ])
    	];
    	if($request->has('label')){
    		$result['labels'][] = $request->input('label');
    		$result['datasets'][0]['data'][] = (integer)$request->input('sale');

    		if($request->has('realtime')){
    			if($request->input('realtime') == true){
    				event(new TranslationEvent($result));
    			}
    		}
    	}
    	return $result;
    }
}
