@extends('backend.masterbackend')

@section('content')
    <div class="bg-white mx-10 my-10 rounded-md">
        <div class="flex justify-between px-5 py-5 z-30">
            <div class="mt-2 items-center">
                <label for="" class="">All News</label>
            </div>
            <div class="">
                <button class="bg-cyan-50 hover:bg-cyan-500 hover:text-white text-cyan-700 font-bold py-2 px-4 border border-cyan-600 rounded">
                    <a href="/admin/addnews">
                        <i class="fa-solid fa-plus"></i>
                        Add New Post
                    </a>
                </button>
            </div>
        </div>
    </div>

    <div class="mx-10 my-10">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 shadow-md rounded-md">
                <thead class="text-xs text-slate-50 uppercase bg-sky-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex item-center">Category</div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex-item-center">Title</div>
                        </th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addnews as $addnew)
                        <tr class="bg-white border-b dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray">
                                {{ $addnew->created_at->format('d/M/Y') }}
                            </td>

                            <td class="px-6 py-4">
                                @if($addnew->images)
                                    @foreach(json_decode($addnew->images, true) as $imagePath)
                                        <img src="{{ asset('uploads/' . $imagePath) }}" class="img-fluid max-w-36 rounded-md mb-2" alt="News Image">
                                    @endforeach
                                @else
                                    <p>No images found.</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray">
                                {{ $addnew->category }} <!-- Assuming 'category' is a simple field, adjust if it's related -->
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray">
                                {{ $addnew->title }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray">
                                {{ $addnew->short_description }}
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" class="text-[#22c55e] bg-green-100 border border-green-500 rounded-lg text-sm w-20">
                                    {{ $addnew->status ? 'Enable' : 'Disable' }}
                                </button>
                            </td>
                            <td class="px-2 py-4 flex gap-3 mt-2.5 mb-2.5">
                                <button onclick="Edit_toggleForm({{ $addnew->addnews_id }}, '{{ $addnew->title }}', '{{ $addnew->short_description }}', {{ $addnew->status }})" type="button" class="icon-edit p-5">
                                    <i class="fa-solid fa-pen-to-square text-lg" style="color: #02ca41;"></i>
                                </button>

                                <div  id="editForm-{{ $addnew->addnews_id }}" class="hidden flex justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                    <form action="{{ route('admin.addnews.update', $addnew->addnews_id) }}" method="POST" class="mt-14 bg-white w-2/6 h-80 rounded-lg">
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
                                                <input type="text" name="category" value="{{ $addnew->category }}" class="mt-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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

                                <button onclick="Delete_toggleForm({{ $addnew->addnews_id }})" type="button" class="icon-delete">
                                    <i class="fa-solid fa-trash text-lg" style="color: #ca0202;"></i>
                                </button>
                                <div id="deleteForm-{{ $addnew->addnews_id }}" class="hidden flex justify-center fixed inset-0 bg-gray-800 bg-opacity-50 z-40">
                                    <form action="{{ route('admin.addnews.delete', $addnew->addnews_id) }}" method="POST" class="mt-14 bg-white w-1/4 h-72 rounded-lg">
                                        @csrf
                                        @method('DELETE')
                                        <div>
                                            <div class="flex justify-between">
                                                <div class="add-cat-text py-6 px-4">
                                                    <h1 class="text-gray-700 font-medium text-2xl">Delete News</h1>
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
                                                    <h3 class="text-lg">Are you sure you want to delete this post?</h3>
                                                </div>
                                            </div>
                                            <div class="flex justify-center gap-12 px-10 py-10">
                                                <div>
                                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
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
            </table>
        </div>
    </div>
@endsection
