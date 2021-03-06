@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4 text-center">{{$episodes['series']->title}}  <a href="{{route('seriesFollow',$episodes['series']->seriesID)}}" class="btn btn-warning">@if(!$episodes['isSeriesFollowed']) Follow @else unfollow @endif</a><p style="font-size: 10px">Show time {{$episodes['series']->showTime}}</p></h1>


        <div class="row">
            @foreach($episodes['episodes'] AS $episode)
                <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="{{route('episodeDetails',array($episodes['series']->seriesID,$episode->episodeID))}}"><img class="card-img-top" src="/{{$episode->thumbnail}}" onerror='this.src="http://placehold.it/700x400"' alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{route('episodeDetails',array($episodes['series']->seriesID,$episode->episodeID))}}">{{$episode->title}}</a>
                            </h4>
                            <p class="card-text">{{$episode->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $episodes->render() !!}
     <!-- /.row -->



    </div>
    <!-- /.container -->

@endsection
