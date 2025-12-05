<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Upload | Spotify-like Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        }

        body {
            background-color: #121212;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background-color: #000000;
            padding: 24px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #1DB954;
            margin-bottom: 32px;
            padding-left: 8px;
        }

        .nav-section {
            margin-bottom: 32px;
        }

        .nav-title {
            color: #b3b3b3;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            padding-left: 8px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 8px;
            color: #b3b3b3;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 4px;
            transition: all 0.2s;
            cursor: pointer;
        }

        .nav-item:hover {
            background-color: #282828;
            color: #ffffff;
        }

        .nav-item.active {
            background-color: #282828;
            color: #ffffff;
        }

        .nav-icon {
            margin-right: 12px;
            font-size: 20px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 240px;
            padding: 32px;
            background: linear-gradient(#1a1a1a, #121212);
            min-height: 100vh;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 32px;
            font-weight: bold;
        }

        /* Cards */
        .card {
            background-color: #181818;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
            transition: background-color 0.3s;
        }

        .card:hover {
            background-color: #282828;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 16px;
            color: #ffffff;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: #b3b3b3;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 14px;
            background-color: #282828;
            border: 1px solid #404040;
            border-radius: 4px;
            color: #ffffff;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #1DB954;
        }

        .form-input::placeholder {
            color: #7a7a7a;
        }

        /* File Upload Area */
        .file-upload-area {
            border: 2px dashed #404040;
            border-radius: 4px;
            padding: 40px 20px;
            text-align: center;
            background-color: #282828;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload-area:hover {
            border-color: #1DB954;
            background-color: #333333;
        }

        .file-upload-icon {
            font-size: 48px;
            color: #1DB954;
            margin-bottom: 16px;
        }

        .file-upload-text {
            color: #b3b3b3;
            margin-bottom: 8px;
        }

        .file-input {
            display: none;
        }

        /* Buttons */
        .btn {
            padding: 12px 32px;
            border: none;
            border-radius: 500px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary {
            background-color: #1DB954;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #1ed760;
            transform: scale(1.04);
        }

        .btn-secondary {
            background-color: transparent;
            color: #ffffff;
            border: 1px solid #7a7a7a;
        }

        .btn-secondary:hover {
            border-color: #ffffff;
        }

        /* Songs List */
        .songs-list {
            display: grid;
            gap: 16px;
        }

        .song-item {
            display: flex;
            align-items: center;
            background-color: #181818;
            border-radius: 4px;
            padding: 16px;
            transition: background-color 0.3s;
        }

        .song-item:hover {
            background-color: #282828;
        }

        .song-info {
            flex: 1;
            margin-right: 20px;
        }

        .song-title {
            font-size: 16px;
            font-weight: 500;
            color: #ffffff;
            margin-bottom: 4px;
        }

        .song-filename {
            font-size: 12px;
            color: #b3b3b3;
        }

        .audio-player {
            flex: 2;
        }

        audio {
            width: 100%;
            height: 40px;
        }

        audio::-webkit-media-controls-panel {
            background-color: #282828;
        }

        /* Messages */
        .alert {
            padding: 16px;
            border-radius: 4px;
            margin-bottom: 24px;
            animation: slideIn 0.3s ease;
        }

        .alert-success {
            background-color: rgba(29, 185, 84, 0.1);
            border-left: 4px solid #1DB954;
            color: #1DB954;
        }

        .alert-error {
            background-color: rgba(220, 38, 38, 0.1);
            border-left: 4px solid #dc2626;
            color: #dc2626;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7a7a7a;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
                padding: 16px;
            }

            .nav-text, .logo-text, .nav-title {
                display: none;
            }

            .nav-icon {
                margin-right: 0;
                font-size: 24px;
            }

            .main-content {
                margin-left: 80px;
                padding: 20px;
            }

            .song-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .audio-player {
                width: 100%;
                margin-top: 12px;
            }
        }

        /* Animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Utility Classes */
        .hidden {
            display: none;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .mb-8 {
            margin-bottom: 32px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-music"></i>
            <span class="logo-text">MusicHub</span>
        </div>

        <div class="nav-section">
            <div class="nav-title">Navigation</div>
            <div class="nav-item active" onclick="showSection('upload')">
                <i class="fas fa-upload nav-icon"></i>
                <span class="nav-text">Upload</span>
            </div>
            <div class="nav-item" onclick="showSection('library')">
                <i class="fas fa-music nav-icon"></i>
                <span class="nav-text">Library</span>
            </div>
            <div class="nav-item">
                <i class="fas fa-chart-bar nav-icon"></i>
                <span class="nav-text">Analytics</span>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-title">Playlists</div>
            <div class="nav-item">
                <i class="fas fa-heart nav-icon"></i>
                <span class="nav-text">Liked Songs</span>
            </div>
            <div class="nav-item">
                <i class="fas fa-clock nav-icon"></i>
                <span class="nav-text">Recently Added</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Upload Section -->
        <div id="uploadSection" class="section">
            <div class="header">
                <h1 class="page-title">Upload New Song</h1>
                <div>
                    <button class="btn btn-secondary" onclick="showSection('library')">
                        <i class="fas fa-arrow-left"></i> View Library
                    </button>
                </div>
            </div>

            <!-- Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <!-- Upload Form Card -->
            <div class="card">
                <h2 class="card-title">Song Details</h2>

                <form action="{{ route('admin.songs.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Song Title</label>
                        <input type="text" name="title" placeholder="Enter song title" class="form-input" required>
                    </div>

                    <input type="hidden" name="artist_id" value="1">

                    <div class="form-group">
                        <label class="form-label">Audio File</label>
                        <div class="file-upload-area" onclick="document.getElementById('fileInput').click()">
                            <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                            <div class="file-upload-text">Click to select audio file</div>
                            <div style="font-size: 12px; color: #7a7a7a;">Supports: .mp3, .wav, .m4a</div>
                            <input type="file" name="file" id="fileInput" class="file-input" accept=".mp3,.wav,.m4a" required onchange="updateFileName(this)">
                        </div>
                        <div id="fileName" class="form-label" style="margin-top: 8px;"></div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Upload Song
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Library Section -->
        <div id="librarySection" class="section hidden">
            <div class="header">
                <h1 class="page-title">Your Music Library</h1>
                <div>
                    <button class="btn btn-primary" onclick="showSection('upload')">
                        <i class="fas fa-plus"></i> Add New Song
                    </button>
                </div>
            </div>

            @if($songs->count() == 0)
                <div class="empty-state">
                    <i class="fas fa-music empty-state-icon"></i>
                    <h3 class="mb-4">No songs uploaded yet</h3>
                    <p class="mb-8">Start by uploading your first song!</p>
                    <button class="btn btn-primary" onclick="showSection('upload')">
                        <i class="fas fa-upload"></i> Upload First Song
                    </button>
                </div>
            @else
                <div class="card">
                    <h2 class="card-title">Uploaded Songs ({{ $songs->count() }})</h2>
                    <div class="songs-list">
                        @foreach($songs as $song)
                            <div class="song-item">
                                <div class="song-info">
                                    <div class="song-title">{{ $song->title }}</div>
                                    <div class="song-filename">{{ $song->audio_file }}</div>
                                </div>
                                <div class="audio-player">
                                    <audio controls>
                                        <source src="{{ asset($song->audio_file) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Show/hide sections
        function showSection(sectionName) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('hidden');
            });

            document.getElementById(sectionName + 'Section').classList.remove('hidden');

            // Update active nav item
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active');
            });

            if (sectionName === 'upload') {
                document.querySelector('.nav-item:nth-child(1)').classList.add('active');
            } else if (sectionName === 'library') {
                document.querySelector('.nav-item:nth-child(2)').classList.add('active');
            }
        }

        // Update file name display
        function updateFileName(input) {
            const fileNameDisplay = document.getElementById('fileName');
            if (input.files.length > 0) {
                fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
                fileNameDisplay.style.color = '#1DB954';
            } else {
                fileNameDisplay.textContent = '';
            }
        }

        // Form submission with feedback
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading...';
            submitBtn.disabled = true;

            // Re-enable button after 3 seconds (in case of error)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Check if there are success/error messages and show upload section
            @if(session('success') || session('error'))
                showSection('upload');
            @endif

            // Add fade-in animation to cards
            setTimeout(() => {
                document.querySelectorAll('.card').forEach((card, index) => {
                    card.style.animation = `slideIn 0.3s ease ${index * 0.1}s both`;
                });
            }, 100);
        });
    </script>
</body>
</html>
