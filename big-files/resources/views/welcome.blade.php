<!DOCTYPE html>
<html>
<head>
    <title>Chunked File Upload</title>
</head>
<body>
    <h1>upload big files</h1>
 <form action="{{ route('admin.songs.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Song Title" required>
    <input type="hidden" name="artist_id" value="1">

    <input type="file" name="file" accept=".mp3,.wav,.m4a" required>

    <button type="submit">Upload Song</button>
</form>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

</body>
</html>
