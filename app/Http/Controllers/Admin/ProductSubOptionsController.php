<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductOption;
use App\ProductSubOption;
use Illuminate\Http\Request;

class ProductSubOptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $productsuboptions = ProductSubOption::where('product_option_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $productsuboptions = ProductSubOption::latest()->paginate($perPage);
        }

        return view('admin.product-sub-options.index', compact('productsuboptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $productOptions = ProductOption::all();
        return view('admin.product-sub-options.create', ['productoptions' => $productOptions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:64'
		]);
        $requestData = $request->all();

        ProductSubOption::create($requestData);

        return redirect('admin/product-sub-options')->with('flash_message', 'ProductSubOption added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productsuboption = ProductSubOption::findOrFail($id);

        return view('admin.product-sub-options.show', compact('productsuboption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productsuboption = ProductSubOption::findOrFail($id);
        $productOptions = ProductOption::all();

        return view('admin.product-sub-options.edit', ['productsuboption' => $productsuboption, 'productoptions' => $productOptions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required|max:64'
		]);
        $requestData = $request->all();

        $productsuboption = ProductSubOption::findOrFail($id);
        $productsuboption->update($requestData);

        return redirect('admin/product-sub-options')->with('flash_message', 'ProductSubOption updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        ProductSubOption::destroy($id);

        return redirect('admin/product-sub-options')->with('flash_message', 'ProductSubOption deleted!');
    }
}
