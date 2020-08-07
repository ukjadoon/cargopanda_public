<div>
    <div class="mt-8 border-t border-gray-200 pt-8">
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Checklist information
        </h3>
        <p class="mt-1 text-sm leading-5 text-gray-500">
          Add a new checklist item and description.
        </p>
      </div>
      <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="item_name" class="block text-sm font-medium leading-5 text-gray-700">
            Item name
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input wire:model="checklist.name"class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
          </div>
          <x-common.error property="checklist.name"></x-common.error>
        </div>

        <div class="sm:col-span-6">
          <label for="item_description" class="block text-sm font-medium leading-5 text-gray-700">
            Description
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input wire:model="checklist.description" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
          </div>
          <x-common.error property="checklist.description"></x-common.error>
        </div>
      </div>
    </div>
  <div class="mt-8 border-t border-gray-200 pt-5">
    <div class="flex justify-end">
      <span class="inline-flex rounded-md shadow-sm">
        <button wire:click.prevent="resetModel()" type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
          Cancel
        </button>
      </span>
      <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button wire:click.prevent="createOrUpdateChecklist" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          Save
        </button>
      </span>
    </div>
  </div>
</div>
