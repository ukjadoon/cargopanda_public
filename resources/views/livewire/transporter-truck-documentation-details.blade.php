<div>
    @forelse($truckDocs as $organizationDoc)
    <livewire:transporter-doc-handler :organizationDocId="$organizationDoc['id']" type="truck_doc" :truckId="$truckId" :key="(string) rand()" />
    @empty
    No organization docs defined
    @endforelse
</div>
