<template>
    <div>
        <div :dir="rtl?'rtl':'ltr'" class="flex items-center">
            <star-rating
                :max-rating="10"
                :star-size="40"
                :increment="0.1"
                :rtl="rtl"
                :show-rating="showRating"
                v-model="rating"
                :text-class="'text-lg font-semibold text-gray-900'"
            >
            </star-rating>
            <div class="mx-4" v-if="!showRating">
                <span class="text-lg font-semibold text-gray-900" v-html="rating"></span>
            </div>
        </div>
        <div class="flex flex-col">
            <label class="text-lg text-primary uppercase font-semibold my-4"
                for="rating-text">
                Write a review
            </label>
            <textarea class="appearance-none border shadow bg-gray-100 p-2 text-lg text-justify tracking-wide leading-relaxed" id="rating-text"
                      rows="5" v-model="reviewText">
            </textarea>
        </div>
        <div class="my-4">
            <button class="px-4 py-2 rounded-lg shadow-md bg-primary text-gray-100"
                    @click="submitReview">
                Send
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'rating-form',
        props: {
            showRating: {
                default: true,
            },
            rtl: {
                default: false,
            },
            route: {
                default: '/review/store'
            },
            movie: {
            },
            user: {}
        },
        data() {
            return {
                rating: 5.5,
                reviewText: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam aspernatur aut autem consequatur consequuntur cupiditate debitis dignissimos distinctio ducimus ea eaque eius eligendi fugiat hic illum impedit in inventore ipsam iure iusto magni molestias mollitia neque, nihil odio possimus quam recusandae reprehenderit repudiandae rerum tempore veniam vero voluptas voluptatibus.',
            }
        },
        methods: {
            submitReview() {
                axios.post(this.route, {
                    rating: this.rating,
                    review: this.reviewText,
                    user: this.user,
                    movie: this.movie
                })
                    .then((res) => res.data)
                    .then((res) => {
                        console.log(res)
                    })
                    .catch((err) => {
                        console.error(err)
                    })
            }
        },
    }
    //:star-points="[85,0,108.51141009169893,52.6393202250021,165.83980388508803,58.73355547812947,123.04226065180615,97.36067977499789,134.96174644486024,153.76644452187054,85,125,35.03825355513979,153.76644452187054,46.95773934819386,97.3606797749979,4.16019611491194,58.73355547812949,61.488589908301066,52.63932022500211]"
</script>
