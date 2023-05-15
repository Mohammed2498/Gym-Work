<div class="form-group">
    <label for="name">Name</label>
    <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name"
           value="{{ old('name', $subscriber->name) }}">
    @error('name')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input name="phone" type="number" class="form-control" id="phone" placeholder="Phone"
           value="{{ old('phone', $subscriber->phone) }}">
    @error('phone')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input name="image" type="file" class="form-control" id="image" value="{{ old('image', $subscriber->image)}}">

</div>


