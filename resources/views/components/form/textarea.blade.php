@props(['name'])

<x-form.field class="mb-6">
    <x-form.label name="{{ $name }}" />
    <textarea name="{{ $name }}" class="border border-gray-200 rounded p-2 w-full" placeholder="..." required>{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>