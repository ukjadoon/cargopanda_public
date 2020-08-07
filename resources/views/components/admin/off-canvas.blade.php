<x-common.off-canvas>
    <nav class="px-2">
        <a href="{{ route('admin-dashboard') }}"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium {{ request()->routeIs('admin-dashboard') ? 'text-gray-900 focus:bg-gray-200 bg-gray-100' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 focus:text-gray-900 focus:bg-gray-100' }} rounded-md focus:outline-none transition ease-in-out duration-150">
            <svg class="mr-4 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>
        <a href="{{ route('admin-checklist') }}"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium {{ request()->routeIs('admin-checklist') ? 'text-gray-900 focus:bg-gray-200 bg-gray-100' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 focus:text-gray-900 focus:bg-gray-100' }} rounded-md focus:outline-none transition ease-in-out duration-150">
            <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Checklist
        </a>
        <a href="{{ route('admin-organization-documentation') }}"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium {{ request()->routeIs('admin-organization-documentation') || request()->routeIs('backend-client-create') || request()->routeIs('backend-client-edit') ? 'text-gray-900 focus:bg-gray-200 bg-gray-100' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 focus:text-gray-900 focus:bg-gray-100' }} rounded-md focus:outline-none transition ease-in-out duration-150">
            <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
            </svg>
            Organization
        </a>
        <a href="{{ route('admin-truck-documentation') }}"
            class="group flex items-center px-2 py-2 text-base leading-6 font-medium {{ request()->routeIs('admin-truck-documentation') || request()->routeIs('backend-campaign-create') || request()->routeIs('backend-campaign-edit') ? 'text-gray-900 focus:bg-gray-200 bg-gray-100' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 focus:text-gray-900 focus:bg-gray-100' }} rounded-md focus:outline-none transition ease-in-out duration-150">
            <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Truck
        </a>
    </nav>
</x-common.off-canvas>
