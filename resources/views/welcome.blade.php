<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to User API</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900">🚀 Welcome to User API Endpoint</h1>
        <p class="text-gray-600 mt-2">User API is running successfully!</p>

        <div class="mt-4">
            <p class="text-gray-700"><strong>Version:</strong> 1.0.0</p>
            <p class="text-gray-700"><strong>Status:</strong> Running ✅</p>
            <p class="text-gray-700"><strong>Environment:</strong> {{ app()->environment() }}</p>
        </div>

        <a href="docs" class="mt-6 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
            📜 View API Documentation
        </a>
    </div>
</body>
</html>
