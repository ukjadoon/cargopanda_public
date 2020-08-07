@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <img class="mx-auto h-28 w-auto" src="/img/cargopanda_logo_indigo.svg" alt="Cargo Panda logo">
    <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-indigo-500">
      Tell us about your company
    </h2>
  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form action="{{ route('register-company') }}" method="POST">
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
            Company name
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="name" type="text" name="name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
          </div>
          <x-common.error property="name"></x-common.error>
        </div>

        <div class="mt-2">
          <label for="cif" class="block text-sm font-medium leading-5 text-gray-700">
            CIF
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="cif" type="text" name="cif" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
          </div>
        </div>
        <x-common.error property="cif"></x-common.error>

        <div class="mt-6 flex items-center justify-between">
          <div class="flex items-center">
            <input id="terms" type="checkbox" name="terms" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
            <label for="terms" class="ml-2 block text-sm leading-5 text-gray-900">
              I agree to the terms and conditions
            </label>
          </div>
        </div>
        <x-common.error property="terms"></x-common.error>

        <div class="mt-6">
          <span class="block w-full rounded-md shadow-sm">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
              Sign in
            </button>
          </span>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection
