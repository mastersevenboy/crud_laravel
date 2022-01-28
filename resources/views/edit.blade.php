<div class="p2">
    <div class="form-group">
        <label for="name">Nama Product</label>
        <input type="text" value="{{$data->name}}" name="name" id="name" class="form-control" plaeholder="Name Product">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{$data->id}})">Update</button>
    </div>
</div>