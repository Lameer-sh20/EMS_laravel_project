@extends('layouts.UserApp')
@section('content')

<div class="position-relative">
    <img src="{{ asset('uploads\img4.jpg') }}" class="img-fluid w-100" alt="No available image">
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
        <h1 class="display-4 ">All events around Saudi</h1>
        <p class="fs-4">Discover amazing events happening in your city</p>
    </div>
</div>

<div class="container py-5" id="browse_events">
    <section class="pb-4">
        <form action="{{ route('filter_events') }}" method="GET">
            <div class="input-group mb-3">
                <label for="city" class="me-3 fs-4 fw-semibold">What's in</label>
                <select class="form-select me-3" id="city" name="city">
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                    @endforeach
                </select>
                <label for="category" class="me-3 fs-4 fw-semibold">Looking for</label>
                <select class="form-select" id="category" name="category">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-secondary fw-semibold" type="submit">Filter</button>
                <button class="btn btn-outline-secondary fw-semibold" type="submit" name="reset" value='true'>Reset</button>
            </div>
        </form>
    </section>

    <section>
        <div class="row d-flex flex-row">
            @foreach($events as $event)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/' . $event->image) }}" class="card-img-top" alt="Image not available" height="150">
                    <div class="card-title pt-2 px-2 m-0">
                        <a href="{{route('event_details',['id'=>$event->id])}}" class="link-secondary link-underline link-underline-opacity-0 fs-5 fw-semibold">{{ $event->title }}</a>
                    </div>
                    <div class="card-body text-secondary">
                        <div class="row">
                            <div class="col">
                                <i class="bi bi-calendar-week me-2 fs-5"></i>
                                <span class="fs-6">{{ $event->start_date }}</span>
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
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="py-5 my-5" id="about">
        <div>
            <p class="fs-4 fw-semibold">About Us</p>
        </div>
        <div>
            <div class="row">
                <div class="col d-flex align-items-center">
                    <p class="fs-5 ">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                        <br>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis</p>
                </div>
                <div class="col">
                    <img src="{{ asset('uploads\img3.jpeg') }}" class="img-fluid w-100 rounded" alt="No available image">
                </div>
            </div>
        </div>
    </section>

</div>
@endsection