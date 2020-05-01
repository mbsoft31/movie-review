@guest
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="intended" value="{{ url()->current() }}">
        <div class="px-4 flex flex-col mb-2">
            <label class="mb-2" for="email">email</label>
            <input class="px-4 py-2 text-lg text-gray-900 bg-gray-200 rounded border" id="email" name="email" type="email"/>
        </div>
        <div class="px-4 flex flex-col mb-2">
            <label class="mb-2" for="password">password</label>
            <input class="px-4 py-2 text-lg text-gray-900 bg-gray-200 rounded border" id="password" name="password" type="password"/>
        </div>
        <div class="px-4 mb-2">
            <input class="inline-block px-4 py-2 text-primary border border-primary rounded-lg shadow-md bg-transparent hover:bg-primary hover:text-gray-100" type="submit" value="Login" />
        </div>
    </form>
@else
    @if(!$movie->isReviewedBy(Auth::user()))
        <rating-form
            :show-rating="true"
            :rtl="true"
            movie="{{ $movie->getSlug() }}"
            :user="{{ Auth::user()->id }}"
            route="{{ route('review.create') }}"
        />
    @else
        <div class="px-4 py-2 border border-gray-300 rounded shadow">
            <div class="flex flex-col text-sm">
                <div class="flex items-center space-x-2 space-x-reverse">
                    <a class="inline-block text-primary font-semibold" href="#">{{ Auth::user()->username }}</a>
                    <span class="inline-block">({{ Auth::user()->email }})</span>
                </div>
                <star-rating
                    :star-size="20"
                    :max-rating="10"
                    :rating="{{ $movie->getReview(Auth::user())->rating ?? 0 }}"
                    :increment="0.1"
                >
                </star-rating>
            </div>
            <p>{{ $movie->getReview(Auth::user())->review}}</p>
        </div>
    @endif
@endguest

@include('content.movie.partials.review.current', [
            'reviews' => $movie->getRating()
        ])
