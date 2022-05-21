<x-app-layout>

    <x-slot name="header">
        <h3>Edit Movie</h3>
    </x-slot>

<div class="container mx-auto mt-4 shadow-lg p-5 bg-slate-50 rounded">

    <form action="/movies/{{$movie->id}}"  method="post">
        @csrf
        @method('PUT')

        @include('movie._form',['movie'=>$movie,'message'=>'Update'])

    </form>

</div>
</x-app-layout>


