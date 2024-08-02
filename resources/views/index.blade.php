<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto mt-5">
        <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white inline-block px-4 py-2 rounded-md">Create new contact</a>
        @if(session()->has('success'))
            <div class="p-4 bg-green-400 mt-4 rounded-md">
                {{ session()->get('success') }}
            </div>
        @endif
        <form method="GET" action="{{ route('contacts.index') }}" class="mt-6">
            <div class="flex mb-4">
                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" required class="border p-2 w-full">
                <button type="submit" class="bg-blue-500 text-white p-2">Search</button>
            </div>
            <div class="flex mb-4">
                <div class="mr-2">
                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort" onchange="this.form.submit()" class="border p-2">
                        <option value="">Select</option>
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                        <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Date</option>
                    </select>
                </div>
                <div>
                    <label for="direction">Direction:</label>
                    <select name="direction" id="direction" onchange="this.form.submit()" class="border p-2">
                        <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>
                </div>
            </div>

        </form>
        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Address</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td class="border px-4 py-2">{{ $contact->name }}</td>
                        <td class="border px-4 py-2">{{ $contact->email }}</td>
                        <td class="border px-4 py-2">{{ $contact->phone }}</td>
                        <td class="border px-4 py-2">{{ $contact->address }}</td>
                        <td class="border px-4 py-2">{{ $contact->created_at }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('contacts.show', $contact) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">View</a>
                            <a href="{{ route('contacts.edit', $contact) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Edit</a>
                            <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" class="inline-block" accept-charset="UTF-8">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-1.5 rounded-md" title="Delete Contact"
                                        onclick="return confirm('Click Ok to delete Contact.')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $contacts->withQueryString()->links() }}
        </div>
    </div>
</body>
</html>
