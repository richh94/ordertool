<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Meal;
use App\MealOrderRow;
use App\OrderRowSubOption;
use App\Product;
use App\ProductOption;
use App\ProductSubOption;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('user.meals.create', ['restaurants' => $restaurants]);
    }

    public function details($id)
    {
        $meal = Meal::findOrFail($id);
        $orderRows = MealOrderRow::where('meal_id', $id)->with('order_row_sub_options')->orderBy('product_id', 'asc')->get();

        return view('user.meals.details', ['meal' => $meal, 'orderRows' => $orderRows]);
    }

    public function order($meal_id)
    {
        $meal = Meal::find($meal_id);
        $products = Product::where('restaurant_id', $meal->restaurant->id)->get();
        $productOptions = ProductOption::all();         // todo pre-filter
        $productSubOptions = ProductSubOption::all();   // todo pre-filter
        $orderRows = MealOrderRow::where('user_id', Auth::user()->id)->where('meal_id', $meal_id)->with('order_row_sub_options')->get();

        return view('user.meals.order',
            [
                'meal' => $meal,
                'products' => $products,
                'productOptions' => $productOptions,
                'productSubOptions' => $productSubOptions,
                'orderRows' => $orderRows
            ]);
    }

    public function close($meal_id)
    {
        $meal = Meal::find($meal_id);
        $meal->is_open = false;
        $meal->save();
        return redirect('meal/'.$meal_id.'/details');
    }

    public function placeOrder(Request $request, $meal_id)
    {

        if (Meal::find($meal_id) == null) {
            return redirect('home');
        }

        $this->validate($request, [
            'product' => 'required',
        ]);
        $requestData = $request->all();

        $orderRow = new MealOrderRow;
        $orderRow->product_id = $requestData['product'];
        $orderRow->meal_id = $meal_id;
        $orderRow->user_id = Auth::user()->id;
        $orderRow->save();

        foreach ($requestData["productOption"] as $productOption) {
            if (is_array($productOption)) { // loop multi-select option
                foreach ($productOption as $checkboxProductOption) {
                    $row = new OrderRowSubOption;
                    $row->meal_order_row_id = $orderRow->id;
                    $row->product_sub_option_id = $checkboxProductOption;
                    $row->save();
                }
            } else {
                $row = new OrderRowSubOption;
                $row->meal_order_row_id = $orderRow->id;
                $row->product_sub_option_id = $productOption;
                $row->save();
            }
        }

        return redirect('meal/'.$meal_id.'/order');
    }

    public function removeProduct(Request $request, $meal_id, $row_id)
    {
        OrderRowSubOption::where('meal_order_row_id', $row_id)->delete();
        MealOrderRow::find($row_id)->delete();

        return redirect('meal/'.$meal_id.'/order');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'restaurant_id' => 'required',
        ]);
        $today = date('Y-m-d H:i:s');

        $meal = new Meal;
        $meal->restaurant_id = $request->restaurant_id;
        $meal->is_open = true;
        $meal->date = $today;
        $meal->user_id = Auth::user()->id;
        $meal->save();

        return redirect('home')->with('flash_message', 'Meal added! Please know what you want to eat yourself.');
    }

}
