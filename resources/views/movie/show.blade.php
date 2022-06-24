@php
 use App\Enums\Genre;
@endphp

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movie Details') }}
        </h2>
    </x-slot>

<div class="container mx-auto mt-4">


    {{-- <div class="flex mx-auto shadow-lg p-3 bg-white rounded"> --}}
    <div class="grid grid-cols-3 gap-3 shadow-lg p-4 bg-slate-50 rounded">

        <div class="col-span-2">
            <x-data-display name="Title"    value="{{$movie->name}}"></x-data-display>
            <x-data-display name="Director" value="{{$movie->director}}"></x-data-display>
            <x-data-display name="Year"     value="{{$movie->year}}"></x-data-display>
            <x-data-display name="Budget"   value="{{$movie->budget}}"></x-data-display>
            <x-data-display name="Genre"    value="{{Genre::name($movie->genre)}}"></x-data-display>
            <x-data-display name="Rating"   value="{{$movie->rating}}"></x-data-display>
            <x-data-display name="Cast"     value="{{$movie->cast}}"></x-data-display>
            <x-data-display name="Plot"     value="{{$movie->plot}}"></x-data-display>
        </div>

        <div class="col-span-1 justify-self-center">
            <img src="{{$movie->poster_url}}" class="p-1 bg-white border rounded max-w-sm"  alt="poster" />
        </div>

        <div class="pt-2">
            @can('update-movie',$movie)
            <x-link colour="blue"  href="{{route('movies.edit', ['id'=>$movie->id])}}" >Edit</x-link>
            @endcan()
            <x-link colour="green" href="{{route('movies.add.review', ['id'=>$movie->id])}}">Add Review</x-link>
            <x-link colour="orange"  href="{{route('movies.index')}}" >Movies</x-link>
        </div>
    </div>
    <div class="mt-8 mb-3 mx-4">
        <h4 class="text-xl">Reviews</h4>
        <x-table :columns="['#', 'Name', 'Rating', 'Comment', 'Created', 'Actions']">
            @foreach($movie->reviews as $review)
            <x-table.tr>
                <x-table.td>{{$review->id}}</x-table.td>
                <x-table.td>{{$review->name}}</x-table.td>
                <x-table.td>{{$review->rating}}</x-table.td>
                <x-table.td>{{$review->comment}}</x-table.td>
                <x-table.td>{{$review->on}}</x-table.td>
                @can('delete_review',$review)
                <x-table.td>
                    <form action="{{route('movies.destroy.review',[$movie->id, $review->id])}}" method="post">
                        @csrf @method('DELETE')
                        <x-button>Delete</x-button>
                    </form>
                </x-table.td>
                @endcan()
            </x-table.tr>
            @endforeach
            </tbody>
        </x-table>
    </div>
</div>

</x-app-layout>

