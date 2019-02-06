<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Calculation;
class AjaxController extends Controller {
   public function index() {
    
    $formatted_from_date = new \Carbon\Carbon($_REQUEST['from_date']);

    $formatted_to_date =  new \Carbon\Carbon($_REQUEST['to_date']);

    $diff_in_days=$formatted_from_date->diffInDays($formatted_to_date);
    
    $msg = "<code>".$diff_in_days."</code> Day(s) diffrence between selected dates.";
    
    $is_leap = 0;

    if($formatted_from_date->isLeapYear()){
        $is_leap = 1;
        $msg .= "<br /><br /><small><i>Fact : Year selected for '<tt>From Date</tt>' is a Leap year.</i></small>";
    }
    if($formatted_to_date->isLeapYear()){
        $is_leap = 1;
        $msg .= "<br /><br /><small><i>Fact : Year selected for '<tt>To Date</tt>' is a Leap year.</i></small>";
    }

    $Calculations = new Calculation;

        $Calculations->from_date = $formatted_from_date;

        $Calculations->to_date = $formatted_to_date;

        $Calculations->is_leap = $is_leap;

        $Calculations->result_set = $msg;

        $Calculations->save();
  
    return response()->json(array('msg'=> $msg), 200);

   }
}