@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">MealOrderRow {{ $mealorderrow->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/meal-order-rows') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/meal-order-rows/' . $mealorderrow->id . '/edit') }}" title="Edit MealOrderRow"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/mealorderrows' . '/' . $mealorderrow->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete MealOrderRow" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $mealorderrow->id }}</td>
                                    </tr>
                                    <tr><th> Product Id </th><td> {{ $mealorderrow->product_id }} </td></tr><tr><th> Meal Id </th><td> {{ $mealorderrow->meal_id }} </td></tr><tr><th> User Id </th><td> {{ $mealorderrow->user_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
