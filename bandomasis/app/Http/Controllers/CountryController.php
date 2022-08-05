<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;


class CountryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = match($request->sort) {
            'countries-asc' => Country::orderBy('title', 'asc')->get(),
            'countries-desc' => Country::orderBy('title', 'desc')->get(),
            default => Country::all()
        };
        return view('countries.index', ['countries' => $country]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'seasonStart' => 'required',
            'seasonEnd' => 'required'
        ]);

        $country = new Country;

        $country->title = $request->country;
        $country->seasonStart = $request->seasonStart;
        $country->seasonEnd = $request->seasonEnd;

        $country->save();
        return redirect()->route('countries-index')->with('success', 'Country successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(int $countryId)
    {
        $country = Country::where('id', $countryId)->first();
        return view('countries.show', ['countries' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $country->title = $request->newTitle;
        $country->seasonStart = $request->newSeasonStart;
        $country->seasonEnd = $request->newSeasonEnd;
        $country->save();
        return redirect()->route('countries-index')->with('infoUpdate', 'Countries information have been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries-index')->with('deleted', 'Countries information successfully deleted.');
    }
}
