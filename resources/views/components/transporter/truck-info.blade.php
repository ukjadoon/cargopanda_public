<li class="col-span-1 flex shadow-sm rounded-md">
    <div class="flex-shrink-0 flex items-center justify-center w-16 bg-purple-600 text-white text-sm leading-5 font-medium rounded-l-md">
    @php
        $split = Str::of($truckDoc['name'])->split('/[\s,]+/');
        $split = $split[0][0] . $split[1][0];
    @endphp
    {{ $split }}
    </div>
    <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
    <div class="flex-1 px-4 py-2 text-sm leading-5 truncate">
        <a href="{{ route('transporter-truck-documentation', ['slug' => $truckDoc['slug']]) }}" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">{{ $truckDoc['name'] }}</a>
        <p class="text-gray-500">12 Members</p>
    </div>
    </div>
</li>