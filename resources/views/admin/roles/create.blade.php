<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Create Role</h1>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Permissions</label>
                @foreach($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}"
                            {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>
                        <label for="permission-{{ $permission->id }}" class="ml-2 text-sm text-gray-600">{{ $permission->name }}</label>
                    </div>
                @endforeach
                @error('permissions')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.roles.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Back to Roles List</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Role</button>
            </div>
        </form>
    </div>
</x-admin-layout>
