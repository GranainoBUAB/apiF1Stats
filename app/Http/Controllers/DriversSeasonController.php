<?php

namespace App\Http\Controllers;

use App\Models\DriversSeason;
use App\Models\Flag;
use App\Models\PositionOrder;
use Illuminate\Http\Request;

/**
 * Class DriversSeasonController
 * @package App\Http\Controllers
 */
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
        $driversSeasons = PositionOrder::positionOrder($driversSeasons);

        //smell code change with create new Drivers
        $flags = Flag::getAllFlags();
        foreach ($driversSeasons as $item) {
            foreach ($flags as $itemFlag) {
                if ($item->country === $itemFlag->country) {
                    $item->country = $itemFlag->flag;
                }
            }
        }

        return view('home', compact('driversSeasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driversSeason = new DriversSeason();
        return view('drivers-season.create', compact('driversSeason'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $driversSeason = DriversSeason::create($request->all());

        return redirect()->route('home')
            ->with('success', 'DriversSeason created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driversSeason = DriversSeason::find($id);

        return view('drivers_season.edit', compact('driversSeason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DriversSeason $driversSeason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $changesProduct = request()->except(['_token', '_method']);
        DriversSeason::where('id', '=', $id)->update($changesProduct);
        $driverSeason = DriversSeason::findOrFail($id);
        return redirect()->route('home')->with('success', 'Updated');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        DriversSeason::destroy($id);

        return redirect()->route('home')
            ->with('success', 'DriversSeason deleted successfully');
    }
}
