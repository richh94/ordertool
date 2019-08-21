@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="lead">Ordertool is the best way to order a meal with all your colleagues!</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="stretch">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="open-meals-tab" data-toggle="tab" href="#open-meals" role="tab" aria-controls="open-meals" aria-selected="true">Currently open</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="closed-meals-tab" data-toggle="tab" href="#closed-meals" role="tab" aria-controls="closed-meals" aria-selected="false">Closed meals</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="open-meals" role="tabpanel" aria-labelledby="home-tab">

                <div class="order-wrapper">
                    @forelse ($openMeals as $meal)
                        <div class="card">
                            <h5 class="card-header">Meal</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{ $meal->restaurant->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ date('d-m-Y', strtotime($meal->date)) }}</h6>
                                <p class="card-text">Click the button below to tell what you want to eat!</p>
                                <div class="button-wrapper">
                                    <a href="{{ url('meal/'.$meal->id.'/order') }}" class="btn btn-primary">Order now &raquo;</a>
                                    @if (Auth::user()->id == $meal->user_id)
                                        <a href="{{ url('meal/'.$meal->id.'/details') }}" class="btn btn-warning">Order details</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        @if (Auth::user()->is_admin)
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text text-center">Hungry?</p>
                                    <a href="{{ url('/meal/create') }}" class="btn btn-success">Start new meal</a>
                                </div>
                            </div>
                        @else
                            <p>There are no open meals, and you don't have the rights to start one.</p>
                        @endif
                    @endforelse
                </div>

            </div>
            <div class="tab-pane fade" id="closed-meals" role="tabpanel" aria-labelledby="profile-tab">

                <div class="order-wrapper">
                    @forelse ($closedMeals as $meal)
                        <div class="card">
                            <h5 class="card-header">Meal</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{ $meal->restaurant->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ date('d-m-Y', strtotime($meal->date)) }}</h6>
                                @if (Auth::user()->id == $meal->user_id)
                                    <a href="{{ url('meal/'.$meal->id.'/details') }}" class="btn btn-warning">Order details</a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p>No history found...</p>
                    @endforelse
                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="stretch spacing-line"></div>
    </div>


</div>
@endsection
