<div class="form-group">
    <label for="subscriber_id">Subscriber:</label>
    <select name="subscriber_id" id="subscriber_id" class="form-control">
        @foreach ($subscribers as $subscriber)
            <option value="{{ $subscriber->id }}">{{ $subscriber->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" class="form-control">
</div>
<div class="form-group">
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" class="form-control">
</div>
