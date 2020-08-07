<div>
    @foreach($trucks as $truckModel)
        <div>
            <livewire:create-update-truck :truckId="$truckModel['id']" :key="$truckModel['id']" />
        </div>
    @endforeach
</div>
