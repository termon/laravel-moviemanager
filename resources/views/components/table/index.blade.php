<div class="container mx-auto overflow-hidden rounded-lg bg-slate-50 drop-shadow-lg">
    <table class="table-auto w-full border-collapse border-b text-left">
      <thead>
        <tr class="bg-gray-500 text-sm font-medium uppercase text-gray-100">
            @foreach($columns as $column)
                <th class="p-3">{{$column}}</th>
            @endforeach
        </tr>
      </thead>
      <tbody class="bg-slate-50">
        {{$slot}}
      </tbody>
    </table>
  </div>


