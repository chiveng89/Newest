
@extends('backend.masterbackend')
@section('content')

<div class="dashboard ">
    <div>
        <div class="flex grid-rows-4 place-items-center gap-8 my-20 mx-10 ">

                <a href="/admin/allnews" class=" place-items-center bg-white py-6  px-4 flex grid-rows-3 gap-12  justify-center  w-full  rounded-md ">
                    <i class="fa-regular fa-newspaper  text-3xl text-sky-600 "></i>
                    <h2 class=" text-lg text-sky-600 ">All News</h2>
                    <i class="fa-solid fa-chevron-right  text-2xl text-sky-600"></i>
                </a>

                <a href="/admin/addnews" class="place-items-center bg-white py-6 px-4 flex grid-rows-3 gap-10  justify-center  w-full  rounded-md ">
                    <i class="fa-regular fa-pen-to-square  text-3xl text-sky-600 "></i>
                    <h2 class=" text-lg text-sky-600 ">Add News</h2>
                    <i class="fa-solid fa-chevron-right  text-2xl text-sky-600"></i>
                </a>
                <a href="/admin/categories" class="place-items-center bg-white py-6 px-4 flex grid-rows-3 gap-12  justify-center  w-full  rounded-md ">
                    <i class="fa-solid fa-list  text-3xl text-sky-600 "></i>
                    <h2 class=" text-lg text-sky-600 ">Category</h2>
                    <i class="fa-solid fa-chevron-right  text-2xl text-sky-600"></i>
                </a>

                <a href="/admin/advertisement" class="place-items-center bg-white py-6 px-4 flex grid-rows-3 gap-12  justify-center  w-full  rounded-md ">
                    <i class="fa-solid fa-rectangle-ad text-3xl text-sky-600 "></i>
                    <h2 class=" text-lg text-sky-600 ">Advertisement</h2>
                    <i class="fa-solid fa-chevron-right  text-2xl text-sky-600"></i>
                </a>
        </div>

    </div>
</div>
@endsection

