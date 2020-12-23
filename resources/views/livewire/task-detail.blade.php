<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl h-screen bg-gradient-to-r from-gray-100 shadow-2xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-lg font-semibold text-black mb-0.5"> {{ $info->name }}</h1>
        <p class="text-md"> {{ $info->description }} </p>
        {{ $info->deadline }}
    </div>
    <!--<div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('todo.form')
        </div>
    </div>!-->
    
</x-app-layout>
