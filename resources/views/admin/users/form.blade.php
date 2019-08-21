<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" required value="{{ isset($user->name) ? $user->name : ''}}" />
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('required') ? 'has-error' : ''}}">
    <label for="is_admin" class="control-label">{{ 'Administrator rights' }}</label>
    <select name="is_admin" class="form-control" id="is_admin" required>
        @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($user->is_admin) && $user->is_admin == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
