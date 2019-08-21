<div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : ''}}">
    <label for="restaurant_id" class="control-label">{{ 'Restaurant Id' }}</label>
    <input class="form-control" name="restaurant_id" type="number" id="restaurant_id" value="{{ isset($meal->restaurant_id) ? $meal->restaurant_id : ''}}" required>
    {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="datetime-local" id="date" value="{{ isset($meal->date) ? $meal->date : ''}}" required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_open') ? 'has-error' : ''}}">
    <label for="is_open" class="control-label">{{ 'Is Open' }}</label>
    <select name="is_open" class="form-control" id="is_open" required>
    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($meal->is_open) && $meal->is_open == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('is_open', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
