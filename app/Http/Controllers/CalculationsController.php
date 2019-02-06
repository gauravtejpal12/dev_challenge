<?php 
namespace App\Http\Controllers;

use App\Calculations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalculationsController extends Controller
{
    /**
     * Create a new flight instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $Calculations = new Calculations;

        $Calculations->from_date = $request->from_date;

        $Calculations->to_date = $request->to_date;

        $Calculations->is_leap = $request->is_leap;

        $Calculations->result_set = $request->result_set;

        $Calculations->save();
    }
}