<div>
    <img
        id="document"
        class="min-w-full w-1/2"
        src="{{ route('admin-show-organization-doc-source', ['documentId' => $documentId, 'organizationId' => $organizationId]) }}" 
        data-zoom="{{ route('admin-show-organization-doc-source', ['documentId' => $documentId, 'organizationId' => $organizationId]) }}" 
    />
    <p id="detail"></p>
</div>

<div>
    <input type="text" id="datepicker" />
</div>

@push('scripts')
<script type="text/javascript">
new Drift(document.getElementById('document'), {
			paneContainer: document.getElementById('detail'),
			inlinePane: 900,
			inlineOffsetY: -85,
			containInline: true,
			hoverBoundingBox: true
        });
var picker = new Pikaday({ field: document.getElementById('datepicker'), onSelect: function(date) {
        console.log(date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate());
    } });
</script>
@endpush
