<div class="bg-white shadow-lg rounded-lg p-10 mb-8">
    <form>
        <div>
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $organizationDoc['name'] }}
                    </h3>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                        {{ $organizationDoc['description'] }}
                    </p>
                    @if ($pivot)
                    <p class="mt-1 text-sm leading-5 text-gray-700 font-semibold">Status: {{ $pivot[0]['pivot']['status'] }}</p>
                        @if ($pivot[0]['pivot']['comment'])
                        <p class="mt-1 text-sm leading-5 text-gray-500">Comment: {{ $pivot[0]['pivot']['comment'] }}</p>
                        @endif
                    @endif
                </div>
                <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
                    <livewire:transporter-upload-document :document="$organizationDoc" :type="$type" :key="$organizationDoc['id']" />
                </div>
            </div>
        </div>
    </form>
</div>

