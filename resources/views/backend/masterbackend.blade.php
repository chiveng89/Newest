<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Include CSS and JS files --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ URL('assets/js/css/backend.css') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/5041c59df8.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- <title>@yield('title', 'Admin Panel')</title> --}}

    {{-- Custom Styles --}}

</head>

<body class="text-gray-800 font-inter">
    <!--sidenav -->
    <div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
        <a href="/admin/dashboard" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="{{ URL('assets/js/image/ppm.jpg') }}"
                class="size-16 p-1 img-fluid ${1|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                alt="">
            <h2 class="font-bold text-2xl">NEWS<span class="bg-[#0284c7] text-white px-2 rounded-md">CMS</span></h2>
        </a>
        <ul class="mt-4">
            <span class="text-gray-400 font-bold">ADMIN</span>
            <li class="mb-1 group">
                <a href="/admin/dashboard"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-sky-500 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-home mr-3 text-lg'></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <span class="text-gray-400 font-bold">BLOG</span>
            <li class="mb-1 group">
                <a href=""
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-sky-500 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-sky-500 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='bx bx-news mr-3 text-lg'></i>
                    <span class="text-sm">Post</span>
                    <i class="ri-arrow-up-s-line ml-auto group-[.selected]:rotate-180"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block sidebar-dropdown-menu">
                    <li class="mb-4">
                        <a href="/admin/allnews"
                            class="text-gray-900 text-sm flex items-center hover:text-[#0284c7] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All
                            News</a>
                    </li>
                    <li class="mb-4">
                        <a href="/admin/addnews"
                            class="text-gray-900 text-sm flex items-center hover:text-[#0284c7] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Add
                            News</a>
                    </li>
                    <li class="mb-4">
                        <a href="/admin/categories"
                            class="text-gray-900 text-sm flex items-center hover:text-[#0284c7] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Add
                            Categories</a>
                    </li>
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="/admin/advertisement"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-sky-500 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-sky-500 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-rectangle-ad mr-3 text-lg"></i>
                    <span class="text-sm">Advertisement</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        <div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-900 font-semibold sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
                    <ul class="ml-auto flex items-center">
                {{-- <li class="mr-1 dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;">
                            <path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                        </svg>
                    </button>
                </li> --}}
                <button id="fullscreen-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: #808080;">
                        <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
                    </svg>
                </button>
                <button class="rounded-full pr-2 pl-4 ">
                    <a href="/">
                        <i class="fa-solid fa-globe #808080 w-6"></i>
                    </a>

                </button>
                <li class="dropdown ml-3 flex gap-6">
                    {{-- <button type="button" class="dropdown-toggle flex items-center">
                            <div class="flex-shrink-0 w-10 h-10 relative">
                                <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                                    <i class="fa-solid fa-user p-2 w-8 h-8 rounded-full"></i>
                                    <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                                    <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                                </div>
                            </div>
                        </button> --}}
                    {{-- <div class="p-2 md:block text-left">
                                <h2 class="text-sm font-semibold text-gray-800">Admin</h2>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div> --}}
                    <div>
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
                            type="button">Admin<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10  hidden bg-white mr-40  divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-white-700">
                            <ul class="py-2  text-sm text-gray-700 dark:text-gray-700"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="/admin" class="block px-4 py-2 hover:bg-gray-100 ">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            {{-- <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a role="menuitem" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                   Log Out
                                </a>
                            </form> --}}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @yield('content')
        @section('content')

        <!-- end navbar -->
        {{-- Main content --}}
        {{-- @yield('content') --}}
    </main>

    <script type="text/javascript" {{ URL('assets/js/script.js') }}
        src={{ URL('assets/js/tinymce/js/tinymce/tinymce.min.js') }} referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#myTextarea',
            // width: 0,
            // height: 300,

            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime',
                'media', 'table', 'emoticons', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
            content_css: 'css/content.css'
        });
    </script>
    <script src="{{ URL('assets/js/Java-Script/script-backend.js') }}"></script>
    <script src="{{ URL('assets/js/Java-Script/image.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script type="importmap">

        {
            "imports": {
                "https://esm.sh/v135/prosemirror-model@1.22.3/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.19.3/es2022/prosemirror-model.mjs",
                "https://esm.sh/v135/prosemirror-model@1.22.1/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.19.3/es2022/prosemirror-model.mjs"
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

</body>

</html>
