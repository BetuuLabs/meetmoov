@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create an event</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('account.events.store') }}" method="post">
                                @method('post')
                                @csrf

                                <div class="form-group">
                                    <label for="name">Event name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="name">About your event</label>
                                    <textarea type="text" class="form-control" name="about"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Location</label>
                                    <input type="text" class="form-control" name="location">
                                </div>
                                <div class="form-group">
                                    <label for="name">Event date</label>
                                    <input type="datetime-local" class="form-control" name="start_at">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary float-right">Post event</button>
                                </div>


                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
