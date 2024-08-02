<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl mb-4">Contact Details</h2>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <p><strong>Name:</strong> {{ $contact->name }}</p>
            </div>
            <div class="mb-4">
                <p><strong>Email:</strong> {{ $contact->email }}</p>
            </div>
            <div class="mb-4">
                <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            </div>
            <div class="mb-4">
                <p><strong>Address:</strong> {{ $contact->address }}</p>
            </div>
        </div>
        <a href="{{ route('contacts.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Contacts</a>
    </div>
</body>
</html>
