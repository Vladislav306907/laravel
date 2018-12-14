<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	}
    	return $result;
    }
}
