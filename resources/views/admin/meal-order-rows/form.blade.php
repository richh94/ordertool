<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
    <label for="product_id" class="control-label">{{ 'Product Id' }}</label>
    <input class="form-control" name="product_id" type="number" id="product_id" value="{{ isset($mealorderrow->product_id) ? $mealorderrow->product_id : ''}}" required>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('meal_id') ? 'has-error' : ''}}">
    <label for="meal_id" class="control-label">{{ 'Meal Id' }}</label>
    <input class="form-control" name="meal_id" type="number" id="meal_id" value="{{ isset($mealorderrow->meal_id) ? $mealorderrow->meal_id : ''}}" required>
    {!! $errors->first('meal_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($mealorderrow->user_id) ? $mealorderrow->user_id : ''}}" required>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
