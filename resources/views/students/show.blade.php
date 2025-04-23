<x-layouts.app>
        @if (!empty($student))
            <div class="bg-white shadow rounded p-6">
                <h2 class="text-2xl font-bold mb-4">Student Details</h2>
                <p><strong>ID:</strong> {{ $student['id'] ?? '-' }}</p>
                <p><strong>Name:</strong> {{ $student['name'] ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $student['email'] ?? '-' }}</p>
                <p><strong>Phone:</strong> {{ $student['phone'] ?? '-' }}</p>
                <p><strong>Created At:</strong> {{ $student['created_at'] ?? '-' }}</p>
                <p><strong>Updated At:</strong> {{ $student['updated_at'] ?? '-' }}</p>

                <a href="{{ route('students.edit', $student['id']) }}"
                    class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                <a href="{{ route('students.index') }}"
                    class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded ml-2">Back</a>
            </div>
        @else
            <div class="p-4 text-red-600">Student not found.</div>
        @endif
</x-layouts.app>
