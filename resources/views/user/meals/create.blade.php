@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Create new meal</div>
            <div class="card-body">

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <p>Where are we going to get our food?</p>

                <form method="POST" action="{{ url('meal') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('user.meals.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
