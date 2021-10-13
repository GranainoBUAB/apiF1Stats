<?php

namespace App\Http\Controllers\Api;

use App\Models\Flag;
use Illuminate\Http\Request;
use App\Models\DriversSeason;
use App\Http\Controllers\Controller;

class DriversSeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driversSeasons = DriversSeason::orderBy('points', 'desc')->get();

        $driversSeasons = DriversSeason::positionOrder($driversSeasons);

        //smell code change with create new Drivers
        $flags = Flag::getAllFlags();
        foreach ($driversSeasons as $item) {
            foreach ($flags as $itemFlag) {
                if ($item->country === $itemFlag->country){
                    $item->country = $itemFlag->flag;
                }
            }
        }
        return response()->json($driversSeasons, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
