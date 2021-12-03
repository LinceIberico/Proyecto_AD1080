@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __('¡Vaya! Hubo un error inesperado.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                <!--<li>¡Vaya! Hubo un error inesperado.</li>-->
            @endforeach
        </ul>
    </div>
@endif
