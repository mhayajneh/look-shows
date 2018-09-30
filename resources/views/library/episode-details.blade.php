@extends('layouts.app')
@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">

            <!-- Title -->
            <h1 class="mt-4">{{$episode->title}}      <a class="btn btn-primary" href="{{route('episodeLike',$episode->episodeID)}}">@if(!$episode->isLiked) Like @else Unlike @endif</a> </h1>




            <!-- Date/Time -->
            <p>Added on {{$episode->created_at}}</p>

            <hr>

            <!-- Preview video -->
            <video width="400" controls>
                <source src="/{{$episode->thumbnail}}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <hr>

            <!-- Video Content -->
            <p class="lead my-5">{{$episode->description}}</p>




        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


    @endsection
