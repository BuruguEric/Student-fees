<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body style="background-color:ghostwhite">
    <div style="margin-top:5% !important">
        <a href="{{route('home')}}"><i style="position:absolute; margin-left:29%; margin-top:-3%;" class="fas fa-home"></i></a>
        <a href="{{route('students')}}"><i title="Student Details" style="position:absolute; margin-left:32%; margin-top:-3%;" class="fas fa-user-graduate"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="{{route('payFees')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Sid">Student ID:</label>
                    <select class="form-control" name="Sid" id="Sids">
                        <option></option>
                        @foreach ($studentIds as $studentId)
                        <option>{{$studentId->id}}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" step="any" min="0" class="form-control" name="amount" id="amounts">
                    </div>
                    <button type="submit" class="btn btn-primary">Pay Fees</button>
                </form> 
            </div>
            <div class="col-9">
                <input style="width:30% !important" class="form-control float-right" id="myInput" type="text" placeholder="Search payment records..">
                <table id="example" class="table hover table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fee ID</th>
                            <th>Student ID</th>
                            <th>Amount paid</th>
                            <th>Balance</th>
                            <th>Payment Date</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($fees as $fee)
                        <tr>
                            <td>{{$fee->id}}</td>
                            <td>{{$fee->student_id}}</td>
                            <td>{{$fee->amount_paid}}</td>
                            <td>{{$fee->balance}}</td>
                            <td>{{$fee->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
        });
    </script>
</body>
</html>