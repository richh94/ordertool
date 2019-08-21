<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
    <select name="product_id" class="form-control" id="product_id" required>
        @foreach ($products as $product)
            <option value="{{ $product->id }}" {{ (isset($productoption->required) && $productoption->required == $product->id) ? 'selected' : ''}}>{{ $product->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" required value="{{ isset($productoption->name) ? $productoption->name : ''}}" />
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('required') ? 'has-error' : ''}}">
    <label for="required" class="control-label">{{ 'Required' }}</label>
    <select name="required" class="form-control" id="required" required>
    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($productoption->required) && $productoption->required == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
    </select>
    {!! $errors->first('required', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('can_select_multiple') ? 'has-error' : ''}}">
    <label for="can_select_multiple" class="control-label">{{ 'Can Select Multiple' }}</label>
    <select name="can_select_multiple" class="form-control" id="can_select_multiple" required>
    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($productoption->can_select_multiple) && $productoption->can_select_multiple == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
    </select>
    {!! $errors->first('can_select_multiple', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
