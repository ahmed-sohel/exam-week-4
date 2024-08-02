<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl my-8">Create Contact</h2>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" name="email" id="email" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block">Phone</label>
                <input type="text" name="phone" id="phone" class="border p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="address" class="block">Address</label>
                <input type="text" name="address" id="address" class="border p-2 w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Create</button>
        </form>
    </div>
</body>
</html>
