<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD AJAX LARAVEL 8.6</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container mt-5">
    <div class="col-lg-8">
        <h1>UJI COBA CRUD LARAVEL</h1>
        <button class="btn btn-primary" onClick="create()">+ Tambah Product</button>
    </div>
    <div class="mt-3" id="read">

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="p-2" id="page"></div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
// pemanggilan data
    $(document).ready(function(){
        read()
    });

// create database
    function read() {
        $.get("{{url('read')}}", {}, function(data, status){
            $("#read").html(data);
        }); 
    }

// untuk modal create
    function create () {
        $.get("{{url('create')}}", {}, function(data, status){
            $("#exampleModalLabel").html('Create Product');
            $("#page").html(data);
            $("#tambah").modal('show');
        });     
    }

// untuk proses create data
    function store() {
        var name = $("#name").val();
        $.ajax({
           type:"get",
           url:"{{url('store')}}",
           data: "name=" + name,
           success: function(data) {
               $(".btn-close").click();
               read()
           }
        });
    }

// untuk modal edit/ function show di controller
    function show (id) {
        $.get("{{url('show')}}/" + id, {}, function(data, status){
            $("#exampleModalLabel").html('Edit Product');
            $("#page").html(data);
            $("#tambah").modal('show');
        });     
    }

// untuk proses update data
    function update(id) {
        var name = $("#name").val();
        $.ajax({
           type:"get",
           url:"{{url('update')}}/" + id,
           data: "name=" + name,
           success: function(data) {
               $(".btn-close").click();
               read()
           }
        });
    }

// untuk proses delete/destroy data
function destroy(id) {
        //confirm("Apakah yakin akan menghapus data");
        var name = $("#name").val();
        $.ajax({
           type:"get",
           url:"{{url('destroy')}}/" + id,
           data: "name=" + name,
           success: function(data) {
               $(".btn-close").click();
               read()
           }
        });
    }

</script>

</body>
</html>