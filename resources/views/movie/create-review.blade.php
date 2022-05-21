<x-app-layout>

    <x-slot name="header">
        <h3 class="font-semibold">Add Review</h3>
    </x-slot>

    <div class="container mx-auto mt-4 shadow-lg p-3 bg-slate-50 rounded">

        <form action="{{route('movies.save.review',['id' => $review->movie_id])}}"  method="post">
            @csrf

            <input type="hidden" name="movie_id" value="{{$review->movie_id}}" />
            <input type="hidden" name="on" value="{{$review->on}}" />

            <x-form.input label="Name" name="name" value="{{old('name', $review->name)}}" class="mb-3"></x-form.input>
            <x-form.input label="Rating" name="rating" value="{{old('rating', $review->rating)}}" class="mb-3"></x-form.input>

            <x-form.textarea label="Comment" name="comment" value="{{old('comment', $review->comment)}}" rows="5"></x-form.textarea>

            <div class="mt-4">
                <x-button class="mr-4">Add</x-button>
                <x-form.anchor href="{{ route('movies.show',['id'=>$review->movie_id]) }}">Cancel</x-form.anchor>
            </div>

        </form>

    </div>
</x-app-layout>


