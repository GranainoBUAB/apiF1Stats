<?php

namespace App\Http\Controllers;

use App\Models\DriversSeason;
use App\Models\Flag;
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

        $position = 0;
        foreach ($driversSeasons as $item) {
            $position += 1;
            $item->position = $position;
        }

        $flags = Flag::getAllFlags();
        foreach ($driversSeasons as $item) {
            foreach ($flags as $itemFlag) {
                if ($item->country === $itemFlag->country){
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

        $categoryMains = CategoryMain::all();
        $categorySecondaries = CategorySecondary::all();
        return view('create', compact('categoryMains', 'categorySecondaries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DriversSeason::$rules);

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
        $driversSeason = DriversSeason::find($id);

        return view('drivers-season.show', compact('driversSeason'));
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
        $driversSeason = DriversSeason::find($id)->delete();

        return redirect()->route('drivers-seasons.index')
            ->with('success', 'DriversSeason deleted successfully');
    }
}
