@extends('backend.masterbackend')
@section('content')
    <div class="bg-white mx-10 my-10 rounded-md">
        <div class="flex justify-between px-5 py-5 z-30 ">
            <div class=" mt-2 items-center">
                <label for="" class=" ">Add New Post</label>
            </div>
        </div>
    </div>
    <div class="px-10">
        <div class="bg-white  p-10 rounded-md">

            <form id="newsForm" action="{{ route('admin.addnews.store') }}" method="POST" enctype="multipart/form-data" class="">
                @csrf
                <div>
                    <div class="my-6">
                        <h3 for="text" class="font-semibold mt-4 text-gray-900 dark:text-gray">Categories <span
                                class="text-red-700 ">*</span></h3>
                        <form action="max-w-sm mx-auto my-4">
                            <select name="category_id" id="categories"
                                class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray ">
                                <option selected>Choose a category</option>
                                @foreach ($categories as $category)
                                    @if ($category->status)
                                        <option value="{{ $category->category_id }}" id="nav-{{ $category->category_name }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm ">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                </div>
                <div class="mb-4">
                    <div>
                        <h3 for="" class="font-semibold text-gray-900 dark:text-gray">News Title <span
                                class="text-red-700">*</span></h3>
                        <input type="text" name="title" id="default-input"
                            class="bg-gray-50 border @error('title') border-red-500 @else border-gray-300 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-white-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <h3 for="text" class="font-semibold text-gray-900 dark:text-gray">Slug <span
                            class="text-red-700">*</span></h3>
                    <input type="text" name="slug" id="slug"
                        class="bg-gray-50 border @error('slug') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('slug')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <h3 for="" class="font-semibold text-gray-900 dark:text-gray">Short Description <span
                            class="text-red-700">*</span></h3>
                    <textarea name="short_description" id="" cols="30" rows="2" class="w-full rounded-md"></textarea>
                    @error('short_description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full ">
                    <div>
                        <h3 for="" class=" font-semibold text-gray-900 dark:text-gray">Description Detail<span
                                class="text-red-700">*</span></h3>
                        <div class="flex grid-rows-2 gap-1 w-full">
                            <div class="w-svw">
                                <textarea name="long_description" id="myTextarea" class="text-area"></textarea>
                            </div>
                        </div>
                        @error('long_description')
                            <span class="text-red-500 text-sm">{{ $message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="my-8">
                    <div>
                        <h3 for="" class="font-semibold text-gray-900 dark:text-gray">Image <span class="text-red-700">*</span></h3>
                    </div>
                    <div class="container my-4 bg-white p-6 rounded-lg shadow-md">
                        <div id="upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition">
                            <i class="fas fa-plus-circle text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-600">Click to Upload Images</p>
                            <input type="file" name="image" id="upload-img" multiple class="hidden"/>
                        </div>
                        <div id="img-preview" class="flex flex-wrap gap-4 mt-6 justify-center items-center">
                            <div class="relative w-[350px] h-[200px] justify-center items-center border border-gray-200 rounded-lg shadow-md overflow-hidden hidden">
                                <img src="" class="max-w-full  object-cover rounded-md transition-all" alt="Preview">
                                <button>
                                    <i class="fa-regular fa-circle-xmark absolute top-1 right-1 bg-red-500 text-white w-6 h-6 rounded-full text-sm flex items-center justify-center hover:bg-red-600"></i>
                                </button>
                            </div>
                        </div>
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- End of image --}}
                <div>
                    <h3 class="my-8 font-semibold text-gray-900 dark:text-gray ">Article Position <span
                            class="text-red-700">*</span></h3>
                    <div class="container flex  grid-cols-4 gap-8 justify-between">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-700">Add to Slider</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-700">Add to Home</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-700">Add to Related
                                view</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-700">Add to Most View</span>
                        </label>
                    </div>
                    @error('article_positions')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div class="btn-summit my-16 ">
                    <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5">Submit</button>
                </div>
        </div>
    </div>
</form>

</div>
</div>
@endsection
