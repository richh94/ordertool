<div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : ''}}">
    <label for="restaurant_id" class="control-label">{{ 'Restaurant' }}</label>
    <select name="restaurant_id" class="form-control" id="restaurant_id" required>
        @foreach ($restaurants as $restaurant)
            <option value="{{ $restaurant->id }}" {{ (isset($meal->required) && $meal->required == $optionKey) ? 'selected' : ''}}>{{ $restaurant->name }}</option>
        @endforeach
    </select>

    {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Start' }}">
</div>
