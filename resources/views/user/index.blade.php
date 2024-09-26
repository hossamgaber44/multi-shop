@extends('user.layouts.userLayout')
@section('content')
    <!-- Carousel Start -->
    @include('user.homeSections.Carousel')
    <!-- Carousel End -->


    <!-- Featured Start -->
    @include('user.homeSections.Featured')
    <!-- Featured End -->


    <!-- Categories Start -->
    @include('user.homeSections.Categories')
    <!-- Categories End -->


    <!-- Featured products Start -->
    @include('user.homeSections.FeaturedProducts')
    <!-- Products End -->


    <!-- Offer Start -->
    @include('user.homeSections.Offer')
    <!-- Offer End -->


    <!-- Recent Products Start -->
    @include('user.homeSections.RecentProducts')
    <!-- Products End -->


    <!-- Vendor Start -->
    @include('user.homeSections.Vendor')
    <!-- Vendor End -->
@endsection
