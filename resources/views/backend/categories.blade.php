@extends('backend.masterbackend')
@section('content')
    <div class="bg-white mx-10 my-10 rounded-md">
        <div class="flex justify-between  p-4 z-30">
            <div class=" mt-2 items-center">
                <label for="" class=" ">Category</label>
            </div>
            <div>
                <button onclick="Category_toggleForm()"
                    class="bg-cyan-50 hover:bg-cyan-500 hover:text-white text-cyan-700 font-bold py-2 px-4 border border-cyan-600 rounded">
                    <i class="fa-solid fa-plus"></i> Add New Category
                </button>
            </div>
        </div>
    </div>
    <div id="categoryForm" class="hidden flex justify-center items-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
        <form action="{{ route('admin.categories.store') }}" method="POST"
            class="bg-white rounded-lg shadow-xl w-11/12 md:w-2/5 lg:w-1/3 p-6">
            @csrf
            <!-- Header Section -->
            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                <h1 class="text-xl font-semibold text-gray-800">Add New Category</h1>
                <button type="button" onclick="Category_toggleForm()"
                    class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Category Name Input -->
            <div class="mt-6">
                <label for="category_name" class="block text-sm font-medium text-gray-700 mb-2">
                    Category Name <span class="text-red-600">*</span>
                </label>
                <input type="text" name="category_name" id="category_name"
                    class="w-full px-4 py-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Enter category name" required>
            </div>

            <!-- Toggle Switch for Status -->
            <div class="mt-6">
                <label class="flex items-center space-x-3">
                    <input type="hidden" name="status" value="0">
                    <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="status" value="1"
                            class="status-checkbox absolute block w-6 h-6 rounded-full bg-white border-2 border-gray-300 appearance-none cursor-pointer checked:right-0 checked:border-blue-600 checked:bg-blue-600 transition-all" />
                        <span class="toggle-bg block h-6 w-10 rounded-full bg-gray-200 transition-colors"></span>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Enable</span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit"
                    class="w-full px-4 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                    Submit
                </button>
            </div>
        </form>
    </div>
    <div class="mx-10 my-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <table class="w-full text-sm text-left text-gray-500 shadow-md rounded-md">
                <thead class="text-xs text-white uppercase bg-sky-500">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Category Name</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                                {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                            <td class="px-6 py-3 font-medium text-gray-900">{{ $category->category_name }}</td>
                            <td class="px-6 py-3">
                                <button class="toggle-status-button text-sm w-20 rounded-lg p-2"
                                    data-id="{{ $category->category_id }}" data-status="{{ $category->status }}"
                                    style="background-color: {{ $category->status ? 'green' : 'red' }}; color: white;">
                                    {{ $category->status ? 'Enable' : 'Disable' }}
                                </button>
                            </td>
                            <td class=" flex space-x-2">
                                <!-- Edit Button -->
                                <button
                                    onclick="Edit_toggleForm({{ $category->category_id }}, '{{ $category->category_name }}', {{ $category->status }})"
                                    type="submit" class="text-green-600 icon-edit justify-contents-center p-3">
                                    <i class="fa-solid fa-pen-to-square  text-lg"></i>
                                </button>
                                <div id="editForm"
                                    class="hidden flex justify-center items-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                    <form id="editCategoryForm" action="" method="POST"
                                        class="bg-white rounded-lg shadow-xl w-11/12 md:w-2/5 lg:w-1/3 p-6">
                                        @csrf
                                        @method('PUT')

                                        <!-- Header Section -->
                                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                                            <h1 class="text-xl font-semibold text-gray-800">Edit Category</h1>
                                            <button type="button" onclick="Edit_toggleForm()"
                                                class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                                <i class="fa-solid fa-xmark text-xl"></i>
                                            </button>
                                        </div>

                                        <!-- Category Name Input -->
                                        <div class="mt-6">
                                            <label for="categoryNameInput"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Category Name <span class="text-red-600">*</span>
                                            </label>
                                            <input id="categoryNameInput" name="category_name" type="text"
                                                class="w-full px-4 py-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                                placeholder="Enter category name" required>
                                        </div>

                                        <!-- Toggle Switch for Status -->
                                        <div class="mt-6">
                                            <label class="flex items-center space-x-3">
                                                <input type="hidden" name="status" value="0">
                                                <div
                                                    class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                                                    <input id="statusInput" type="checkbox" name="status" value="1"
                                                        class="status-checkbox absolute block w-6 h-6 rounded-full bg-white border-2 border-gray-300 appearance-none cursor-pointer checked:right-0 checked:border-blue-600 checked:bg-blue-600 transition-all"
                                                        {{ $category->status ? 'checked' : '' }}>
                                                    <span
                                                        class="toggle-bg block h-6 w-10 rounded-full bg-gray-200 transition-colors"></span>
                                                </div>
                                                <span class="text-sm font-medium text-gray-700">Enable</span>
                                            </label>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mt-8">
                                            <button type="submit"
                                                class="w-full px-4 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Delete Button -->
                                <!-- Delete Button -->
                                <button
                                    onclick="Delete_toggleForm({{ $category->category_id }}, '{{ $category->category_name }}')"
                                    type="button" class="text-red-600">
                                    <i class="fa-solid fa-trash text-lg"></i>
                                </button>

                                <!-- Delete Modal -->
                                <div id="deleteForm"
                                    class="hidden flex justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                    <form action="{{ route('admin.categories.delete', $category->category_id) }}"
                                        method="POST" class="mt-14 bg-white w-1/3 h-72 rounded-lg">
                                        @csrf
                                        @method('DELETE')
                                        <div>
                                            <div class="flex justify-between">
                                                <div class="add-cat-text py-6 px-4">
                                                    <h1 class="text-gray-700 font-medium text-2xl">Delete Category</h1>
                                                </div>
                                            </div>
                                            <div>
                                                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-300">
                                            </div>
                                            <div class="justify-items-center mt-4 text-center">
                                                <div>
                                                    <i class="fa-solid fa-circle-exclamation text-4xl"></i>
                                                </div>
                                                <div class="mt-6">
                                                    <h3 class="text-lg">Are you sure you want to delete this category?</h3>
                                                </div>
                                            </div>
                                            <div class="flex justify-center gap-12 px-10 py-10">
                                                <div>
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                        Delete
                                                    </button>
                                                </div>
                                                <div onclick="Delete_toggleForm()">
                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="mt-5w mb-2 text-gray">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
