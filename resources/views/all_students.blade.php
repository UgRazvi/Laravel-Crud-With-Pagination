<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <table class="table table-striped table-hover table-bordered table-stripped">
        <center>
            <h1 class="mt-2"> ALL STUDENTS LIST </h1>
        </center>
        <tr>
            <td colspan="2" align="center">
                <a href={{ route('view.delete.all.students') }} class="btn btn-danger btn-sn">Delete All Records</a>
            </td>

            <td colspan="5" align="center">
                <a href="/newStudent" class="btn btn-warning btn-sn">Add New Student</a>
            </td>

            <td colspan="1" align="center">
                <a href={{ route('view.demo.students') }} class="btn btn-dark btn-sn">Import All Records</a>
            </td>
        </tr>


        <thead class="table-dark">
            <tr>
                <td>
                    <h3 align="center"> ID </h3>
                </td>
                <td>
                    <h3 align="center"> Name </h3>
                </td>
                <td>
                    <h3 align="center"> E-Mail </h3>
                </td>
                <td>
                    <h3 align="center"> Age </h3>
                </td>
                <td>
                    <h3 align="center"> City </h3>
                </td>

                <td colspan="2">
                    <h3 align="center"> Actions </h3>
                </td>

                <td>
                    <h3 align="center"> Show Details </h3>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($students_data as $student)
                <td align="center">{{ $student->id }}</td>
                <td align="center">{{ $student->name }}</td>
                <td align="center">{{ $student->email }}</td>
                <td align="center">{{ $student->age }}</td>
                <td align="center"> {{ $student->city }} </td>

                <td align="center"><a href={{ route('view.update.student.page', $student->id) }}
                        class="btn btn-success btn-sn">UPDATE</a></td>

                <td align="center"><a href={{ route('view.delete.student', $student->id) }}
                        class="btn btn-danger btn-sn">DELETE</a></td>

                <td align="center"><a href={{ route('view.single.student', $student->id) }}
                        class="btn btn-primary btn-sn">SHOW</a></td>
        </tbody>
        @endforeach
    </table>
    <div class="pagination">
        {{ $students_data->links('pagination::bootstrap-5') }}
    </div>
</body>

</html>
