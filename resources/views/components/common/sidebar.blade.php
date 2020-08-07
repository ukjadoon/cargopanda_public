<!-- Static sidebar for desktop -->
<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-white">
        <div class="flex items-center flex-shrink-0 px-4 justify-center">
            <img class="h-20 w-auto" src="/img/cargopanda_logo_indigo.svg" alt="Cargo Panda">
        </div>
        <div class="mt-5 h-0 flex-1 flex flex-col overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</div>
