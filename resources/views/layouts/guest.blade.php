<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' — ' : '' }}{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-beige-100 via-creme to-bordeaux-50 px-4 py-12">
    <div class="w-full max-w-md">
        <div class="mb-8 flex justify-center">
            <x-brand />
        </div>
        <div class="card p-8">
            <x-flash />
            {{ $slot }}
        </div>
        <p class="mt-6 text-center text-xs text-stone-400">©️ {{ date('Y') }} {{ config('app.name') }}</p>
    </div>
</div>
</body>
</html>