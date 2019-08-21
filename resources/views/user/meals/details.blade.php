@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Order details for {{ $meal->restaurant->name }} at {{ date('d-m-Y', strtotime($meal->date)) }}</div>
                <div class="card-body">

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="alert alert-{{ $meal->is_open ? 'success' : 'danger' }}" role="alert">
                        State: {{ $meal->is_open ? 'open' : 'closed' }}
                    </div>

                    <div class="card">
                        <div class="card-header">Ordered products</div>
                        <div class="card-body">
                            @forelse ($orderRows as $orderRow)
                                <div class="order">
                                    <p><span class="bold">{{ $orderRow->product->name }}</span> (for {{ $orderRow->user->name }})</p>
                                    <div class="product-details">
                                        <ul>
                                            @foreach($orderRow->order_row_sub_options as $subOption)
                                                <li>
                                                    {{ $subOption->product_sub_option->product_option->name }}: {{ $subOption->product_sub_option->name }}
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            @empty
                                <p>No orders yet...</p>
                            @endforelse
                        </div>
                    </div>

                    @if ($meal->is_open)
                    <form method="POST" action="{{ url('meal/'.$meal->id.'/close/') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <button class="btn btn-success close-order-btn"><i class="fa fa-check"></i> Close meal</button>
                    </form>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
