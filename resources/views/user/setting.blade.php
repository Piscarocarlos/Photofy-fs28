@extends('layouts.app')

@section('content')
    <div class="container m-auto">

        <h1 class="text-2xl leading-none text-gray-900 tracking-tight mt-3"> Account Setting </h1>
        <ul class="mt-5 -mr-3 flex-nowrap lg:overflow-hidden overflow-x-scroll uk-tab">
            <li class="uk-active"><a href="#">General</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Notification</a></li>
            <li><a href="#">Social links</a></li>
            <li><a href="#">Billing</a></li>
            <li><a href="#">Security</a></li>
        </ul>

        <div class="grid lg:grid-cols-3 mt-12 gap-8">
            <div>
                <h3 class="text-xl mb-2"> Basic</h3>
                <p> Les informations basiques de votre compte. Les champs marqués (*) sont obligatoires.</p>
            </div>
            <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">

                <form action="{{ route('user.setting') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                        <div>
                            <label for=""> First name</label>
                            <input type="text" value="{{ $user->first_name }}" placeholder="Your name.."
                                class="shadow-none bg-gray-100" name="first_name">
                            @error('first_name')
                                <strong class="text-red-500">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div>
                            <label for=""> Last name</label>
                            <input type="text" value="{{ $user->last_name }}" placeholder="Your name.."
                                class="shadow-none bg-gray-100" name="last_name">
                            @error('last_name')
                                <strong class="text-red-500">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for=""> Email</label>
                            <input type="text" value="{{ $user->email }}" placeholder="Your name.."
                                class="shadow-none bg-gray-100" name="email">
                                @error('email')
                                <strong class="text-red-500">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for=""> Avatar</label>
                            <input type="file"  placeholder="Your name.." class="shadow-none bg-gray-100" name="avatar">
                        </div>
                        <div class="col-span-2">
                            <label for="about">Biography</label>
                            <textarea id="about" name="bio" rows="3" class="shadow-none bg-gray-100">{{ $user->bio }}</textarea>
                        </div>
                        <div class="col-span-2">
                            <label for=""> Location</label>
                            <input type="text" placeholder="Morocco, Casablanca" name="location" class="shadow-none bg-gray-100" value="{{ $user->location }}">
                        </div>
                        <div class="col-span-2">
                            <label for=""> Relationship </label>
                            <select id="relationship" name="relationship" class="shadow-none bg-gray-100">
                                <option value="0" {{ $user->relationship == 0 ? 'selected' : '' }}>None</option>
                                <option value="1" {{ $user->relationship == 1 ? 'selected' : '' }}>Single</option>
                                <option value="2" {{ $user->relationship == 2 ? 'selected' : '' }}>In a relationship
                                </option>
                                <option value="3" {{ $user->relationship == 3 ? 'selected' : '' }}>Married</option>
                                <option value="4" {{ $user->relationship == 4 ? 'selected' : '' }}>Engaged</option>
                            </select>
                        </div>
                    </div>

                    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                        <button type="button" class="p-2 px-4 rounded bg-gray-50 text-red-500"> Cancel </button>
                        <button type="submit" class="button bg-blue-700"> Update profile </button>
                    </div>
                </form>

            </div>

            <div>
                <h3 class="text-xl mb-2"> Privacy</h3>
                <p> Lorem ipsum dolor sit amet nibh consectetuer adipiscing elit</p>
            </div>
            <div class="bg-white rounded-md lg:shadow-lg shadow lg:p-6 p-4 col-span-2">

                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4> Who can follow me ?</h4>
                            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </div>
                        </div>
                        <div class="switches-list -mt-8 is-large">
                            <div class="switch-container">
                                <label class="switch"><input type="checkbox"><span class="switch-button"></span> </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center">
                        <div>
                            <h4> Show my activities ?</h4>
                            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </div>
                        </div>
                        <div class="switches-list -mt-8 is-large">
                            <div class="switch-container">
                                <label class="switch"><input type="checkbox" checked><span class="switch-button"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center">
                        <div>
                            <h4> Search engines?</h4>
                            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </div>
                        </div>
                        <div class="switches-list -mt-8 is-large">
                            <div class="switch-container">
                                <label class="switch"><input type="checkbox"><span class="switch-button"></span> </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center">
                        <div>
                            <h4> Allow Commenting?</h4>
                            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </div>
                        </div>
                        <div class="switches-list -mt-8 is-large">
                            <div class="switch-container">
                                <label class="switch"><input type="checkbox"><span class="switch-button"></span> </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
