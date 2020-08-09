<x-transporter.dashboard-template>
    <x-common.content-heading heading="{{ $truck->name }}">
        <livewire:transporter-truck-documentation-details :truckId="$truck->id" />
    </x-common.content-heading>
</x-transporter.dashboard-template>