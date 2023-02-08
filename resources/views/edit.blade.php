@extends('main')

@section('container')




<div class="px-4 sm:px-6 lg:px-8 mt-10">
  <div className="text-left">
    <nav aria-label="breadcrumb" class="w-max">
      <ol class="flex w-full flex-wrap items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2">
        <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-slate-500 antialiased transition-colors duration-300 hover:text-black">
          <a class="opacity-100" href="/event/">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
            </svg>
          </a>
          <span class="pointer-events-none mx-2 select-none font-sans text-sm font-normal leading-normal text-blue-gray-500 antialiased">
            /
          </span>
        </li>
        <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-slate-500 antialiased transition-colors duration-300 hover:text-black">
          <a class="opacity-60" href="/event/{{$post->id}}/edit">
            <span>Edit</span>
          </a>
        </li>
      </ol>
    </nav>
  <div class="sm:flex-auto">
      <h1 class="text-2xl font-semibold text-gray-900 pt-8">Edit {{ $post->title }}</h1>
  </div>

<div class="col-lg-8 pb-2">
    <form method="post" action="{{ route('update',$post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="title" class="form-label block text-sm font-medium text-gray-700 pt-4 pb-2">Title</label>
          <input type="text" value="{{ old('title',$post->title) }}" class="form-control drop-shadow-sm px-2 py-2 
          mt-1
          block
          w-full
          rounded-md
          border-gray-300
          shadow-sm
          focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
          max-w-lg" id="title" name="title">
        </div>
        <div class="mb-3 pb-4">
          <label for="content" class="form-label block text-sm font-medium text-gray-700 pt-4 pb-2">Content</label>
          <textarea class=" form-control drop-shadow-sm 
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 max-w-2xl" rows="3" spellcheck="false" name="content" id="content">{{ old('content',$post->content) }}
                  </textarea>
        </div>

        <button type="submit" class=" drop-shadow-sm inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="return confirm('Are you sure?')">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>          
          Update Content
        </button>

      </form>
</div>

@endsection