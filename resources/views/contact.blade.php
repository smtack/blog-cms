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
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('failed'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('failed') }}
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
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
