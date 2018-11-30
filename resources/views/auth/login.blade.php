@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7"></div>
        <div class="col-md-5 auth">
            <div class="auth-header">
                <h1 class="h4">Welcome :)</h1>
                <p class="text-muted">To keep connected with us login with your personal information</p>
            </div>
            <login></login>
            <div class="auth-footer">
                <h6 class="text-muted">You can join with</h6>
                <div class="social-btn">
                    <a class="btn gg"><i class="icon ion-logo-google"></i></a>
                    <a class="btn fb"><i class="icon ion-logo-facebook"></i></a>
                    <a class="btn twt"><i class="icon ion-logo-twitter"></i></a>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
