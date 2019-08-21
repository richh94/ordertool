@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Place your order!</div>
            <div class="card-body">

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <p>We're going to order at <span class="bold">{{ $meal->restaurant->name }}</span>.</p>

                <div class="card-wrapper">
                    <div class="card">
                        <div class="card-header">Ordered products</div>
                        <div class="card-body">

                            <div class="accordion" id="orderList">
                            @forelse ($orderRows as $orderRow)


                                    <div class="order-row">
                                        <div class="product-name" id="collapsable-{{$orderRow->id}}">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$orderRow->id}}" aria-expanded="true" aria-controls="collapse-{{$orderRow->id}}">
                                                {{ $orderRow->product->name }}
                                            </button>
                                        </div>

                                        <div id="collapse-{{$orderRow->id}}" class="collapse" aria-labelledby="collapsable-{{$orderRow->id}}" data-parent="#orderList">
                                            <div class="product-details">
                                                <ul>
                                                @foreach($orderRow->order_row_sub_options as $subOption)
                                                    <li>
                                                        {{ $subOption->product_sub_option->product_option->name }}: {{ $subOption->product_sub_option->name }}
                                                    </li>
                                                @endforeach
                                                </ul>
                                                <form method="POST" action="{{ url('meal/'.$meal->id.'/removeProduct/'.$orderRow->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger" type="submit"><i class="fa fa-close"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                            @empty
                                <p>No orders yet...</p>
                            @endforelse
                        </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Add product</div>
                        <div class="card-body">

                            <form method="POST" action="{{ url('meal/'.$meal->id.'/placeOrder') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="product" class="control-label">{{ 'Product' }}</label>
                                    <select name="product" class="form-control" id="product" onchange="onProductChange()" required>
                                        <option disabled selected>Please select...</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="productOptions">

                                    @foreach ($productOptions as $option)
                                        <div class="form-group productOption option-productId-{{ $option->product_id }} hidden">
                                            <label for="productSubOption" class="control-label">{{ $option->name }}</label>

                                            @if ($option->can_select_multiple)

                                                <div name="productSubOption">
                                                    @foreach ($productSubOptions as $subOption)
                                                        @if ($subOption->product_option_id == $option->id)
                                                            {{--todo: if required make sure at least one is checked--}}
                                                            <div class="form-check">
                                                                <input class="form-check-input formOption selector-{{ $option->product_id }}"
                                                                       name="productOption[{{ $option->id }}][{{ $loop->iteration }}]"
                                                                       type="checkbox" value="{{ $subOption->id }}"
                                                                       id="checkbox-option-{{ $option->id }}-suboption-{{ $subOption->id }}"
                                                                       disabled>
                                                                <label class="form-check-label" for="checkbox-option-{{ $option->id }}-suboption-{{ $subOption->id }}">{{ $subOption->name }}</label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>

                                            @else

                                                <select name="productOption[{{ $option->id }}]" class="form-control formOption selector-{{ $option->product_id }}" disabled>
                                                    @foreach ($productSubOptions as $subOption)
                                                        @if ($subOption->product_option_id == $option->id)
                                                            <option value="{{ $subOption->id }}">{{ $subOption->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            @endif
                                        </div>
                                    @endforeach

                                </div>

                                <div class="form-group">
                                    <button id="add-button" class="btn btn-primary hidden" type="submit">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    function onProductChange() {
        var el = document.getElementById("product");
        var value = el.options[el.selectedIndex].value;

        var selectors = document.getElementsByClassName('productOption');
        for (var i = 0; i < selectors.length; ++i) {
            if (selectors[i].classList.contains('option-productId-' + value)) {
                selectors[i].classList.remove('hidden');
            } else {
                selectors[i].className += ' hidden';
            }
        }

        var selectors = document.getElementsByClassName('formOption');
        for (var i = 0; i < selectors.length; ++i) {
            if (selectors[i].classList.contains('selector-' + value)) {
                selectors[i].removeAttribute("disabled");
            } else {
                selectors[i].disabled = true;
            }
            console.log(selectors[i]);
        }

        var btn = document.getElementById("add-button");
        btn.classList.remove('hidden');

    }
@endsection
