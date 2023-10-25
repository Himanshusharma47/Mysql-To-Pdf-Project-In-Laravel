<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Export Data to PDF</h1>
        {{-- button section --}}
        <button>
            <a href="{{ route('export.data') }}" >Export Students Data To PDF</a>
        </button>
        
        <h2>Cities Data</h2>
        {{-- table start here --}}
        <table class="table" border="2" width="30%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                </tr>
            </thead>
            {{-- body start here --}}
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->city }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>
</html>