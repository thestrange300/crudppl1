@extends('main')

@section('container')
<div class="px-4 sm:px-6 lg:px-8 mt-10">
<div class="sm:flex-auto">
    <h1 class="text-2xl font-semibold text-gray-900"> Create Post</h1>
</div>
    <form method="post" action="/event" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 pt-4 pb-2">Title</label>
                <div class="mt-1">
                  <input type="text" name="title" id="title" class=" drop-shadow-sm px-2 py-2 
                  mt-1
                  block
                  w-full
                  rounded-md
                  border-gray-300
                  shadow-sm
                  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                  max-w-lg">
                </div>
              </div>
        </div>
        <div class="mb-3">
          <label for="content" class="block text-sm font-medium text-gray-700 pt-4 pb-2">Content</label>
          <textarea class=" drop-shadow-sm 
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 max-w-2xl" rows="3" spellcheck="false" name="content" id="content"></textarea>
        </div>
        <div class="pt-2 pb-2"></div>  
        <button type="button" class=" drop-shadow-sm inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="return confirm('Are you sure? Order that has been made cannot be changed.')">
          <!-- Heroicon name: solid/mail -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>          
          Create Post
        </button>
      </form>
</div>
@endsection