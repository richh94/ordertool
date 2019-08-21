<div class="form-group {{ $errors->has('product_option_id') ? 'has-error' : ''}}">
    <label for="product_option_id" class="control-label">{{ 'Product Option Id' }}</label>
{{--    <input class="form-control" name="product_option_id" type="number" id="product_option_id" value="{{ isset($productsuboption->product_option_id) ? $productsuboption->product_option_id : ''}}" >--}}
    <select name="product_option_id" class="form-control" id="product_option_id" required>
        @foreach ($productoptions as $productoption)
            <option value="{{ $productoption->id }}" {{ (isset($productsuboption->required) && $productsuboption->required == $optionKey) ? 'selected' : ''}}>{{ $productoption->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('product_option_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" required value="{{ isset($productsuboption->name) ? $productsuboption->name : ''}}"/>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
