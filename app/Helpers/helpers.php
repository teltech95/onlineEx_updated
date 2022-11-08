<?php

  

use Carbon\Carbon;

  

/**

 * Write code on Method

 *

 * @return response()

 */

if (! function_exists('convertYmdToMdy')) {

    function convertYmdToMdy($date)

    {

        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');

    }

}

  

/**

 * Write code on Method

 *

 * @return response()

 */


function category($catid)

{
    $cat_data = DB::table('category')->where('id', $catid)->first();

    return $cat_data->name;

}

function tt_votes($comp_id)

{
    $vote_results = DB::table('vote')->where('comp_id', 1)->sum('vote');

    return $vote_results;

}

function company($catid)

{
    $com = DB::table('company')->where('id', $catid)->first();

    return $com->name;

}