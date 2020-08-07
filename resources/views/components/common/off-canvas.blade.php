  <!-- Off-canvas menu for mobile -->
  <div class="md:hidden">
      <div class="fixed inset-0 flex z-40" x-show="menu"
          x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
          x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
          <!--
        Off-canvas menu overlay, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
          <div class="fixed inset-0">
              <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
          </div>
          <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
          <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white" x-show="menu"
              x-transition:enter="transition ease-in-out duration-300 transform"
              x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
              x-transition:leave="transition ease-in-out duration-300 transform"
              x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
              <div class="absolute top-0 right-0 -mr-14 p-1">
                  <button
                      class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
                      aria-label="Close sidebar" @click="menu = false">
                      <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                      </svg>
                  </button>
              </div>
              <div class="flex-shrink-0 flex items-center px-4 justify-center">
                  <img class="h-15 w-auto" src="/img/cargopanda_logo_indigo.svg" alt="Cargo Panda logo">
              </div>
              <div class="mt-5 flex-1 h-0 overflow-y-auto">
                {{ $slot }}
              </div>
          </div>
          <div class="flex-shrink-0 w-14">
              <!-- Dummy element to force sidebar to shrink to fit close icon -->
          </div>
      </div>
  </div>
