<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add Student Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>UPDATE STUDENT FORM</h1>
                <form action="{{ route('view.update.student', $student_data->id) }}" method="POST">

                    @csrf {{-- Otherwise You'll Get Error-419 : PAGE EXPIRED. --}}

                    <div class="mb-3">
                        <label for="studentname">Name</label>
                        <input type="text" class="form-control" value="{{ $student_data->name }}" name="studentname"
                            id="studentname">
                    </div>

                    <div class="mb-3">
                        <label for="studentemail">E-Mail</label>
                        <input type="text" class="form-control" value="{{ $student_data->email }}"
                            name="studentemail" id="studentemail">
                    </div>

                    <div class="mb-3">
                        <label for="studentage">Age</label>
                        <input type="text" class="form-control" value="{{ $student_data->age }}" name="studentage"
                            id="studentage">
                    </div>

                    <div class="mb-3">
                        <label for="studentcity">City</label>
                        <input type="text" class="form-control" value="{{ $student_data->city }}" name="studentcity"
                            id="studentcity">
                    </div>

                    {{-- <div class="mb-3">
                        <label for="studentcity">City</label>
                        <input type="text" class="form-control" value="{{$student_data->city}}" name="studentcity"
                            id="studentcity">
                    </div> --}}

                    <button type="submit" class="btn btn-primary">Update Student</button>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
