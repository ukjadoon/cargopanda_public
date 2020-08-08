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
                </div>
                <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
                    <x-transporter.upload-document :logo="$logo" :document="$document"></x-transporter.upload-document>
                </div>
            </div>
        </div>
    </form>
</div>

