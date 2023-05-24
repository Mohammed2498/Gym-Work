<input type="hidden" name="subscriber_id" value="{{ $subscriber->id }}">
@error('subscriber_id')
<div class="alert alert-danger">
    {{ $message }}
</div>
@enderror
<div class="form-group" >
<select name="subscription_type" id="subscribe_type" onchange="handleSubscribeTypeChange()" class="form-control">
    <option value="specified">Specified Duration</option>
    <option value="custom">Custom Duration</option>
</select>
</div>
<div class="form-group" id="duration_field" >

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


<div id="start_date_field" class="form-group" style="display: none;">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $start_date }}">
    @error('start_date')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div id="end_date_field" class="form-group" style="display: none;">
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $end_date }}">
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
<script>
    function handleSubscribeTypeChange() {
        var selectedSubscribeType = document.getElementById('subscribe_type').value;

        // Get the DOM elements of the fields to show/hide
        var durationField = document.getElementById('duration_field');
        var startDateField = document.getElementById('start_date_field');
        var endDateField = document.getElementById('end_date_field');

        // Show or hide fields based on the selected subscribe type
        if (selectedSubscribeType === 'custom') {
            durationField.style.display = 'none';
            startDateField.style.display = 'block';
            endDateField.style.display = 'block';
        } else {
            durationField.style.display = 'block';
            startDateField.style.display = 'none';
            endDateField.style.display = 'none';
        }
    }
</script>



