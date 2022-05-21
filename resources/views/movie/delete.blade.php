<x-app-layout>

    <x-slot name="header">
    </x-slot>


<div class="container mt-4">
    <h3>Movie Details</h3>

    <div class="shadow-lg p-3 bg-white rounded">
        <h4 class="mt-4 mb-4">Confirm Delete</h4>

        <div class="row">
            <div class="col-12">
                <dl class="row">
                    <dt class="col-sm-4">Name</dt>
                    <dd class="col-sm-8">{{$movie->name}}</dd>

                    <dt class="col-sm-4">Director</dt>
                    <dd class="col-sm-8">{{$movie->director}}</dd>

                    <dt class="col-sm-4">Year</dt>
                    <dd class="col-sm-8">{{$movie->year}}</dd>
                </dl>
            </div>

        </div>

        <div class="row m-4">
            <form action="/movies/{{$movie->id}}"  method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                <a href="{{route('movies.index')}}"class="btn btn-sm btn-link">Cancel</a>
            </form>
        </div>
    </div>
</div>
</x-app-layout>

