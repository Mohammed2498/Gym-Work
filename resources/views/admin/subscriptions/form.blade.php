
<input type="hidden" name="subscriber_id" value="{{ $subscriber_id }}">
@error('subscriber_id')
<div class="alert alert-danger">
    {{ $message }}
</div>
@enderror
<div class="form-group">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" class="form-control">
    @error('start_date')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" class="form-control">
    @error('end_date')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select name="status" id="status" class="form-control">
        <option value="expired">Expired</option>
        <option value="active" selected>Active</option>
        <option value="canceled">Canceled</option>
    </select>
    @error('status')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
