<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Http\Request;


class HotelController extends Controller
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
        $hotels = Hotel::all();
        return view('hotels.index', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('hotels.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = new Hotel;

        if ($request->file('hotel_photo')) {
            $photo = $request->file('hotel_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path() . '/images', $file);
            $hotel->image_path = asset('/images') . '/' . $file;
        }
        
        $hotel->title = $request->hotel;
        $hotel->duration = $request->duration;
        $hotel->country_id = $request->country;
        $hotel->price = $request->price;

        $hotel->save();
        return redirect()->route('hotels-index')->with('success', 'Hotel information successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(int $hotelId)
    {
        $hotel = Hotel::where('id', $hotelId)->first();
        return view('hotels.show', ['hotel' => $hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $countries = Country::all();
        return view('hotels.edit', ['hotels' => $hotel, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        if ($request->file('hotel_photo')) {

            $name = pathinfo($hotel->image_path, PATHINFO_FILENAME);
            $ext = pathinfo($hotel->image_path, PATHINFO_EXTENSION);

            $path = public_path('/images') . '/' . $name . '.' . $ext;
        
            if (file_exists($path)) {
                unlink($path);
            }
        
            $photo = $request->file('hotel_photo');

            $ext = $photo->getClientOriginalExtension();

            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            $photo->move(public_path() . '/images', $file);

            $hotel->image_path = asset('/images') . '/' . $file;

        }

        $hotel->title = $request->newTitle;
        $hotel->duration = $request->newDuration;
        $hotel->country_id = $request->newCountry;
        $hotel->price = $request->newPrice;
        
        $hotel->save();
        return redirect()->route('hotels-index')->with('infoUpdate', 'Hotels information have been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotels-index')->with('deleted', 'Hotels information successfully deleted.');
    }

    public function pick(Request $request)
    {

        $hotels = match($request->sort) {
            'hotels-asc' => Hotel::orderBy('price', 'asc')->get(),
            'hotels-desc' => Hotel::orderBy('price', 'desc')->get(),
            default => Hotel::all()
        };
        $countries = Country::all();
        
      
        return view('hotels.pick', ['hotels' => $hotels, 'countries' => $countries]);
    }
}
