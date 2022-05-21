@props([
    'name' => 'Name',
    'value' => 'value...'
])

{{-- <div class="grid gap-6 grid-cols-2 border-b py-3 mb-4 mr-3"> --}}
<div class="flex border-b border-slate-200 py-2 mb-3 mr-3 rounded-md">
    <span class="text-base font-bold text-black mr-5">
        {{$name}}
    </span>
    <span class="text-base text-slate-500 mr-5">
        {{$value}}
    </span>
</div>

