<div>
    <div wire:ignore>
        <img id="document" class="min-w-full w-1/2"
            src="{{ route('admin-show-organization-doc-source', ['documentId' => $documentId, 'organizationId' => $organizationId]) }}"
            data-zoom="{{ route('admin-show-organization-doc-source', ['documentId' => $documentId, 'organizationId' => $organizationId]) }}" />
        <p id="detail"></p>
    </div>

    <div class="py-2">
        <div wire:ignore>
            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Expire date for the document</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="datepicker" class="form-input block w-full pl-10 sm:text-sm sm:leading-5"
                    autocomplete="off">
            </div>
        </div>
    </div>
    @if($showApproveButton)
    <div class="py-2">
        <span class="inline-flex rounded-md shadow-sm">
            <button type="button"
                wire:click.prevent="updatePivot"
                class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                <svg class="-ml-1 mr-3 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
                Approve date
            </button>
        </span>
    </div>
    @endif
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
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        onSelect: function (date) {
            var dateString = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
            @this.call('updateExpireDate', dateString);
        }
    });

</script>
@endpush
