@extends('layouts.app')
@section('header')
    <header class="header header-inverse bg-fixed" style="background-image: url({{asset('assets/img/bg-stars.jpg')}})" data-overlay="8">
        <div class="container text-center">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">

                    <h1>Companies</h1>
                    <p>An application for viewing companies and rating them.</p>
                </div>
            </div>

        </div>
    </header>
    <!-- END Header -->

@endsection

@section('content')
    <div class="container mb-50" >
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
