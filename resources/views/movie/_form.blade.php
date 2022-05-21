
<div class="container mx-auto">

    <x-form.input type="hidden" label="Id" name="id" value="{{old('id', $movie->id)}}"  ></x-form.input>

    <div class="grid gap-6 mb-6 lg:grid-cols-2">
        <x-form.input label="Name" name="name" value="{{old('name', $movie->name)}}"  type="text"></x-form.input>
        <x-form.input label="Director" name="director" value="{{old('director', $movie->director)}}" type="text"></x-form.input>
    </div>

    <div class="grid gap-6 mb-6 lg:grid-cols-3">
        <x-form.input label="Year" name="year" value="{{old('year', $movie->year)}}"  type="number"></x-form.input>
        <x-form.input label="Duration" name="duration" value="{{old('duration', $movie->duration)}}"  type="number"></x-form.input>
        <x-form.input label="Budget" name="budget" value="{{old('budget', $movie->budget)}}" type="number"></x-form.input>
    </div>

    <div class="grid gap-6 mb-6 lg:grid-cols-2">
        <x-form.input label="Rating" name="rating" value="{{old('rating', $movie->rating)}}" type="text"></x-form.input>
        <x-form.select label="Genre" name="genre" value="{{old('genre', $movie->genre)}}" ></x-form.input>
    </div>

    <x-form.input label="Poster" name="poster_url" value="{{old('poster_url', $movie->poster_url)}}" type="url"></x-form.input>

    <x-form.textarea label="Cast" name="cast" rows="2">{{old('cast', $movie->cast)}}</x-form.textarea>

    <x-form.textarea label="Plot" name="plot" rows="5">{{old('plot', $movie->plot)}}</x-form.textarea>

</div>

<div class="my-4">
    <x-button class="mr-4">{{$message}}</x-button>
    <x-form.anchor href="{{ route('movies.index') }}">Cancel</x-form.anchor>
</div>

