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
        </div>

        <script>
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
        </script>
    </body>
</html>



        