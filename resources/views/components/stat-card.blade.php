@props(['label', 'value', 'icon' => 'sparkles', 'hint' => null])

<div class="card flex items-start gap-4">
    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-bordeaux-50 text-bordeaux-700">
        <x-icon :name="$icon" class="h-5 w-5" />
    </span>
    <div class="min-w-0">
        <p class="text-sm text-stone-500">{{ $label }}</p>
        <p class="mt-1 truncate font-serif text-2xl font-semibold text-bordeaux-900">{{ $value }}</p>
        @if ($hint)
            <p class="mt-1 text-xs text-stone-400">{{ $hint }}</p>
        @endif
    </div>
</div>