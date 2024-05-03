<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Tourism Entry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Create New room hotel</h1>
        <form action="/store-tourism" method="post" enctype="multipart/form-data" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" id="slug" name="slug" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control-file" required
                    onchange="previewImage();">
                <img id="imagePreview" src="#" alt="Image Preview"
                    style="display: none; max-width: 100%; height: auto; margin-top: 10px;">
            </div>
            <div class="form-group">
                <label for="accommodation">Accommodation:</label>
                <input type="number" id="accommodation" name="accommodation" class="form-control">
            </div>
            <div class="form-group">
                <label for="transportation">Transportation:</label>
                <input type="number" id="transportation" name="transportation" class="form-control">
            </div>
            <div class="form-group">
                <label for="food">Food:</label>
                <input type="number" id="food" name="food" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01">
            </div>
            <div class="form-group">
                <label for="open">Open Time:</label>
                <input type="time" id="open" name="open" class="form-control">
            </div>
            <div class="form-group">
                <label for="close">Close Time:</label>
                <input type="time" id="close" name="close" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mb-5">Create RoomH Hotel</button>
        </form>
    </div>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function previewImage() {
            var file = document.getElementById("image").files;
            if (file.length > 0) {
                var fileReader = new FileReader();

                fileReader.onload = function(event) {
                    document.getElementById("imagePreview").style.display = "block";
                    document.getElementById("imagePreview").src = event.target.result;
                };

                fileReader.readAsDataURL(file[0]);
            }
        }
    </script>
</body>

</html>
