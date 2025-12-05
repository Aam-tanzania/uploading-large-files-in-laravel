
<!DOCTYPE html>
<html>
<head>
    <title>Music Upload</title>
</head>
<body>

    <h1>Upload New Song</h1>

    <form action="{{ route('admin.songs.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="Song Title" required>
        <input type="hidden" name="artist_id" value="1">

        <input type="file" name="file" accept=".mp3,.wav,.m4a" required>

        <button type="submit">Upload Song</button>
    </form>

    <br>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <hr>

    <h2>Uploaded Songs</h2>

    @if($songs->count() == 0)
        <p>No songs uploaded yet.</p>
    @else
        <ul>
            @foreach($songs as $song)
                <li style="margin-bottom: 20px;">
                    <strong>{{ $song->title }}</strong><br>
                    <small>{{ $song->audio_file }}</small><br>

                    <audio controls style="width: 300px; margin-top: 5px;">
                        <source src="{{ asset($song->audio_file) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>
