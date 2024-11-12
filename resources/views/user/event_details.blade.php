@extends('layouts.UserApp')
@section('title', 'Event')
@section('content')
<!-- boooking modal -->
<div class="container py-5">
    <div class="modal fade" id="booking_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Book tickets</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="ticket_count" class="form-label">Number of Tickets</label>
                        <input type="number" id="ticket_count" class="form-control" value="0" min="0" max="5">
                    </div>
                    <p>Price per ticket: <span id="ticket_price">{{ $event->price }}</span> SAR</p>
                    <p>Total Price: <span id="total_price">0</span> SAR</p>
                    <input type="hidden" id="final_price" value="0">
                    <input type="hidden" id="event_id" value="{{ $event->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="bookTickets" onclick="bookingSubmit()">Book</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="row py-3">
                        <span class="fs-5 fw-semibold">{{$event->title}}</span>
                    </div>
                    <div class="row py-1">
                        <div class="col">
                            <i class="bi bi-calendar-week me-2 fs-5"></i>
                            <span class="fs-6">{{ $event->start_date }} - {{ $event->start_date }}</span>
                        </div>
                        <div class="col">
                            <i class="bi bi-stopwatch me-2 fs-5"></i>
                            <span class="fs-6">{{ $event->duration }} hours</span>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col">
                            <i class="bi bi-cash me-2 fs-5"></i>
                            <span class="fs-6">{{ $event->price }} SAR</span>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col">
                            <i class="bi bi-geo-fill me-2 fs-5"></i>
                            <span class="fs-6">{{ $event->city_name }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <img src="{{ asset('images/' . $event->image) }}" alt="no image available" class="img-fluid rounded">
                    </div>
                    <div class="row my-2">
                        <div class="col d-grid">
                            <button class="btn btn-outline-secondary" onclick="bookinghandler()">Book</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <p class="fs-5">{{ $event->description }}</p>
            </div>
        </div>
    </div>
    @endsection('content')