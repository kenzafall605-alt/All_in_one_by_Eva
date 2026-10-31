@props(['light' => false])

<div {{ $attributes->class(['flex items-center gap-3']) }}>
    <span @class([
        'flex h-10 w-10 items-center justify-center rounded-full',
        'bg-white/10 text-beige-200' => $light,
        'bg-bordeaux-700 text-white' => ! $light,
    ])>
        <x-icon name="sparkles" class="h-5 w-5" />
    </span>
    <div class="leading-tight">
        <p @class([
            'font-serif text-lg font-semibold',
            'text-white' => $light,
            'text-bordeaux-900' => ! $light,
        ])>All in One</p>
        <p @class([
            'text-xs uppercase tracking-[0.2em]',
            'text-beige-300' => $light,
            'text-beige-500' => ! $light,
        ])>by Eva</p>
    </div>
</div>