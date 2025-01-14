@extends('backend.masterbackend')
@section('content')
    <div class="bg-white  mx-10 my-10 rounded-md">
        <div class="flex justify-between p-4 z-30 ">
            <div class="mt-2 items-center">
                <label for="" class="">All Advertisement</label>
            </div>
            <div class="">
                <button onclick="Ads_toggleForm()"
                    class="bg-cyan-50  hover:bg-cyan-500 hover:text-white text-cyan-700 font-blod py-2 px-4 border border-cyan-600 rounded">
                    <a>
                        <i class="fa-solid fa-plus"></i>
                        Add New Advertisement
                    </a>
                </button>
            </div>
        </div>
    </div>
    <!-- Add Advertisement Form (Hidden by Default) -->
    <div id="adsForm" class="flex hidden h-full justify-center fixed inset-0 scroll-smooth bg-gray-800 bg-opacity-50 z-40">
        <form action="{{ route('admin.advertisement.store') }}" method="POST" enctype="multipart/form-data"
            class="mt-4 pb-10 bg-white w-2/6 h-auto ">
            @csrf
            <div>
                <div class="flex justify-between">
                    <div class="add-cat-text py-6 px-4">
                        <h1 class="text-gray-700 font-medium text-2xl">Add new Advertisement</h1>
                    </div>
                    <div class="py-6 px-4 cursor-pointer" onclick="Ads_toggleForm()">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <div>
                    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-300">
                </div>
                <!-- Form Fields -->
                <div name="size" class="mt-6 px-4">
                    <h3 for="size" class="font-semibold text-gray-900 dark:text-gray">Select the size <span
                            class="text-red-700">*</span></h3>
                    {{-- <input type="text" name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-white-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
                    <select name="size" id="size"
                        class="bg-white-50 border border-white-300 text-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 ">
                        <option value="920 * 120">920 * 120 </option>
                    </select>
                    @error('size')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-6 px-4">
                    <h3 for="categories" name="categories" class="font-semibold text-gray-900 dark:text-gray">Category<span
                            class="text-red-700">*</span></h3>
                    <select name="category_id" id="categories"
                        class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray">
                        <option value="" disabled selected>Choose a category</option>
                        @foreach ($categories as $category)
                            @if ($category->status)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center justify-center">
                    <div class="mt-6 px-4 mr-4 ml-8">
                        <div id="imagePreview" class="mb-2 w-40 h-40 flex items-center justify-center relative">
                            <!-- Image and remove button will be inserted here -->
                        </div>
                        <div class="text-center">
                            <button type="button" id="uploadButton"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <i class="fa-solid fa-upload"></i>
                                Upload Ad Image
                            </button>
                            <input type="file" name="image" id="image" class="hidden"
                                accept="image/jpeg,image/png,image/gif" />
                        </div>
                    </div>
                </div>
                <div class="mt-6 px-4">
                    <input type="hidden" name="status" value="0">
                    <label class="inline-flex items-center mb-5 cursor-pointer">
                        <input type="checkbox" name="status" value="1" class="status-checkbox sr-only peer">
                        <div
                            class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-cyan-300 dark:peer-focus:ring-sky-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-sky-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-700">Disable or Enable</span>
                    </label>
                </div>
                <div class="mt-2">
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-300">
                    <div class="px-4">
                        <button type="submit"
                            class="text-white w-full bg-gradient-to-r from-cyan-500 via-cyan-600 to-cyan-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Advertisement Table -->
    <div class="mx-10 my-10 bg-white sm:rounded-lg">
        <div class="relative p-6  h-full overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-full   text-sm text-left rtl:text-right text-gray-500 shadow-md  sm:rounded-lg">
                <thead class="text-xs text-slate-50 uppercase bg-sky-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <th scope="col" class="px-6 py-3">Size</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ads as $advertisement)
                        <tr class="bg-white border-b dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                                {{ ($ads->currentPage() - 1) * $ads->perPage() + $loop->iteration}}</td>
                            <td class="  font-medium text-gray-900">
                                <img src="{{ asset($advertisement->image) }}" alt="Advertisement" class="w-80 h-10">
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                                {{ $advertisement->size }}</td>
                            <td class="px-6 py-4">
                                <button class="toggle-status-button text-sm w-20 rounded-lg p-2"
                                    data-id="{{ $advertisement->id }}" data-status="{{ $advertisement->status }}"
                                    style="background-color: {{ $advertisement->status ? 'green' : 'red' }}; color:white;">
                                    {{ $advertisement->status ? 'Enable' : 'Disable' }}
                                </button>
                            </td>
                            <td class="px-2 py-4 flex space-x-2">
                                <!-- Edit and Delete Buttons -->
                                <button
                                    onclick="Edit_AdsForm({{ $advertisement->id }}, {{ $category->category_id }}, '{{ $advertisement->image }}', {{ $advertisement->status ? 'true' : 'false' }})"
                                    type="button" class="icon-edit p-2">
                                    <i class="fa-solid fa-pen-to-square text-lg" style="color: #02ca41;"></i>
                                </button>

                                <!-- Edit Form -->
                                <!-- Edit Form -->
                                <div id="editAdsForm" class="flex hidden h-full justify-center fixed inset-0 scroll-smooth bg-gray-800 bg-opacity-50 z-40">
                                    <form method="POST" enctype="multipart/form-data" class="mt-4 pb-10 bg-white w-2/6 h-auto">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <div class="flex justify-between">
                                                <div class="add-cat-text py-6 px-4">
                                                    <h1 class="text-gray-700 font-medium text-2xl">Edit Advertisement</h1>
                                                </div>
                                                <div class="py-6 px-4 cursor-pointer" onclick="Edit_Ads_toggleForm()">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-300">
                                            </div>
                                            <!-- Form Fields -->
                                            <div name="size" class="mt-6 px-4">
                                                <h3 for="size" class="font-semibold text-gray-900 dark:text-gray">Select the size <span class="text-red-700">*</span></h3>
                                                <select name="size" id="edit_size" class="bg-white-50 border border-white-300 text-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                                                    <option value="920 * 120">920 * 120</option>
                                                </select>
                                                @error('size')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mt-6 px-4">
                                                <h3 for="categories" name="categories" class="font-semibold text-gray-900 dark:text-gray">Category<span class="text-red-700">*</span></h3>
                                                <select name="category_id" id="edit_categories" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray">
                                                    <option value="" disabled selected>Choose a category</option>
                                                    @foreach ($categories as $category)
                                                        @if ($category->status)
                                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="flex items-center justify-center">
                                                <div class="mt-6 px-4 mr-4 ml-8">
                                                    <div id="editImagePreview" class="mb-2 w-40 h-40 flex items-center justify-center relative">
                                                        <!-- Image and remove button will be inserted here -->
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" id="editUploadButton" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                            <i class="fa-solid fa-upload"></i>
                                                            Upload Ad Image
                                                        </button>
                                                        <input type="file" name="image" id="editImage" class="hidden" accept="image/jpeg,image/png,image/gif" />
                                                        <button type="button" onclick="removePreview('editImagePreview', 'editImage')" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                                            <i class="fa-solid fa-trash"></i>
                                                            Remove Image
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-6 px-4">
                                                <input type="hidden" name="status" value="0">
                                                <label class="inline-flex items-center mb-5 cursor-pointer">
                                                    <input type="checkbox" name="status" id="edit_status" value="1" class="status-checkbox sr-only peer">
                                                    <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-cyan-300 dark:peer-focus:ring-sky-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-sky-600"></div>
                                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-700">Disable or Enable</span>
                                                </label>
                                            </div>
                                            <div class="mt-2">
                                                <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-300">
                                                <div class="px-4">
                                                    <button type="submit" class="text-white w-full bg-gradient-to-r from-cyan-500 via-cyan-600 to-cyan-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <button
                                    onclick="Delete_toggleForm('advertisement', {{ $advertisement->id }}, '{{ $advertisement->size }}')"
                                    type="button" class="icon-delete p-2">
                                    <i class="fa-solid fa-trash text-lg" style="color: #ca0202;"></i>
                                </button>
                                <div id="deleteForm"
                                    class="hidden flex justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                    <form action="{{ route('admin.advertisement.delete', $advertisement->id) }}"
                                        method="POST" class="mt-14 bg-white w-1/3 h-72 rounded-lg">
                                        @csrf
                                        @method('DELETE')
                                        <div>
                                            <div class="flex justify-between">
                                                <div class="add-cat-text py-6 px-4">
                                                    <h1 class="text-gray-700 font-medium text-2xl">Delete Advertisement
                                                    </h1>
                                                </div>
                                            </div>
                                            <div>
                                                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-300">
                                            </div>
                                            <div class="justify-items-center mt-4">
                                                <div>
                                                    <i class="fa-solid fa-circle-exclamation text-4xl"></i>
                                                </div>
                                                <div class="mt-6">
                                                    <h3 class="text-lg">Are you sure you want to delete this advertisement?
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="flex justify-center gap-12 px-10 py-10">
                                                <div>
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                                </div>
                                                <div onclick="Delete_toggleForm()">
                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cancel</button>
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
            <div class="mt-4 text-gray">
                {{ $ads->links() }}

            </div>

        </div>

        <!-- Pagination Links -->

    </div>
@endsection
