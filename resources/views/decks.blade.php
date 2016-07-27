@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($decks as $deck)
    <?php $likes = collect($deck->likes)->pluck('user_id')->toArray(); ?>
    <div class="col-sm-4 animate-me slideInUp">
        <div class="card hovercard">
            <div class="cardheader">
                <a href="{{ url('like-deck/'.$deck->id) }}" class="edit">
                    @if (auth()->check() && in_array(auth()->user()->id, $likes))
                        <i class="ion-ios-heart"></i> 
                    @else
                       <i class="ion-ios-heart-outline"></i> 
                    @endif
                </a>
                <span class="likes-count">{{ count($likes) }}</span>
            </div>
            <div class="info">
                <div class="title">
                    <?php $id = \Hashids::encode($deck->id) ?>
                    <a target="_blank" href="{{ url('all-decks/'.$id) }}">{{ $deck->name }}</a>
                    <span class="display blue">{{ $id }}</span>
                </div>
                <p>
                    <a href="{{ url('user/'.$deck->user_id) }}">{{ $deck->user->name }}</a>
                </p>
            </div>
            <div class="cards-count text-center m-b-1">
                <span class="label label-success">
                    {{ collect($deck->cards)->count() }} Cards
                </span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection