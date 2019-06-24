<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    {{-- bootstrap 4 --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
</head>
<body style="background-color:ghostwhite">
    <div style="margin-top:5% !important">
        <a href="{{route('home')}}"><i style="position:absolute; margin-left:29%; margin-top:-3%;" class="fas fa-home"></i></a>
        <a href="{{route('fees')}}"><i title="Student Fees" style="position:absolute; margin-left:32%; margin-top:-3%;" class="fas fa-money-check-alt"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <b><h3>Student Registration</h3><hr></b>
                <form action="{{route('addstudent')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" class="form-control" name="fullname" id="fullnames">
                    </div>
                    <div class="form-group">
                        <label for="email">Student Email:</label>
                        <input type="email" class="form-control" name="email"  id="emails">
                    </div>
                    <div class="form-group">
                        <label for="course">Student Course:</label>
                        <input type="text" class="form-control" name="course" id="courses">
                    </div>
                    <div class="form-group">
                        <label for="faculty">Faculty:</label>
                        <select class="form-control" name="faculty" id="facultys">
                            <option> <-- Pick Faculty --> </option>
                            <option>FIT</option>
                            <option>Law</option>
                            <option>Humanities</option>
                            <option>Engineering</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="entry">Entry Date:</label>
                        <input type="date" class="form-control" name="entry" id="entrys">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </form> 
            </div>

            <div class="col-9">
                <input style="width:30% !important" class="form-control float-right" id="myInput" type="text" placeholder="Search for a student..">
                <table class="table hover table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Faculty</th>
                            <th>Entry Date</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->full_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->course}}</td>
                            <td>{{$student->faculty}}</td>
                            <td>{{$student->entry_date}}</td>
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