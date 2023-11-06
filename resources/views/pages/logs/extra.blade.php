<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">

              <div class="card-box table-responsive">
         
                  <table id="example" >
                      <thead class="bg-dark text-light ">
                          <tr>
                              {{-- <th class="text-center">User</th> --}}
                              <th class="text-center">Name/Email</th>
                              <th class="text-center">IP Address</th>
                              <th class="text-center">Type</th>
                              <th class="text-center" style="width:25%;">Section</th>
                              <th class="text-center">Date</th>
                              <th class="text-center">Timestamp</th>
                              <th>Description</th>
                          </tr>
                      </thead>
                      <tbody class="">
                          @foreach ($customerLogs as $logData)
                          <tr>
                              {{-- <td class="text-center " style="background-color: gray; color:white; font-weight:bold;">{{ $logData['user'] ?? '' }}</td> --}}
                              <td class="text-center" style="background-color: gray; color:white; font-weight:bold;">{{ $logData['name'] ?? '' }}</td>
                              <td class="text-center" style="color: blue">{{ $logData['ip'] ?? '' }}</td>
                              <td class="text-center">{{ $logData['type'] ?? '' }}</td>
                              <td class="text-center" >{{ $logData['section'] ?? '' }}</td>
                              <td class="text-center">{{ $logData['date'] ?? '' }}</td>
                              <td class="text-center">{{ $logData['time'] ?? '' }}</td>
                              <td>
                                  @if(is_array($logData['description'] ?? null))
                                  {{ json_encode($logData['description']) }}
                              @else
                                  {{ $logData['description'] ?? '' }}
                              @endif    
                                  {{-- {{ $logData['description'] ?? '' }} --}}
                              </td>
                             
                          </tr>
                      @endforeach 
                      </tbody>
                  </table>
                  
    
    </div>
    </div>
</div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


<link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script>
$(document).ready(function(){
 $("#example").dataTable({
     "order": [[5, "desc"]] // Sort by the 6th column (timestamp) in descending order
 });
});
</script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script> --}}


<script>
$(document).ready(function() {
 $('#myTable').DataTable({
     "ajax": "/get-data", // URL to fetch data
     "processing": true,
     "serverSide": true, // Enable server-side processing
     "columns": [
         { "data": "User" }, // Replace with actual column names
         { "data": "Name/Email" },
         { "data": "Name/Email" },
         { "data": "IP Address" },
         { "data": "Type" },
         { "data": "Section" },
         { "data": "Date" },
         { "data": "Timestamp" },
         { "data": "Description" },
         // { "data": "Name/Email" },
         // Add more columns as needed
     ]
 });
});
</script>
{{-- <script>

$('.logstable').DataTable({
ajax: '{{route('logs.data')}}',
"order": [
[0, 'desc']
],
"displayLength": 25,
fixedHeader: true
});    

</script> --}}
  </body>
</html>