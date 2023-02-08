@extends('main')

@section('container')

{{-- @if (session('success'))
{{ session('success') }}
@endif --}}
{{-- 
<script src="{{ asset("js/close.js") }}">
</script> --}}

@if (session('success'))
<div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start" id="closeall">
  <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
    <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
      <div class="p-4" id="close">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <!-- Heroicon name: outline/check-circle -->
            <svg class="h-10 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Success!</p>
            <p class="mt-1 text-sm text-gray-500">{{ session('success') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function myFunction() {
  const closeall = document.getElementById("closeall");
  closeall.classList.add("hidden");
}
setTimeout(myFunction, 3000);
</script>
@endif



<div class="px-4 sm:px-6 lg:px-8 mt-10">
  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
    @foreach ($posts as $post)
    <div class="px-4 py-5 bg-white shadow-lg rounded-lg overflow-hidden sm:p-6">
      <dt class="text-xl font-medium text-black truncate">{{ $post->title }}</dt>
      <dd class="mt-1 text-sm text-gray-500">{{ $post->content }}</dd>
    </div>
    @endforeach
  </dl> 
    <div class="sm:flex sm:items-center mt-5">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Post</h1>
        <p class="mt-2 text-sm text-gray-700">Information available to other people on the internet.</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button type="button" onclick="location.href='/event/create'" class="inline-flex items-center p-3 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <!-- Heroicon name: outline/plus-sm -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="drop-shadow-lg inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="table-fixed min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                  <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                  <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900">Content</th>
                  <th scope="col" class="py-4 px-8 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
              </thead>
              @foreach ($posts as $post)
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                  <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900 sm:pl-6">{{ $post->id }}</td>
                  <td class="whitespace-nowrap py-4 text-sm text-gray-500">{{ $post->title }}</td>
                  <td class="whitespace-nowrap text-sm text-gray-500 max-w-md truncate overflow-auto">{{ $post->content }}</td>
                  <td class="whitespace-nowrap py-4 px-8 text-sm text-gray-500">
                    <form method="post" action="{{ route('delete',$post) }}" enctype="multipart/form-data">
                      <button type="button" onclick="location.href='/event/{{$post->id}}/edit'"  class="inline-flex items-center px-2 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <!-- Heroicon name: solid/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>                      
                      </button>
                      <button type="submit" onclick="return confirm('Are you sure?')"" class="inline-flex items-center px-2 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>                 
                      </button>                      
                      @method('DELETE')
                      @csrf
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  



@endsection