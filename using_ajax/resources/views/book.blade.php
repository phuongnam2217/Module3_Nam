<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Crud operation using ajax(Real Programmer)</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <h1>Laravel 8 Crud with Ajax</h1>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewBook"> Create New Book</a>
    <table class="table table-bordered data-tablebook">
        <thead>
        <tr>
            <th>No</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th width="300px">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="bookForm" name="bookForm" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="book_id" id="book_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                                   value="" maxlength="50" required="">
                            <span id="titleErr" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <textarea id="author" name="author" required="" placeholder="Enter Author"
                                      class="form-control"></textarea>
                            <span id="authorErr" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-12">
                            <textarea id="description" name="description" required="" placeholder="Enter Author"
                                      class="form-control"></textarea>
                            <span id="descriptionErr" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Title"
                                   value="" maxlength="50" required="">
                            <span id="titleErr" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDelete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure delete</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="destroyBook" value="" class="btn btn-primary destroyBook">Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-tablebook').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('books.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'address', name: 'address'},
                {data: 'phone', name: 'phone'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('#createNewBook').click(function () {
            $('#saveBtn').val("create-book");
            $('#book_id').val('');
            $('#bookForm').trigger("reset");
            $('#modelHeading').html("Create New Book");
            $('#ajaxModel').modal('show');
        });
        $('body').on('click', '.editBook', function () {
            var book_id = $(this).data('id');
            $.get("{{ route('books.index') }}" + '/' + book_id + '/edit', function (data) {
                $('#modelHeading').html("Edit Book");
                $('#saveBtn').val("edit-book");
                $('#ajaxModel').modal('show');
                $('#book_id').val(data.id);
                $('#title').val(data.username);
                $('#author').val(data.email);
                $('#description').val(data.address);
                $('#phone').val(data.phone);
            })
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');

            $.ajax({
                data: $('#bookForm').serialize(),
                url: "{{ route('books.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    // $('#bookForm').trigger("reset");
                    console.log(data.success);
                    console.log(data.error);
                    if(data.success){
                        $('#ajaxModel').modal('hide');
                        $('#title').removeClass('is-invalid');
                        $('#titleErr').html("")
                        $('#author').removeClass('is-invalid');
                        $('#authorErr').html("")
                        $('#description').removeClass('is-invalid');
                        $('#descriptionErr').html("")
                    }
                    if(data.error){
                        $('#ajaxModel').modal('show');
                        if(data.error.title){
                            $('#title').addClass('is-invalid');
                            $('#titleErr').html(data.error.title)
                        }
                        if(data.error.author){
                            $('#author').addClass('is-invalid');
                            $('#authorErr').html(data.error.author)
                        }
                        if(data.error.description){
                            $('#description').addClass('is-invalid');
                            $('#descriptionErr').html(data.error.description)
                        }
                    }
                    $('#bookForm').trigger("reset");
                    table.draw();
                },
                error: function (data) {
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteBook', function () {
            var book_id = $(this).data("id");
            $("#modalDelete").modal('show');
            $("#destroyBook").val(book_id);
        });
        $('body').on('click','.destroyBook',function (){
            $("#modalDelete").modal('hide');
            var book_id = $("#destroyBook").val();
            $.ajax({
                type: "DELETE",
                url: "{{ route('books.index') }}" + '/' + book_id,
                success: function (data) {
                    table.draw();
                    toastr.error(data['success']);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        })
    });
</script>
</body>
</html>
