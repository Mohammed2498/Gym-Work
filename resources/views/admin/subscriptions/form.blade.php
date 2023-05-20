
<input type="hidden" name="subscriber_id" value="{{ $subscriber->id }}">
@error('subscriber_id')
<div class="alert alert-danger">
    {{ $message }}
</div>
@enderror
<div class="form-group">
    <label for="duration">Duration (months):</label>
    <select name="duration" id="duration" class="form-control">
        <option value="1">1 month</option>
        <option value="2">2 months</option>
        <option value="3">3 months</option>
        <option value="4">4 month</option>
        <option value="5">5 months</option>
        <option value="6">6 months</option>
        <option value="7">7 month</option>
        <option value="8">8 months</option>
        <option value="9">9 months</option>
        <option value="10">10 month</option>
        <option value="11">11 months</option>
        <option value="12">1 Year</option>
        <!-- Add more options as needed -->
    </select>
</div>
<div class="form-group">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $start_date }}" readonly>
    @error('start_date')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $end_date }}"readonly >
    @error('end_date')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <select hidden="" name="status" id="status" class="form-control">
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
