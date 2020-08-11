<div>
  <h3 class="text-lg leading-6 font-medium text-gray-900">
    Summary
  </h3>
  <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
    @foreach($stats as $statistic)
    <div class="bg-white overflow-hidden shadow rounded-lg">
      <div class="px-4 py-5 sm:p-6">
        <dl>
          <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
            {{ key($statistic) }}
          </dt>
          <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
            {{ current($statistic) }}
          </dd>
        </dl>
      </div>
    </div>
    @endforeach
  </div>
</div>
