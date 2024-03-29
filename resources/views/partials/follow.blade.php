<div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

    <div class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">
        <h2 class="font-semibold text-lg">Who to follow</h2>
        <a href="#"> Refresh</a>
    </div>

    <div class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
        @foreach ($following_users as $user)
        @if(!checkIfUserFollowMe($user->id))
            <div class="flex items-center justify-between py-3">
                <div class="flex flex-1 items-center space-x-4">
                    <a href="profile.html">
                        <img src="{{ $user->avatar }}" class="bg-gray-200 rounded-full w-10 h-10">
                    </a>
                    <div class="flex flex-col">
                        <span class="block capitalize font-semibold"> {{ $user->getFullName() }} </span>
                        <span class="block capitalize text-sm"> {{ $user->location }} </span>
                    </div>
                </div>

                @if (!checkIfUserFollow($user->id))

                    @if(!checkIfUserFollowMe($user->id))
                    <form action="{{ route('follow.request', encrypt($user->id))}}" method="POST">
                        @csrf
                        <button type="submit" class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-pink-600 hover:text-white hover:border-pink-600 dark:border-gray-800"> Follow </button>
                    </form>
                    @endif
                @else
                <form action="{{ route('followed.request', encrypt($user->id)) }}" method="POST">
                    @csrf
                    <button type="submit" class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-pink-600 hover:text-white hover:border-pink-600 dark:border-gray-800"> Followed </button>
                </form>
                @endif

            </div>
            @endif
        @endforeach

    </div>

</div>

<div class="mt-5" uk-sticky="offset:28; bottom:true ; media @m">
    <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

        <div class="bg-gray-50 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="font-semibold text-lg">Latest</h2>
            <a href="explore.html"> See all</a>
        </div>

        <div class="grid grid-cols-2 gap-2 p-3 uk-link-reset">

            <div class="bg-red-500 max-w-full h-32 rounded-lg relative overflow-hidden uk-transition-toggle">
                <a href="#story-modal" uk-toggle>
                    <img src="assets/images/post/img2.jpg" class="w-full h-full absolute object-cover inset-0">
                </a>
                <div class="flex flex-1 justify-around items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

            <div class="bg-red-500 max-w-full h-40 rounded-lg relative overflow-hidden uk-transition-toggle">
                <a href="#story-modal" uk-toggle>
                    <img src="assets/images/post/img7.jpg" class="w-full h-full absolute object-cover inset-0">
                </a>
                <div class="flex flex-1 justify-around items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

            <div class="bg-red-500 max-w-full h-40 -mt-8 rounded-lg relative overflow-hidden uk-transition-toggle">
                <a href="#story-modal" uk-toggle>
                    <img src="assets/images/post/img5.jpg" class="w-full h-full absolute object-cover inset-0">
                </a>
                <div class="flex flex-1 justify-around  items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

            <div class="bg-red-500 max-w-full h-32 rounded-lg relative overflow-hidden uk-transition-toggle">
                <a href="#story-modal" uk-toggle>
                    <img src="assets/images/post/img3.jpg" class="w-full h-full absolute object-cover inset-0">
                </a>
                <div class="flex flex-1 justify-around  items-center absolute bottom-0 w-full p-2 text-white custom-overly1 uk-transition-slide-bottom-medium">
                    <a href="#"> <i class="uil-heart"></i> 150 </a>
                    <a href="#"> <i class="uil-heart"></i> 30 </a>
                </div>
            </div>

        </div>

    </div>
</div>
