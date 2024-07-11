<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <title>Rob Yundt for State Senate</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="max-w-[100vw] overflow-x-hidden py-10">
    @if(session('success'))
    <div class="container mx-auto">
        <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="text-sm font-semibold ms-3">{{ session('success') }}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
        </div>
    </div>
    @endif
    <form action="{{ route('issues.store') }}" method="POST" autocomplete="off">
        <div class="container mx-auto">
            <h1 class="mb-10 text-6xl text-center font-bebas text-primary">Let’s Build a Better Alaska Together</h1>
            <div class="max-w-screen-sm mx-auto mb-10">
                <img class="w-full" src="{{ asset('images/banner.png') }}" alt="">
            </div>
            <div class="flex flex-col items-center justify-center gap-5 my-5 lg:flex-row-reverse">
                <div class="max-w-44">
                    <img src="{{ asset('images/yundt.webp') }}" alt="">
                </div>
                <div>
                    <blockquote class="p-4 mx-auto my-4 bg-gray-800 border-l-8 border-gray-500">
                        <p class="text-4xl italic font-medium leading-relaxed text-white">YOU HAVE THE POWER TO DECIDE!</p>
                    </blockquote>
                </div>
            </div>
            <div class="flex flex-col items-start p-5 text-white border border-gray-200 lg:p-8 rounded-2xl bg-primary">
                <h1 class="w-full p-5 mb-5 text-lg font-semibold text-center rounded-lg text-primary bg-slate-50">I will fight for all of the below issues, help me prioritize by selecting the ones most important to you.</h1>
                @csrf
                <div class="flex flex-col items-start justify-start gap-3">
                    @foreach ($issues as $issue)
                        <div class="flex flex-row items-start justify-start gap-5">
                            <input 
                                id="bordered-checkbox-{{ $issue->id }}" 
                                type="checkbox"
                                value="{{ $issue->id }}" 
                                name="selected_issues[]"
                                class="mt-1 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-600-800 focus:ring-2"
                            >
                            <label for="bordered-checkbox-{{ $issue->id }}" class="w-full font-medium">{{ $issue->description }}</label>
                        </div>
                    @endforeach
                        <input 
                            type="text" 
                            id="other_issues" 
                            name="other_issues" 
                            class="w-full max-w-screen-sm text-primary"
                            placeholder="Other: Please specify">
                </div>
            </div>
            <hr class="my-10 border-t-2 border-primary">
            <div class="flex flex-col items-center justify-center my-10 gap-y-5">
                <h1 class="text-4xl font-semibold text-center font-bebas text-primary">ARE YOU WILLING TO SUPPORT ROB YUNDT FOR STATE SENATE DISTRICT N?</h1>
                <h3 class="mt-3 text-xl font-bold text-center text-primary">DONATE THIS AMOUNT TO SUPPORT ROB YUNDT’S CAMPAIGN </h3>
                <div class="grid grid-cols-2 mt-5 gap-x-5 gap-y-8 lg:grid-cols-3">
                    <div class="flex flex-col items-center justify-start">
                        <a href="https://secure.anedot.com/rob-yundt/donate?amount=50" target="_blank" class="px-10 py-3 font-semibold text-white rounded-md bg-custom-gradient">$50</a>
                        <p class="text-sm italic text-center text-gray-600">pays for 5 yard signs</p>
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <a href="https://secure.anedot.com/rob-yundt/donate?amount=100" target="_blank" class="px-10 py-3 font-semibold text-white rounded-md bg-custom-gradient">$100</a>
                        <p class="text-sm italic text-center text-gray-600">pays for a 4X8 road sign</p>
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <a href="https://secure.anedot.com/rob-yundt/donate?amount=250" target="_blank" class="px-10 py-3 font-semibold text-white rounded-md bg-custom-gradient">$250</a>
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <a href="https://secure.anedot.com/rob-yundt/donate?amount=500" target="_blank" class="px-10 py-3 font-semibold text-white rounded-md bg-custom-gradient">$500</a>
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <a href="https://secure.anedot.com/rob-yundt/donate?amount=1,000" target="_blank" class="px-10 py-3 font-semibold text-white rounded-md bg-custom-gradient">$1000</a>
                        <p class="text-sm italic text-center text-gray-600">pays for approximately 20% of a mailer to constituents</p>
                    </div>
                </div>
                <a href="https://secure.anedot.com/rob-yundt/donate" target="_blank" class="px-16 py-3 font-semibold text-white rounded-md bg-custom-gradient">DONATE</a>
            </div>
            <hr class="my-10 border-t-2 border-primary">
            <div x-data="{ isVolunteer: true }">
                <h1 class="text-4xl font-semibold text-center font-bebas text-primary">INTERESTED IN VOLUNTEERING, HOSTING A MEET & GREET, OR NEED A YARD SIGN?</h1>
                <div class="flex flex-row items-center justify-center gap-5">
                    <button type="button" :class="{ 'opacity-50': !isVolunteer }" @click="isVolunteer = true"
                        class="px-5 py-2 my-5 text-white bg-primary rounded-3xl">Yes</button>
                    <button type="button" :class="{ 'opacity-50': isVolunteer }" @click="isVolunteer = false"
                        class="px-5 py-2 my-5 text-white bg-primary rounded-3xl">No</button>
                </div>
                <div x-show="isVolunteer" autocomplete="off" x-transition class="max-w-screen-sm mx-auto">
                    <div class="mb-5">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">First Name</label>
                        <input 
                            type="text" 
                            id="first_name" 
                            name="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                            placeholder="John" 
                            :required="isVolunteer" 
                        >
                    </div>
                    <div class="mb-5">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
                        <input 
                            type="text" 
                            id="last_name" 
                            name="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                            placeholder="Doe" 
                            :required="isVolunteer" 
                        />
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input 
                            type="email" 
                            id="email"
                            name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                            placeholder="johndoe@example.com" 
                            :required="isVolunteer" 
                        />
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Phone</label>
                        <input 
                            type="number" 
                            id="phone"
                            name="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                            placeholder="" 
                            :required="isVolunteer" 
                        />
                    </div>
                    <div class="mb-5">
                        <label for="home_address" class="block mb-2 text-sm font-medium text-gray-900 ">Home Address <span class="text-[0.7rem] italic text-gray-500">(for yard sign requests)</span></label>
                        <input 
                            type="text" 
                            id="home_address"
                            name="home_address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                            placeholder="" 
                            :required="isVolunteer" 
                        />
                    </div>
                </div>
            </div>
            <hr class="my-10 border-t-2 border-primary">
            <div class="max-w-screen-sm mx-auto">
                <h1 class="text-4xl font-semibold text-center font-bebas text-primary">HOW ELSE CAN WE MAKE ALASKA BETTER? </h1>
                <h3 class="mt-3 mb-3 text-xl font-bold text-center text-primary">TELL ROB YOUR INSIGHTS OR ASK HIM A QUESTION  </h3>
                <textarea name="message" id="message" rows="10" class="w-full rounded-md resize-none" placeholder="Type your message here..."></textarea>
            </div>
            <hr class="my-10 border-t-2 border-primary">
            <div class="max-w-screen-sm mx-auto">
                <button type="submit" class="w-full px-5 py-5 my-5 text-3xl font-semibold text-white rounded-full hover:opacity-75 bg-primary">
                    <span class="scale-125 material-symbols-outlined">send</span>
                    SUBMIT
                </button>
            </div>
        </div>
    </form>
</body>

</html>
