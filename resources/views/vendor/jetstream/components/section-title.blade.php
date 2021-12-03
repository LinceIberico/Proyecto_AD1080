<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-2xl font-bold text-gray-900 py-4 ">{{ $title }}</h3>

        <p class="mt-1 text-base font-semibold text-gray-800">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
