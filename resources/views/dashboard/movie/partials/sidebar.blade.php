<div class="w-1/5 bg-blue-900">
    <div class="text-center mb-8 px-4 py-8 border-b border-blue-800">
        <h1 class="text-lg font-semibold leading-relaxed tracking-wide text-white">Fooshar dashboard</h1>
        <p class="font-semibold leading-relaxed tracking-wide text-white"
           dir="ltr">{{ '@' . Auth::user()->username }}</p>
    </div>
    <ul class="divide-y divide-gray-500">
        <li>
            <a class="flex space-x-3 space-x-reverse items-center px-4 py-2 block font-semibold text-gray-100 hover:bg-blue-700"
               href="{{ route('movie.create') }}">
                <i class="text-center w-8 fas fa-camera fa-lg text-primary"></i>
                <p>Movie</p>
            </a>
        </li>
        <li>
            <a class="flex space-x-3 space-x-reverse items-center px-4 py-2 block font-semibold text-gray-100 hover:bg-blue-700">
                <i class="text-center w-8 mx-auto fas fa-user fa-lg text-primary"></i>
                <p class="flex-grow">People</p>
            </a>
        </li>
        <li>
            <a class="flex space-x-3 space-x-reverse items-center px-4 py-2 block font-semibold text-gray-100 hover:bg-blue-700">
                <i class="text-center w-8 fas fa-photo-video fa-lg text-primary"></i>
                <p>Media</p>
            </a>
        </li>
        <li>
            <a class="flex space-x-3 space-x-reverse items-center px-4 py-2 block font-semibold text-gray-100 hover:bg-blue-700">
                <i class="text-center w-8 fas fa-users fa-lg text-primary"></i>
                <p>Users</p>
            </a>
        </li>
    </ul>
</div>
