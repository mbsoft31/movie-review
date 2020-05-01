<div class="w-full">
    <h3>تقييمات الأعضاء</h3>
    <ul class="w-full flex flex-col space-y-4">
        @foreach($reviews['reviews'] as $review)
            <li class="px-4 py-2 border border-gray-300 rounded shadow">
                <div class="flex flex-col text-sm">
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <a class="inline-block text-primary font-semibold" href="#">{{ $review->username }}</a>
                        <span class="inline-block">({{ $review->email }})</span>
                    </div>
                    <star-rating
                        :star-size="20"
                        :max-rating="10"
                        :rating="{{ $review->pivot->rating ?? 0 }}"
                        :increment="0.1"
                        :rtl="true"
                    >
                    </star-rating>
                </div>
                <p>{{ $review->pivot->review }}</p>
            </li>
        @endforeach
    </ul>
</div>
