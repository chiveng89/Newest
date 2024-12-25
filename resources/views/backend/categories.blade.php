@extends('backend.masterbackend')
@section('content')
<div class="bg-white mx-10 my-10 rounded-md">
    <div class="flex justify-between  px-5 py-5 z-30">
        <div class=" mt-2 items-center">
            <label for="" class=" ">Category</label>
        </div>
        <div>
            <button onclick="Category_toggleForm()" class="bg-cyan-50 hover:bg-cyan-500 hover:text-white text-cyan-700 font-bold py-2 px-4 border border-cyan-600 rounded">
                <i class="fa-solid fa-plus"></i> Add New Category
            </button>
        </div>
    </div>
</div>
<div id="categoryForm" class="hidden flex justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
    <form action="{{ route('admin.categories.store') }}" method="POST" class="mt-14 bg-white w-2/6 h-80 rounded-lg">
        @csrf
        <div>
            <div class="flex justify-between">
                <div class="add-cat-text py-6 px-4">
                    <h1 class="text-gray-700 font-medium text-2xl">Add New Category</h1>
                </div>
                <div class="py-6 px-4 cursor-pointer" onclick="Category_toggleForm()">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <div>
                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-300">
            </div>
            <div class="mt-6 px-4">
                <h3 class="font-semibold text-gray-900 dark:text-gray">Category Name <span class="text-red-700">*</span></h3>
                <input type="text" name="category_name" id="default-input" class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mt-6 px-4">
                <input type="hidden" name="status" value="0">
                <label class="inline-flex items-center mb-5 cursor-pointer">
                    <input type="checkbox" name="status" value="1" class="status-checkbox sr-only peer">
                    <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Enable</span>
                </label>
            </div>
            <div class="mt-2">
                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-300">
                <div class="px-4">
                    <button type="submit" class="text-white w-full bg-gradient-to-r from-cyan-500 via-cyan-600 to-cyan-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="mx-10 my-10">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table class="w-full text-sm text-left text-gray-500 shadow-md rounded-md">
            <thead class="text-xs text-white uppercase bg-sky-500">
                <tr>
                    <th class="px-6 py-3">Category Name</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $category->category_name }}</td>
                        <td class="px-6 py-4">
                            <button class="toggle-status-button text-sm w-20 rounded-lg py-1 px-4"
                            data-id="{{ $category->category_id }}"
                            data-status="{{ $category->status }}"
                            style="background-color: {{ $category->status ? 'green' : 'red' }}; color: white;">
                        {{ $category->status ? 'Enable' : 'Disable' }}
                            </button>
                        </td>
                        <td class="px-2 py-4 flex space-x-2">
                            <!-- Edit Button -->

                                <button onclick="Edit_toggleForm({{ $category->category_id }}, '{{ $category->category_name }}', {{ $category->status }})" type="submit" class="text-green-500 icon-edit p-5 ">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </button>
                                <div id="editForm" class="hidden flex justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                    <form id="editCategoryForm" action="" method="POST" class="mt-14 bg-white w-2/6 h-80 rounded-lg">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <div class="flex justify-between">
                                                <div class="add-cat-text py-6 px-4">
                                                    <h1 class="text-gray-700 font-medium text-2xl">Edit News</h1>
                                                </div>
                                                <div class="py-6 px-4 cursor-pointer" onclick="Edit_toggleForm()">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-300">
                                            </div>
                                            <div class="mt-6 px-4">
                                                <h3 class="font-semibold text-gray-900 dark:text-gray">Category Name <span class="text-red-700">*</span></h3>
                                                <input
                                                    id="categoryNameInput"
                                                    name="category_name"
                                                    type="text"
                                                    class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            </div>
                                            <div class="mt-6 px-4">
                                                <input type="hidden" name="status" value="0">
                                                <label class="inline-flex items-center mb-5 cursor-pointer">
                                                    <input {{ $category->status ? 'checked' : ''}} id="statusInput" type="checkbox" name="status" value="1" class="status-checkbox sr-only peer">
                                                    <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Enable</span>
                                                </label>
                                            </div>
                                            <div class="mt-2">
                                                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-300">
                                                <div class="px-4">
                                                    <button type="submit" class="text-white w-full bg-gradient-to-r from-cyan-500 via-cyan-600 to-cyan-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Delete Button -->
                               <!-- Delete Button -->
                                <button onclick="Delete_toggleForm({{ $category->category_id }}, '{{ $category->category_name }}')" type="button" class="text-red-500">
                                    <i class="fa-solid fa-trash text-lg"></i>
                                </button>

                                <!-- Delete Modal -->
                                <div id="deleteForm" class="hidden flex justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                    <form method="POST" class="mt-14 bg-white w-1/3 h-72 rounded-lg">
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
                                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                        Delete
                                                    </button>
                                                </div>
                                                <div onclick="Delete_toggleForm()">
                                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
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
        </div>
    </div>
@endsection
