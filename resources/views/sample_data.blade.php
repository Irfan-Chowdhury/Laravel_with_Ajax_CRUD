<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>How to Implement Yajra Datatables in Laravel 6</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
        
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>  
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  

       </head>

    <body>
        <div class="container">
            <br>
            <h3 class="mt-3 text-center">How to Implement Yajra Datatables in Laravel 6</h3>
            <div align="right">
                <button type="button" class="mb-2 btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                    Add New <b>+</b>
                </button> 
            </div>
            <table id="user_table" class="text-center table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                    {{-- <th scope="col">#SL</th> --}}
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>



            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        
                        <span id="form_result"></span>

                        <form action="" id="sample_form" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="first_name" class="col-form-label">First Name:</label>
                                <input type="text" name="first_name" id="first_name" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="last_name" class="col-form-label">Last Name:</label>
                                <input type="text" name="last_name" id="last_name" class="form-control">
                            </div>

                            <div class="form-group" align="right">
                                <input type="hidden" name="action" id="action" value="Add"/>
                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                <button type="submit" name="action_button" id="action_button" class="btn btn-primary">Save</button>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>

                            </div>
                        </form>

                    </div>
                </div>
                </div>
            </div>

        </div>

        <script>
            // --- For Data Read ---

            $(document).ready(function(){
                $('#user_table').DataTable({
                    processing:true,
                    serverSide:true,
                    ajax:{
                        url: "{{ route('sample.index') }}"
                    },
                    columns:[
                        {
                            data:'first_name',
                            name:'first_name',
                        },
                        { data:'last_name', name:'last_name',},
                        { data:'action', name:'action', orderable:false },
                    ]
                });
            });

            // --- For Data Create ---

            $('#sample_form').on('submit',function (event) {
               event.preventDefault();
               var action_url = '';

               if ($('#action').val()=='Add') 
               {
                   action_url = "{{ route('sample.store') }}";
               } 

               $.ajax({
                   url:action_url,
                   method:"POST",
                   data:$(this).serialize(),
                   dataType:"json",
                   success:function(data)
                   {
                       var html = '';
                       if (data.errors) // how much error
                       {
                           html = '<div class="alert alert-danger">';
                           for(var count = 0; count< data.errors.length; count++)
                           {
                               html += '<p>'+ data.errors[count] +'</p>'
                           }
                           html += '</div>';
                       }
                       if (data.success) 
                       {
                           html = '<div class="alert alert-success">' + data.success + '</div>';
                           $('#sample_form')[0].reset(); //after submit, input field will blank 
                           $('#user_table').DataTable().ajax.reload(); //page will reload automatically
                       }
                       $('#form_result').html(html);
                   }
               });
            });
        </script>
    </body>
</html>



        