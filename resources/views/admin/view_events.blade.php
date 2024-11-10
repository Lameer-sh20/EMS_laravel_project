@extends('layouts.AdminApp')
@section('title', 'Available Events')

@section('content')<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-danger">
                Delete record <strong>permanently?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="deleteConfirmation()">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="container py-5 table-responsive-sm">
    <div class="div pb-4">
        <h2 class="">Events</h2>
    </div>
    <table class="table table-hover ">
        <thead>
            <tr class="table-secondary">
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>City</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>No. Tickets</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td><img src="{{ asset('images/' . $event->image) }}" alt="image not available" class="rounded" width="120" height="80"></td>
                <td><a href="{{route('edit_event',['id'=>$event->id])}}">{{$event->title}}</a></td>
                <td>{{$event->category_name}}</td>
                <td>{{$event->city_name}}</td>
                <td>{{$event->start_date}}</td>
                <td>{{$event->end_date}}</td>
                <td>{{$event->n_tickets}}</td>
                <td><a href="{{route('edit_event',['id'=>$event->id])}}"><i class="bi bi-pen"></i></a></td>
                <td><a href="#" onclick="deleteMsg({{$event->id}})"><i class="bi bi-trash3 text-success"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('content')