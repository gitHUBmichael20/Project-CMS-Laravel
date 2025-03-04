<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="flex items-center justify-center bg-gray-100 dark:bg-gray-900 min-h-screen">
            <section class="py-24 relative xl:mr-0 lg:mr-5 mr-0">
                <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
                    <div class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1">
                        <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                            <div class="w-full flex-col justify-center items-start gap-8 flex">
                                <div class="flex-col justify-start lg:items-start items-center gap-4 flex">
                                    <h6 class="text-gray-400 dark:text-gray-300 text-base font-normal leading-relaxed">About Us</h6>
                                    <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                                        <h2 class="text-indigo-700 dark:text-indigo-400 text-4xl font-bold font-manrope leading-normal lg:text-start text-center">
                                            The Long Story of my Journey
                                        </h2>
                                        <p class="text-gray-500 dark:text-gray-300 text-base font-normal leading-relaxed lg:text-start text-center">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, natus eum dolor, itaque laudantium quidem deleniti impedit veniam nemo nam et odio, omnis dignissimos maxime illum dolorum quos odit. Quas!
                                        </p>
                                    </div>
                                </div>
                                <div class="w-full flex-col justify-center items-start gap-6 flex">
                                    <div class="w-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                        <div class="w-full h-full p-3.5 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-500 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                            <h4 class="text-gray-900 dark:text-gray-100 text-2xl font-bold font-manrope leading-9">33+ Years</h4>
                                            <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-relaxed">Influencing Digital
                                                Landscapes Together
                                            </p>
                                        </div>
                                        <div class="w-full h-full p-3.5 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-500 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                            <h4 class="text-gray-900 dark:text-gray-100 text-2xl font-bold font-manrope leading-9">125+ Projects</h4>
                                            <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-relaxed">Excellence Achieved
                                                Through Success
                                            </p>
                                        </div>
                                    </div>
                                    <div class="w-full h-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                        <div class="w-full p-3.5 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-500 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                            <h4 class="text-gray-900 dark:text-gray-100 text-2xl font-bold font-manrope leading-9">26+ Awards</h4>
                                            <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-relaxed">Our Dedication to
                                                Innovation Wins Understanding
                                            </p>
                                        </div>
                                        <div class="w-full h-full p-3.5 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-500 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                            <h4 class="text-gray-900 dark:text-gray-100 text-2xl font-bold font-manrope leading-9">99% Happy
                                                Clients</h4>
                                            <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-relaxed">Mirrors our Focus on
                                                Client Satisfaction.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="sm:w-fit w-full group px-3.5 py-2 bg-indigo-50 dark:bg-indigo-700 hover:bg-indigo-100 dark:hover:bg-indigo-800 rounded-lg shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] transition-all duration-700 ease-in-out justify-center items-center flex">
                                <span class="px-1.5 text-indigo-600 dark:text-black text-sm font-medium leading-6 group-hover:-translate-x-0.5 transition-all duration-700 ease-in-out">Github</span>
                            </button>
                        </div>
                        <div class="w-full lg:justify-start justify-center items-start flex">
                            <div class="sm:w-[564px] w-full sm:h-[646px] h-full sm:bg-gray-100 dark:sm:bg-gray-800 rounded-3xl sm:border border-gray-200 dark:border-gray-700 relative">
                                <img class="sm:mt-5 sm:ml-5 w-full h-full rounded-3xl object-cover"
                                    src="https://pagedone.io/asset/uploads/1717742431.png" alt="about Us image" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
    </div>

</x-app-layout>