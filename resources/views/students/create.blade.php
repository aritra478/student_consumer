<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Add Student</h1>

    @if($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label>Phone:</label>
            <input type="text" name="phone" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-layouts.app>