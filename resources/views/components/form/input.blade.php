@props([
    'label' => "UNDEFINED",
    'type' => 'text',
    'name'
])

<div>
    @if($type != 'hidden')
        <x-form.label for={{$name}}>{{ $label }}</x-form.label>
    @endif

    <input id={{$name}} name={{$name}} type={{$type}} {{ $attributes->merge(['class' => 'form-input block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}>

    @error($name)
        <span class="text-sm text-red-500">{{$message}}</span>
    @enderror
</div>
