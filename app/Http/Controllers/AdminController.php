<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cities;
use App\Models\categories;
use App\Models\events;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function new_event()
    {
        $cities = cities::All();
        $categories = categories::All();
        return view('admin.add_event', ['cities' => $cities, 'categories' => $categories]);
    }

    public function add_event(Request $request)
    {

        $validatedData = $request->validate(
            [
                'event_title' => 'required',
                'event_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'start_date' => 'required',
                'end_date' => 'required',
                'event_duration' => 'required',
                'event_desc' => 'required',
                'event_tickets' => 'required',
                'ticket_price' => 'required',
                'event_org' => 'required',
                'event_city' => 'required',
                'event_category' => 'required',
            ]
        );

        if ($request->hasFile('event_image')) {
            // Generate a unique file name
            $fileName = time() . $request->file('event_image')->getClientOriginalName();
            // Move the uploaded file to the public/images directory
            $request->file('event_image')->move(public_path('images'), $fileName);
            // Save the product with the file name
            $validatedData['event_image'] = $fileName;
        }
        events::create([
            'title' => $validatedData['event_title'],
            'image' => $validatedData['event_image'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'duration' => $validatedData['event_duration'],
            'description' => $validatedData['event_desc'],
            'n_tickets' => $validatedData['event_tickets'],
            'price' => $validatedData['ticket_price'],
            'organizer' => $validatedData['event_org'],
            'city_id' => $validatedData['event_city'],
            'category_id' => $validatedData['event_category'],
        ]);
        return redirect()->route('new_event')->with('message', "Event added successfully");
    }


    public function view_events()
    {
        $event_details = DB::table('events')
            ->join('cities', 'city_id', '=', 'cities.id')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('events.*', 'cities.city_name', 'categories.category_name')
            ->get();
        return view('admin.view_events', ['events' => $event_details]);
    }

    public function edit_event()
    {
        $cities = cities::All();
        $categories = categories::All();
        $event = DB::table('events')
            ->join('cities', 'city_id', '=', 'cities.id')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('events.*', 'cities.city_name', 'categories.category_name')
            ->where('events.id', $_GET['id'])
            ->first();
        return view('admin.edit_event', ['event' => $event, 'cities' => $cities, 'categories' => $categories]);
    }

    public function update_event(Request $request, $id)
    {

        $request->validate(
            [
                'event_title' => 'required',
                'event_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'start_date' => 'required',
                'end_date' => 'required',
                'event_duration' => 'required',
                'event_desc' => 'required',
                'event_tickets' => 'required',
                'ticket_price' => 'required',
                'event_org' => 'required',
                'event_city' => 'required',
                'event_category' => 'required',
            ]
        );
        $validatedData = $request->all();
        //dd($request);
        $event = events::find($id);
        if ($request->hasFile('event_image')) {
            //delete old image
            $oldimg = public_path('images') . $event->image;
            if (File::exists($oldimg)) {
                File::delete($oldimg);
            }
            // Generate a unique file name
            $fileName = time() . $request->file('event_image')->getClientOriginalName();
            // Move the uploaded file to the public/images directory
            $request->file('event_image')->move(public_path('images'), $fileName);
            // Save the product with the file name
            $validatedData['event_image'] = $fileName;
        };
        DB::table('events')
            ->where('id', $id)
            ->update([
                'title' => $validatedData['event_title'],
                'image' => $validatedData['event_image'],
                'start_date' => $validatedData['start_date'],
                'end_date' => $validatedData['end_date'],
                'duration' => $validatedData['event_duration'],
                'description' => $validatedData['event_desc'],
                'n_tickets' => $validatedData['event_tickets'],
                'price' => $validatedData['ticket_price'],
                'organizer' => $validatedData['event_org'],
                'city_id' => $validatedData['event_city'],
                'category_id' => $validatedData['event_category'],
            ]);

        return redirect()->route('view_events')->with('message', "Event added successfully");
    }

    public function delete_event()
    {
        $id = $_GET['id'];
        $event = events::find($id);
        $event->delete();
        return redirect()->route('view_events');
    }
}
