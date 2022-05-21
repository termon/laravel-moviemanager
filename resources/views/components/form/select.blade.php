@props([
    'disabled' => false,
    'name',
    'label'
])

<div>
    <x-form.label for={{$name}}>{{ $label }}</x-form.label>

    <select id={{$name}} name={{$name}} {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }} >
        @foreach(App\Enums\Genre::cases() as $genre)
            <option value="{{$genre->value}}">{{$genre->name}}</option>
        @endforeach
    </select>

    @error($name)
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
