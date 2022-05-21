@props([
    'disabled' => false,
    'name',
    'label',
    'rows' => 3
])

<div class="mt-3">
    <x-form.label for={{$name}}>{{ $label }}</x-form.label>

    <textarea id={{$name}} name={{$name}} rows={{$rows}} {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}>{{ $slot }}</textarea>

    @error($name)
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
