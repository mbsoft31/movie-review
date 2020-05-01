<div id="auth-header" class="bg-gray-900">
    <div class="container flex justify-between items-center uppercase">
        <div class="py-1 px-4 flex items-center space-x-reverse space-x-3">
            <p class="text-gray-100">{{ __('auth.follow-us') }}</p>
            <ul class="list-none flex items-center space-x-reverse space-x-3">
                <li>
                    <a href="#"><i class="fab fa-facebook text-blue-600"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-twitter text-blue-400"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-instagram text-pink-600"></i></a>
                </li>
            </ul>
        </div>
        <div class="py-1 px-4 flex items-center space-x-reverse space-x-3">
            <ul class="list-none flex items-center space-x-reverse space-x-3 text-gray-200">
                @guest
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="fas fa-user-check text-gray-200"></i>
                            <span>{{ __('auth.login') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">
                            <i class="fas fa-user-plus text-gray-200"></i>
                            <span>{{ __('auth.register') }}</span>
                        </a>
                    </li>
                @else
                    <li>
                        <tippy
                            interactive
                            :animate-fill="false"
                            placement="bottom"
                            theme="light"
                            {{--:show-on-init="true"--}}
                            animation="fade"
                            trigger="click"
                            arrow>
                            <template v-slot:trigger>
                                <a class="block px-2 space-x-reverse space-x-2 cursor-pointer">
                                    <i class="fas fa-user text-gray-200"></i>
                                    <span>{{ Auth::user()->username }}</span>
                                </a>
                            </template>

                            <div class="w-48">
                                <ul class="list-none space-y-1">
                                    <li>
                                        <a class="block px-2 py-3 text-gray-900 space-x-reverse space-x-2 hover:bg-gray-300" href="#">
                                            <i class="fas fa-user fa-lg"></i>
                                            <span>{{ __('auth.profile') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="block px-2 py-3 text-gray-900 space-x-reverse space-x-2 hover:bg-gray-300" href="#"
                                           @click="logout">
                                            <i class="fas fa-user-circle fa-lg"></i>
                                            <span>{{ __('auth.logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </tippy>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>
