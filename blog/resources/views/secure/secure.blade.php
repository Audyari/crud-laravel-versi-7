<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Area</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $message }}</h1>
        <ul class="list-group mt-3">
            @foreach($data as $key => $value)
                <li class="list-group-item">
                    <strong>{{ $key }}</strong>: {{ $value }}
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>