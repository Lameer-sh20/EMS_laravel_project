@extends('layouts.AdminApp')
@section('title', 'Edit Event')

@section('content')
<div class="container py-5">
    <div class="div pb-4">
        <h2> Add New Event
        </h2>
    </div>
    @if(session('message'))
    <h6 class="alert alert-success">
        {{ session('message') }}
    </h6>
    @endif
    <div class="card w-max">
        <div class="card-body">
            <form action="{{route('update_event',['id'=>$event->id])}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="event_title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="event_title" id="event_title" value="{{$event->title}}">
                        @error('event_title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="event_org" class="form-label">Organizer</label>
                        <input type="text" class="form-control" name="event_org" id="event_org" value="{{$event->organizer}}">
                        @error('event_org')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="event_category" class="form-label">Category</label>
                        <select class="form-select" name="event_category" id="event_category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{$category->id == $event->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('event_category')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="event_city" class="form-label">City</label>
                        <select class="form-select" name="event_city" id="event_city">
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ $city->id == $event->city_id ? 'selected' : '' }}>
                                {{ $city->city_name }}
                            </option>
                            @endforeach
                        </select>
                        @error('event_city')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="start_date" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" value="{{$event->start_date}}">
                        @error('start_date')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date" id="end_date" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" value="{{$event->end_date}}">
                        @error('end_date')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="event_duration" class="form-label">Duration</label>
                        <input type="number" class="form-control" name="event_duration" id="event_duration" value="{{$event->duration}}">
                        @error('event_duration')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="event_tickets" class="form-label">No. Tickets</label>
                        <input type="number" class="form-control" name="event_tickets" id="event_tickets" value="{{$event->n_tickets}}">
                        @error('event_tickets')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="ticket_price" class="form-label">Price</label>
                        <input type="double" class="form-control" name="ticket_price" id="ticket_price" value="{{$event->price}}">
                        @error('ticket_price')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="event_desc" class="form-label">Description</label>
                        <input type="text" class="form-control" name="event_desc" id="event_desc" value="{{$event->description}}">
                        @error('event_desc')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for="event_image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="event_image" id="event_image">
                                @error('event_image')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <img src="{{ asset('images/' . $event->image) }}" alt="image not available" class="rounded" height="100" width="100">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row py-2">
            <div class="col d-grid gap-2 col-4 mx-auto">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection('content')