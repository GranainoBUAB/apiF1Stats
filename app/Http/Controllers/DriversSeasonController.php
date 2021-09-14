<?php

namespace App\Http\Controllers;

use App\Models\DriversSeason;
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
        $driversSeasons = DriversSeason::orderBy('points','desc')->get();
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
        request()->validate(DriversSeason::$rules);

        $driversSeason = DriversSeason::create($request->all());

        return redirect()->route('drivers-seasons.index')
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

        return view('drivers-season.edit', compact('driversSeason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DriversSeason $driversSeason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriversSeason $driversSeason)
    {
        request()->validate(DriversSeason::$rules);

        $driversSeason->update($request->all());

        return redirect()->route('drivers-seasons.index')
            ->with('success', 'DriversSeason updated successfully');
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
