<x-layout>

<div class="bg-blue-50 border border-black-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1"> Create Intern jobs </h2>
        <p class="mb-4">Post an Intern Jobs to find developers</p>
    </header>
    <form action="/listings" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="company" class="inline-block text-lg mb-2">Company Name</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" 
            value="{{old("company")}}"
            placeholder="company name"/>

            @error("company")
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror

        </div>
        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Job Title</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
            value="{{old("title")}}" 
              placeholder="Job title"/>

              @error("title")
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror

        </div>
        <div class="mb-6">
            <label for="location" class="inline-block text-lg mb-2">Job Location</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
            value="{{old("location")}}"
            placeholder="Job location" />

            @error("location")
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror

        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
            value="{{old("email")}}"
            placeholder="email" />

            @error("email")
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror

        </div>
        <div class="mb-6">
            <label for="website" class="inline-block text-lg mb-2">Website</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="webiste"
            value="{{old("webiste")}}"
            placeholder="website" />
            @error("webiste")
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div>
        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">Tags (comma separated)</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
            value="{{old("tags")}}"
            placeholder="tags" />

            @error("tags")
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror

        </div>

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">Company Logo</label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" 
            placeholder="company logo"/>
            
            @error("logo")
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror

        </div>
        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">Job Description</label>
            <textarea type="text" class="border border-gray-200 rounded p-2 w-full" name="description"
            value="{{old("description")}}"
            placeholder="description"></textarea>

            @error("description")
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
           @enderror
        </div>
        <div class="mb-6">
            <button 
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                  Create job</button>
                  <a href="/" class="text-black ml-4">Back </a>
        </div>
    </form>
</div>
  
</x-layout>