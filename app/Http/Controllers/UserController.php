<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cities;
use App\Models\categories;
use App\Models\events;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $cities = cities::All();
        $categories = categories::All();
        $event_details = DB::table('events')
            ->join('cities', 'city_id', '=', 'cities.id')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('events.*', 'cities.city_name', 'categories.category_name')
            ->get();
        return view('user.index', ['events' => $event_details, 'cities' => $cities, 'categories' => $categories]);
    }

    public function filter_events(Request $request)
    {
        $cities = cities::all();
        $categories = categories::all();

        $query = DB::table('events')
            ->join('cities', 'events.city_id', '=', 'cities.id')
            ->join('categories', 'events.category_id', '=', 'categories.id')
            ->select('events.*', 'cities.city_name', 'categories.category_name');
            
        if (isset($request->reset)) {
            return redirect()->route('index');
        }
        if ($request->filled('city')) {
            $query->where('events.city_id', $request->city);
        }

        if ($request->filled('category')) {
            $query->where('events.category_id', $request->category);
        }

        $filteredEvents = $query->get();

        return view('user.index', ['events' => $filteredEvents, 'cities' => $cities, 'categories' => $categories]);
    }

    public function event_details(Request $request)
    {
        $event_details = DB::table('events')
            ->join('cities', 'city_id', '=', 'cities.id')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('events.*', 'cities.city_name', 'categories.category_name')
            ->get();
            $event = $event_details->where('id', $request->id)->first();
        return view('user.event_details',['event' => $event]);
    }
}
