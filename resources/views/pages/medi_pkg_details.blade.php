@extends('layout')
@section('page_title', $package_details->title)
@section('page-contents')
<section class="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('storage/images/medical_packages/'.$package_details->images) }}" >
            </div>
            <div class="col-md-12">
                <div class="content">
                    <h4>{{ $package_details->title }}</h4>
                    <p>{!! $package_details->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection