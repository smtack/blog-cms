@extends('layouts.layout')

@section('content')

<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Contact Us</h1>
        </div>
    </div>
</header>

<div class="container mb-4">
    <div class="row">
        @if(Session::has('message'))
            <p class="text-primary">{{ Session::get('message') }}</p>
        @endif

        @if ($errors->any())
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="col-lg-12">
            <form action="{{ route('mail') }}" method="POST">
                @csrf

                <div class="form-group my-4">
                    <label class="mb-2" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Smith" required>
                </div>
                <div class="form-group my-4">
                    <label class="mb-2" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="johnsmith@example.com" required>
                </div>
                <div class="form-group my-4">
                    <label class="mb-2" for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Message Subject" required>
                </div>
                <div class="form-group my-4">
                    <label class="mb-2" for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>

@endsection