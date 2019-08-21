<div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : ''}}">
    <label for="restaurant_id" class="control-label">{{ 'Restaurant' }}</label>
    <select name="restaurant_id" class="form-control" id="restaurant_id" required>
        @foreach ($restaurants as $restaurant)
            <option value="{{ $restaurant->id }}" {{ (isset($product->required) && $product->required == $optionKey) ? 'selected' : ''}}>{{ $restaurant->name }}</option>
        @endforeach
    </select>

    {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input type="text" class="form-control"name="name" id="name" required value="{{ isset($product->name) ? $product->name : ''}}"/>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
