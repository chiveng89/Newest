@extends('backend.masterbackend')
@section('content')
<div class="bg-white mx-10 my-10 rounded-md">
    <div class="flex justify-between px-5 py-5 z-30 ">
        <div class=" mt-2 items-center">
            <label for="" class=" ">All Advertisement</label>
        </div>
        <div class="">
            <button onclick="Ads_toggleForm()" class="bg-cyan-50 hover:bg-cyan-500 hover:text-white text-cyan-700 font-blod py-2 px-4 border border-cyan-600 rounded">
                <a>
                   <i class="fa-solid fa-plus"></i>
                        Add New Advertisement
                </a>
            </button>
        </div>
    </div>
</div>
<div id="adsForm" class="flex hidden justify-center fixed inset-0 scroll-smooth bg-gray-800 bg-opacity-50 z-40">
    <form action="{{ route('admin.advertisement.store')}}" method="POST" enctype="multipart/form-data" class=" mt-4 pb-10 bg-white w-2/6 h-70   rounded-lg ">
        @csrf
        <div class="flex justify-between">
            <div class="add-cat-text py-6 px-4">
                <h1 class="text-gray-700 font-medium text-2xl">Add new Advertisement </h1>
            </div>
            <div class="py-6 px-4 cursor-pointer" onclick="Ads_toggleForm()">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div>
            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-300">
        </div>
        <div name="size" class="mt-6 px-4">
                <h3 for="countries" class="font-semibold text-gray-900 dark:text-gray">Select the size <span class="text-red-700">*</span></h3>
                {{-- <select name="size" id="size" class="mt-4 bg-white-500 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark focus:border-blue-500">
                    <option value="920x120">920 x 120</option>
                </select> --}}
                <input type="text" name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('size')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
        </div>
        <div class="mt-6  px-4">
            <h3 for="categories" name="categories" class=" font-semibold text-gray-900 dark:text-gray">Category<span class="text-red-700">*</span></h3>
            <select name="category_id" id="categories" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray">
                <option value="" disabled selected>Choose a category</option>
                @foreach ($categories as $category)
                    @if ($category->status)
                        <option value="{{ $category->category_id }}">
                            {{ $category->category_name }}
                        </option>
                    @endif
                @endforeach
            </select>

                @error('category_id')
                    <span class="text-red-500 text-sm ">{{ $message }}</span>
                @enderror
        </div>
        <div class="mt-6 px-4">
            <div>
                <h3 for="image" class="mb-4 font-semibold text-gray-900 dark:text-gray">Image<span class="text-red-700 ">*</span></h3>
            </div>
            <div class="flex justify-center mb-10">
                <label for="dropzoneFileInput" class="relative flex flex-col justify-center items-center w-full h-60 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 overflow-hidden" id="dropzone-label">
                    <div id="placeholder" class="flex flex-col items-center justify-center pt-5">
                        <svg class="w-15 h-8 mb-12 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">JPG, PNG, or GIF</p>
                        <input name="image" type="file" id="image" class="hidden" accept=".jpg, .jpeg, .png, .gif" />
                    </div>
                    <img id="preview-image" class="hidden w-[920px] h-[120px] object-cover transition-opacity duration-300 ease-in-out" />
                    <i id="remove-image" class="hidden fa-regular fa-circle-xmark absolute top-2 right-2 text-2xl text-red-600 cursor-pointer"></i>
                </label>
            </div>

             @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
        	 @enderror
            <!-- Ads Form -->
            <div id="adsForm" class="hidden mt-5 p-4 border border-gray-300 rounded bg-gray-100">
                <h3 class="text-lg font-semibold mb-3">Ads Form</h3>
                <input type="text" class="w-full mb-3 p-2 border rounded" placeholder="Enter Ad Title" />
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Submit</button>
            </div>
        </div>
        <div class="">
            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-30 0">
            <div class="px-4">
                <button type="summit" class=" text-white w-full bg-gradient-to-r from-cyan-500 via-cyan-600 to-cyan-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Summit</button>
            </div>
        </div>
    </form>
</div>
    <div class=" mx-10 my-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 shadow-md rounded-md">
                <thead class="text-xs text-slate-50 uppercase bg-sky-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                No
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Size
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ads as $advertisement)
                    <tr class="bg-white border-b dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                           {{ $loop->iteration }}
                        </td>
                        <td class="px-5 py-4 font-medium text-gray-900 ">
                            <img src="{{ asset($advertisement->image) }}" alt="Advertisement" class="w-20 h-auto rounded-lg">

                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                            {{ $advertisement->size }}
                        </td>
                        <td class="px-6 py-4">
                            <button class="toggle-status-button text-sm w-20 rounded-lg py-1 px-4"
                                data-id="{{ $advertisement->id }}"
                                data-status="{{ $advertisement->status }}"
                                style="background-color: {{ $advertisement->status ? 'green' : 'red' }}; color:white;">
                                {{ $advertisement->status ? 'Enable' : 'Disable' }}
                            </button>
                        </td>

                        <td class="px-2 py-4 flex space-x-2">
                            <button onclick="Edit_toggleForm()" type="button" class="icon-edit p-2">
                                <a href="#" class="">
                                    <i class="fa-solid fa-pen-to-square text-lg" style="color: #02ca41;"></i>
                                </a>
                            </button>
                            <div id="editForm" class="hidden flex  justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                <form action="" class="mt-14 bg-white w-2/6 h-80 rounded-lg">
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
                                            <input type="text" id="default-input" class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        </div>
                                        <div class="mt-12">
                                            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-300">
                                            <div class="px-4">
                                                <button type="submit" class="text-white w-full bg-gradient-to-r from-cyan-500 via-cyan-600 to-cyan-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <button onclick="Delete_toggleForm()" type="button" class="icon-delete p-2">
                                <a href="#">
                                    <i class="fa-solid fa-trash text-lg" style="color: #ca0202;"></i>
                                </a>
                            </button>
                            <div id="deleteForm" class="hidden flex  justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                <form action="" class="mt-14 bg-white w-1/4 h-72 rounded-lg">
                                    <div>
                                        <div class="flex justify-between">
                                            <div class="add-cat-text py-6 px-4">
                                                <h1 class="text-gray-700 font-medium text-2xl">Delete News</h1>
                                            </div>

                                        </div>
                                        <div>
                                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-300">
                                        </div>
                                        <div class=" justify-items-center mt-4">
                                            <div>
                                                <i class="fa-solid fa-circle-exclamation text-4xl   " ></i>
                                            </div>
                                            <div class="mt-6">
                                                <h3 class="text-lg">Are you sure you want to delete this post?</h3>
                                            </div>
                                        </div>
                                        <div class="flex justify-center gap-12  px-10 py-10 ">
                                            <div>
                                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                            </div>
                                            <div onclick="Delete_toggleForm()">
                                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </div>
        </div>

@endsection
