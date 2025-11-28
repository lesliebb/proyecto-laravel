<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <ul>
    <div class="max-w-lg mx-auto bg-gradient-to-tr from-indigo-500 to-blue-600 text-white p-6 rounded-xl shadow-xl">
        <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
        <p class="mb-4 text-sm">
            @foreach ($post->comments as $comment)
            <li>{{ $comment->text }} - by User ID: {{ $comment->user->name }}</li>
            @endforeach
        </p>

        <div class="flex items-center justify-between mt-4">
            <span class="text-xs opacity-80">{{ $comment->created_at }}</span>
            <button class="bg-white text-indigo-600 font-semibold px-4 py-1 rounded-lg hover:bg-gray-200 transition">
                Me gusta
            </button>
        </div>
    </div>
</body>
</html>
