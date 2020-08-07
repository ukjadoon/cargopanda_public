<x-common.sidebar>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <nav class="flex-1 px-2 bg-white">
        <a href="{{ route('transporter-dashboard') }}"
            class="group flex items-center px-2 py-2 text-sm leading-5 font-medium {{ request()->routeIs('transporter-dashboard') ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100' }} rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
            <svg class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>
        <a href="{{ route('transporter-checklist') }}"
            class="group flex items-center px-2 py-2 text-sm leading-5 font-medium {{ request()->routeIs('transporter-checklist') ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100' }} rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
            <svg class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            Checklist
        </a>
        <a href="{{ route('transporter-organization-documentation') }}"
            class="group flex items-center px-2 py-2 text-sm leading-5 font-medium {{ request()->routeIs('transporter-organization-documentation') ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100' }} rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
            <svg class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
            Organization Docs
        </a>
        <!--a href="#"
            class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
            <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Calendar
        </a-->
        <a href="{{ route('transporter-trucks') }}"
            class="group flex items-center px-2 py-2 text-sm leading-5 font-medium {{ request()->routeIs('transporter-trucks') ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100' }} rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
            <svg class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 17C9 18.1046 8.10457 19 7 19C5.89543 19 5 18.1046 5 17C5 15.8954 5.89543 15 7 15C8.10457 15 9 15.8954 9 17Z" fill="white"/>
            <path d="M19 17C19 18.1046 18.1046 19 17 19C15.8954 19 15 18.1046 15 17C15 15.8954 15.8954 15 17 15C18.1046 15 19 15.8954 19 17Z" fill="white"/>
            <path d="M13 16H14H13ZM13 8H12V8L13 8ZM17.2929 7.29289L18 6.58579L18 6.58579L17.2929 7.29289ZM20.7071 10.7071L21.4142 10V10L20.7071 10.7071ZM4 6H12V4H4V6ZM12 6V16H14V6H12ZM4 16V6H2V16H4ZM5 16H4V18H5V16ZM12 16H9V18H12V16ZM2 16C2 17.1046 2.89543 18 4 18V16H2ZM12 16V18C13.1046 18 14 17.1046 14 16H12ZM12 6H12H14C14 4.89543 13.1046 4 12 4V6ZM4 4C2.89543 4 2 4.89543 2 6H4V6V4ZM14 16L14 8L12 8L12 16H14ZM14 8H16.5858V6H14V8ZM20 11.4142V16H22V11.4142H20ZM16.5858 8L20 11.4142L21.4142 10L18 6.58579L16.5858 8ZM15 16H14V18H15V16ZM20 16H19V18H20V16ZM22 11.4142C22 10.8838 21.7893 10.3751 21.4142 10L20 11.4142L20 11.4142H22ZM16.5858 8L16.5858 8L18 6.58579C17.6249 6.21071 17.1162 6 16.5858 6V8ZM12 16C12 17.1046 12.8954 18 14 18V16H14H12ZM20 16V18C21.1046 18 22 17.1046 22 16H20ZM14 8V8V6C12.8954 6 12 6.89543 12 8H14ZM8 17C8 17.5523 7.55228 18 7 18V20C8.65685 20 10 18.6569 10 17H8ZM7 18C6.44772 18 6 17.5523 6 17H4C4 18.6569 5.34315 20 7 20V18ZM6 17C6 16.4477 6.44772 16 7 16V14C5.34315 14 4 15.3431 4 17H6ZM7 16C7.55228 16 8 16.4477 8 17H10C10 15.3431 8.65685 14 7 14V16ZM18 17C18 17.5523 17.5523 18 17 18V20C18.6569 20 20 18.6569 20 17H18ZM17 18C16.4477 18 16 17.5523 16 17H14C14 18.6569 15.3431 20 17 20V18ZM16 17C16 16.4477 16.4477 16 17 16V14C15.3431 14 14 15.3431 14 17H16ZM17 16C17.5523 16 18 16.4477 18 17H20C20 15.3431 18.6569 14 17 14V16Z" fill="currentColor"/>
            </svg>
            Trucks
        </a>
    </nav>
</x-common.sidebar>
