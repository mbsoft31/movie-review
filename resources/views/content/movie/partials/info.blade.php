<div class="flex flex-col md:w-3/4 -px-4 px-4">
    <div class="entry-title">
        <h1 class="px-4">{{ $movie->title }}</h1>
        <star-rating
            :inline="true"
            :show-rating="false"
            :max-rating="10"
            :star-size="40"
            :increment="0.1"
            :rtl="true"
            :rating="{{ $movie->getRating()["avg_rating"] }}"
        >
        </star-rating>
        <span
            class="text-lg text-gray-800">{{$movie->getRating()["avg_rating"]}}/{{ $movie->getRating()["total_rating"] }}</span>
    </div>
    <div class="flex flex-wrap -px-4">
        <div class="review-info md:w-1/2 w-full px-4">
            <div class="pb-2">
                <h3>Director</h3>
                <div>
                    <ul>
                        @forelse($movie->directors as $person)
                            <li>{{ $person->name }}</li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="pb-2">
                <h3>Genre</h3>
                <div>
                    <ul>
                        @forelse($movie->categories as $person)
                            <li>{{ $person->name }}</li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="pb-2">
                <h3>Stars</h3>
                <div>
                    <ul>
                        @forelse($movie->stars as $person)
                            <li>{{ $person->name }}</li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="pb-2">
                <h3>Writer</h3>
                <div>
                    <ul>
                        @forelse($movie->writers as $person)
                            <li>{{ $person->name }}</li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="pb-2">
                <h3>Producer</h3>
                <div>
                    <ul>
                        @forelse($movie->producers as $person)
                            <li>{{ $person->name }}</li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="pb-2">
                <h3>Runtime</h3>
                <div>
                    <span>{{ $movie->runtime }}</span>
                </div>
            </div>
        </div>
        <div class="review-info md:w-1/2 w-full px-4">
            <div class="pb-2">
                <h3>Release date</h3>
                <div>
                    <span class="">{{ $movie->getReleased() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t border-b-2 border-primary mt-8">
        <p class="text-lg text-justify tracking-wide leading-relaxed py-8">{{ $movie->summary }}</p>
    </div>
</div>
