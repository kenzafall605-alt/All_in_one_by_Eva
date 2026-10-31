@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-cloak role="status"
         class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900">
        <x-icon name="circle-check" class="mt-0.5 h-5 w-5 shrink-0" />
        <p class="flex-1">{{ session('success') }}</p>
        <button type="button" @click="show = false" class="text-emerald-700 hover:text-emerald-900" aria-label="Fermer">
            <x-icon name="x" class="h-4 w-4" />
        </button>
    </div>
@endif

@if (session('error'))
    <div x-data="{ show: true }" x-show="show" x-cloak role="alert"
         class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-900">
        <x-icon name="circle-alert" class="mt-0.5 h-5 w-5 shrink-0" />
        <p class="flex-1">{{ session('error') }}</p>
        <button type="button" @click="show = false" class="text-red-700 hover:text-red-900" aria-label="Fermer">
            <x-icon name="x" class="h-4 w-4" />
        </button>
    </div>
@endif

@if ($errors->any())
    <div role="alert" class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-900">
        <p class="mb-2 font-medium">Veuillez corriger les erreurs suivantes :</p>
        <ul class="list-inside list-disc space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif