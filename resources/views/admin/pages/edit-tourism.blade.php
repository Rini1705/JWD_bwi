<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Tourism Entry</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="container mt-5">
        <h1>Edit Room Hotel Package</h1>
        <form action="/update-tourism/{{ $tourism->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $tourism->name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $tourism->slug }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $tourism->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image"
                    onchange="updateImagePreview(this)">
                <img id="imagePreview" src="{{ asset('frontend/img/' . $tourism->image) }}" alt="Current Image"
                    style="max-width: 100%; height: auto; margin-top: 10px;" onerror="this.style.display='none'">
            </div>
            <div class="form-group">
                <label for="accommodation">Accommodation:</label>
                <input type="number" class="form-control" id="accommodation" name="accommodation"
                    value="{{ $tourism->accommodation }}">
            </div>
            <div class="form-group">
                <label for="transportation">Transportation:</label>
                <input type="number" class="form-control" id="transportation" name="transportation"
                    value="{{ $tourism->transportation }}">
            </div>
            <div class="form-group">
                <label for="food">Food:</label>
                <input type="number" class="form-control" id="food" name="food" value="{{ $tourism->food }}">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $tourism->price }}"
                    step="0.01">
            </div>
            <div class="form-group">
                <label for="open">Open Time:</label>
                <input type="time" class="form-control" id="open" name="open" value="{{ $tourism->open }}">
            </div>
            <div class="form-group">
                <label for="close">Close Time:</label>
                <input type="time" class="form-control" id="close" name="close" value="{{ $tourism->close }}">
            </div>
            <button type="submit" class="btn btn-primary mb-5">Update Tourism Entry</button>
        </form>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function updateImagePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Ensure the preview is visible
                };

                reader.readAsDataURL(input.files[0]); // Read the file and convert it to a data URL
            }
        }
    </script>
</body>

</html>
