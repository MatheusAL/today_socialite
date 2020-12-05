<x-jet-form-section submit="createTask">
    <x-slot name="title">
        {{ __('Create a new task') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new item in your task list.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Task name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Task Description') }}" />
            <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="description" autocomplete="description" />
            <x-jet-input-error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="deadline" value="{{ __('Task Deadline') }}" />
            <x-jet-input id="deadline" type="date" class="mt-1 block w-full" wire:model.defer="deadline"/>
            <x-jet-input-error for="deadline" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
