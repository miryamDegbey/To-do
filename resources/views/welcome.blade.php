<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>


</head>

<body class="bg-gray-200 p-4">

    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-5xl text-center mb-8">Laravel + Tailwind</h1>

        <div class="mb-6">
            <form class="flex flex-col space-y-4" method="POST" action="/">
                @csrf
                <input type="text" name="title" placeholder="The todo title"
                    class="py-3 px-4 bg-gray-100 rounded-xl">

                <textarea name="description" placeholder="The todo description" class="py-3 px-4 bg-gray-100 rounded-xl"></textarea>

                <button class="w-28 py-4 px-8 bg-green-500 text-white rounded-xl">Add</button>
            </form>
        </div>

        <hr>

        <div class="mt-2">
            @foreach ($todos as $todo)
                <div 
                    @class([
                        'py-4 flex items-center border-b border-gray-300 px-3',
                        $todo->isDone ? 'bg-green-200' : ''

                    ])>
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                        <p class="text-gray-500">{{ $todo->description }}</p>
                    </div>

                    <div class="flex space-x-3">
                        <form method="POST" action="/{{ $todo->id }}">
                            @csrf
                            @method('PATCH')

                            <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z" />
                                </svg>
    
                            </button>
                        </form>
                        

                        <form method="POST" action="/{{ $todo->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M20 6a1 1 0 0 1 .117 1.993L20 8h-.081L19 19a3 3 0 0 1-2.824 2.995L16 22H8c-1.598 0-2.904-1.249-2.992-2.75l-.005-.167L4.08 8H4a1 1 0 0 1-.117-1.993L4 6zm-6-4a2 2 0 0 1 2 2a1 1 0 0 1-1.993.117L14 4h-4l-.007.117A1 1 0 0 1 8 4a2 2 0 0 1 1.85-1.995L10 2z" />
                                </svg>
                            </button>
                        </form>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</body>

</html>
