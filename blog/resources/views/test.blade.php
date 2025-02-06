<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Delete Data</h2>
        <form id="deleteForm" method="POST" action="{{ url('/test') }}">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="number" class="form-control" id="id" name="id" required>
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <div id="responseMessage" class="mt-3"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $('#deleteForm').on('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form default
            
            const id = $('#id').val();

            $.ajax({
                url: `/test/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#responseMessage').html(`<div class="alert alert-success">${response.message}</div>`);
                },
                error: function(xhr) {
                    const errorMessage = xhr.responseJSON ? xhr.responseJSON.error : 'An error occurred';
                    $('#responseMessage').html(`<div class="alert alert-danger">${errorMessage}</div>`);
                }
            });
        });
    </script>
</body>
</html>