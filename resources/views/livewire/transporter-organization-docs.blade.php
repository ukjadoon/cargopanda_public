<div>
    @forelse($organizationDocs as $organizationDoc)
    <livewire:transporter-doc-definition-handler :organizationDocId="$organizationDoc['id']" type="organization_doc" :key="(string) rand()" />
    @empty
    No organization docs defined
    @endforelse
</div>
