@extends('layouts.app')
@section('content')
<div class="h-screen flex overflow-hidden bg-gray-100" x-data="{menu: false}">
    <x-admin.off-canvas></x-admin.off-canvas>
    <x-admin.sidebar></x-admin.sidebar>

    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <x-common.hamburger-menu></x-common.hamburger-menu>
            <div class="flex-1 px-4 flex justify-between">
                <x-common.search-bar></x-common.search-bar>
                <div class="ml-4 flex items-center md:ml-6">
                    <x-common.notifications-bell></x-common.notifications-bell>
                    <x-admin.profile-dropdown></x-admin.profile-dropdown>
                </div>
            </div>
        </div>
        {{ $slot }}
    </div>
</div>
@endsection