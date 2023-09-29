<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Template') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    {{ __("Header") }}
                    <h1>This is just a template.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, quia nobis consequuntur exercitationem blanditiis illo, reprehenderit tempora autem corrupti doloremque deserunt sapiente nisi corporis beatae nam. Rem veritatis facere unde.</p>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
