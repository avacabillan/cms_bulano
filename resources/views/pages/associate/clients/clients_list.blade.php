<!DOCTYPE html>
<html>
    <head>
        <title>Clients Yajra</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/cr-1.5.4/date-1.1.1/fc-4.0.0/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.2/sp-1.4.0/sl-1.3.3/datatables.min.css"/>
 


 

    </head>
    <body>
        <div class="container mt-5">
            <h1 class="mb-4 text-center">Clients</h1>
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>OCN</th>
                        <th>Associate</th>
                        <th>Mode of Filing</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.0.1/b-colvis-2.0.1/b-html5-2.0.1/b-print-2.0.1/cr-1.5.4/date-1.1.1/fc-4.0.0/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.2/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js">
    
        $(function () {
          
          var table = $('.yajra-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('clients.list') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'client_name', name: 'client_name'},
                  {data: 'contact_number', name: 'contact_number'},
                  {data: 'email', name: 'email'},
                  {data: 'ocn', name: 'ocn'},
                  {data: 'assoc_id', name: 'assoc_id'},
                  {data: 'mode_of_payment', name: 'mode_of_payment'},
                  {
                      data: 'action', 
                      name: 'action', 
                      orderable: true, 
                      searchable: true
                  },
              ]
          });
          
        });
    </script>
</html>