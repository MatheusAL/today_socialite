<div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Description</th>
            <th class="px-4 py-2">Deadline</th>
            <th class="px-4 py-2">Status</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="border px-4 py-2">{{ $item->name }}</td>
                <td class="border px-4 py-2">{{ $item->description }}</td>
                <td class="border px-4 py-2">{{ $item->deadline }}</td>
                <td class="border px-4 py-2">@if($item->done)Done @else To Do @endif</td> 
                <td class="border px-4 py-2">
                    @if($item->done)
                        <button wire:click="markAsToDo({{ $item->id }})" class="bg-red-100 w-50 text-red-600 px-6 py-3 rounded-full">
                            Mark as "To Do"
                        </button>
                    @else
                        <button wire:click="markAsDone({{ $item->id }})" class="bg-green-500 w-50 text-white px-6 py-3 rounded-full">
                            Mark as "Done"
                        </button>
                    @endif

                    <button wire:click="deleteTask({{ $item->id }})" class="bg-red-500 w-50 text-white px-6 py-3 rounded-full">
                        Delete Permanently
                    </button>
                </td>             
            </tr>
        @endforeach
        </tbody>
    </table>

</div>