<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav sidebar-list" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/users') }}">
                        Users
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/restaurants') }}">
                        Restaurants
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/products') }}">
                        Products
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/product-options') }}">
                        Product options
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/product-sub-options') }}">
                        Product sub options
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/meals') }}">
                        Meals
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
