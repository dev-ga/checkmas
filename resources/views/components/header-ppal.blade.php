{{-- <header class="header bg-check-blue shadow py-4 px-4">
    <div class="header-content flex items-center flex-row">

            <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

        <div x-data="{ dropdownOpen: false }"  class="flex ml-auto relative">
            <button @click="dropdownOpen = ! dropdownOpen" class="flex flex-row items-center">
                <img src="https://pbs.twimg.com/profile_images/378800000298815220/b567757616f720812125bfbac395ff54_normal.png" alt class="h-10 w-10 bg-gray-200 border rounded-full" />
                <span class="flex flex-col ml-2">
                    <span class="truncate w-30 font-semibold text-white tracking-wide leading-none">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
                    <span class="truncate w-30 text-white text-xs leading-none mt-1">{{ Auth::user()->email }}</span>
                </span>
            </button>

            <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

            <div x-cloak x-show="dropdownOpen" class="absolute right-0 z-10 w-48 mt-16 overflow-hidden bg-white rounded-md shadow-xl">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-italblue hover:text-white">Profile</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-italblue hover:text-white">Logout</a>
            </div>
        </div>
    </div>
</header> --}}

<header class="header bg-check-blue shadow py-4 px-4">
    <div class="header-content flex items-center flex-row">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        {{-- <div class="flex ml-auto">
            <a href class="flex flex-row items-center">
                <img src="https://pbs.twimg.com/profile_images/378800000298815220/b567757616f720812125bfbac395ff54_normal.png" alt class="h-10 w-10 bg-gray-200 border rounded-full" />
                <span class="flex flex-col ml-2">
                    <span class="truncate w-20 font-semibold tracking-wide leading-none">John Doe</span>
                    <span class="truncate w-20 text-gray-500 text-xs leading-none mt-1">Manager</span>
                </span>
            </a>
        </div> --}}
        <div x-data="{ dropdownOpen: false }"  class="flex ml-auto relative">
            <button @click="dropdownOpen = ! dropdownOpen" class="flex flex-row items-center">
                <img src="https://pbs.twimg.com/profile_images/378800000298815220/b567757616f720812125bfbac395ff54_normal.png" alt class="h-10 w-10 bg-gray-200 border rounded-full" />
                <span class="flex flex-col ml-2">
                    <span class="truncate w-20 font-semibold tracking-wide leading-none">{{ Auth::user()->email }}</span>
                    <span class="truncate w-20 text-gray-500 text-xs leading-none mt-1">{{ Auth::user()->email }}</span>
                </span>
            </button>

            <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

            <div x-cloak x-show="dropdownOpen" class="absolute right-0 z-10 w-48 mt-16 overflow-hidden bg-white rounded-md shadow-xl">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-italblue hover:text-white">Profile</a>
                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-italblue hover:text-white">Products</a> --}}
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-italblue hover:text-white">Logout</a>
            </div>
        </div>
    </div>
</header>
