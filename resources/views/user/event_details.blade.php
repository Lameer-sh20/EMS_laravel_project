@extends('layouts.UserApp')
@section('content')

<div class="container py-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="row py-3">
                        <span class="fs-5 fw-semibold">{{$event->title}}</span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i class="bi bi-calendar-week me-2 fs-5"></i>
                            <span class="fs-6">{{ $event->start_date }} - {{ $event->start_date }}</span>
                        </div>
                        <div class="col">
                            <i class="bi bi-stopwatch me-2 fs-5"></i>
                            <span class="fs-6">{{ $event->duration }} hours</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i class="bi bi-cash me-2 fs-5"></i>
                            <span class="fs-6">{{ $event->price }} SAR</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i class="bi bi-geo-fill me-2 fs-5"></i>
                            <span class="fs-6">{{ $event->city_name }}</span>
                        </div>
                        <div class="row py-3">
                            <p class="fs-5 fw-semibold">{{ $event->description }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-4">
                    <div class="row">
                        <img src="{{ asset('images/' . $event->image) }}" alt="no image available" class="img-fluid rounded">
                    </div>
                    <div class="row my-2">
                        <div class="col d-grid">
                            <button class="btn btn-outline-secondary">Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection('content')