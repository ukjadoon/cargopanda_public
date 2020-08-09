<div>
  <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Your trucks</h2>
  <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
      @forelse($trucks as $truckDoc)
        <x-transporter.truck-info :truckDoc="$truckDoc"></x-transporter.truck-info>
      @empty
        You need to add a truck first!
      @endforelse
  </ul>
</div>
