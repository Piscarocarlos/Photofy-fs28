<div class="sidebar">
    <div class="sidebar_header border-b border-gray-200 from-gray-100 to-gray-50 bg-gradient-to-t  uk-visible@s">
        <a href="#">
            <img src="{{ asset('assets/images/logo.png') }}">
            <img src="{{ asset('assets/images/logo-light.png') }}" class="logo_inverse">
        </a>
        <!-- btn night mode -->
        <a href="#" id="night-mode" class="btn-night-mode" data-tippy-placement="left" title="Switch to dark mode"></a>
    </div>
    <div class="border-b border-gray-20 flex justify-between items-center p-3 pl-5 relative uk-hidden@s">
        <h3 class="text-xl"> Navigation </h3>
        <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: sidebar-active"></span>
    </div>
    <div class="sidebar_inner" data-simplebar>
        <div class="flex flex-col items-center my-6 uk-visible@s">
            @if (!is_null(Auth::user()->verification_code))
                <span class="bg-red-400 rounded-md py-2 px-3 text-white mb-5"
                >Votre compte n'est pas activé. Vérifiez votre boîte !</span>
            @endif
            <div
                class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24">
                <img src="{{ Auth::user()->avatar }}"
                    class="bg-gray-200 border-4 border-white rounded-full w-full h-full">
            </div>
            <a href="{{ route('user.profile') }}" class="text-xl font-medium capitalize mt-4 uk-link-reset"> {{ Auth::user()->getFullName() }}
            </a>
            <small>{{ Auth::user()->pseudo }}</small>
            <div class="flex justify-around w-full items-center text-center uk-link-reset text-gray-800 mt-6">
                <div>
                    <a href="#">
                        <strong>Post</strong>
                        <div> {{ count(Auth::user()->posts) }}</div>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <strong>Following</strong>
                        <div> {{ count(Auth::user()->following) }}</div>
                    </a>
                </div>
                <div>
                    <a href="#">
                        <strong>Followers</strong>
                        <div>{{ count(Auth::user()->followers) }}</div>
                    </a>
                </div>
            </div>
        </div>
        <hr class="-mx-4 -mt-1 uk-visible@s">
        <ul>
            <li class="active">
                <a href="{{ route('index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span> Feed </span> </a>
            </li>
            <li>
                <a href="explore.html">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span> Explore </span> </a>
            </li>
            <li>
                <a href="chat.html">
                    <i class="uil-location-arrow"></i>
                    <span> Messages </span> <span class="nav-tag"> 3</span> </a>
            </li>
            <li>
                <a href="trending.html">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                    </svg>
                    <span> Trending </span> </a>
            </li>
            <li>
                <a href="market.html">
                    <i class="uil-store"></i>
                    <span> Marketplace </span> </a>
            </li>
            <li>
                <a href="setting.html">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span> Settings </span>
                </a>
                <ul>
                    <li><a href="setting.html">General </a></li>
                    <li><a href="{{ route('user.setting') }}"> Account setting </a></li>
                    <li><a href="setting.html">Billing <span class="nav-tag">3</span> </a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('user.profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span> My Profile </span> </a>
            </li>
            <li>
                <hr class="my-2">
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span> Logout </span> </a>
            </li>
        </ul>
    </div>
</div>
