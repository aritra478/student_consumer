<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Students</h1>
        <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Student</a>
        <table class="w-full mt-4 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">ID</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Phone</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr class="border-t">
                        <td class="p-2">{{ $student['id'] }}</td>
                        <td class="p-2">{{ $student['name'] }}</td>
                        <td class="p-2">{{ $student['email'] }}</td>
                        <td class="p-2">{{ $student['phone'] }}</td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('students.show', $student['id']) }}" class="text-blue-600">View</a>
                            <a href="{{ route('students.edit', $student['id']) }}" class="text-yellow-600">Edit</a>
                            <form action="{{ route('students.destroy', $student['id']) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('Delete student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
