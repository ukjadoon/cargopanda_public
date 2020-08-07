<div>
    @foreach($truckDocs as $truckDoc)
        <livewire:create-update-truck-docs :truckDocId="$truckDoc['id']" :key="$truckDoc['id']" />
    @endforeach
    <div>
        @foreach($newTruckDocs as $key => $truckDoc)
            <livewire:create-update-truck-docs :key="'one'.rand()" />
        @endforeach
        <span class="inline-flex rounded-md shadow-sm" wire:click.prevent="addNewTruckDoc">
            <a href="#"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
            Add new
            </a>
        </span>
    </div>
</div>
