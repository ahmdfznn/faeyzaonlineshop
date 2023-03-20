<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot>
    <div>
        <h1 class="text-white text-2xl mb-5">{{ $messages->count() }} Message</h1>
        @foreach ($messages as $message)
            <div class="flex justify-between text-white border-b border-blue-600 my-5">
                <div class="flex">
                    <div class="flex justify-center items-center w-10 h-10 rounded-full overflow-hidden mr-3">
                        <img src="@if ($message->profile_picture) {{ asset('storage/' . $message->profile_picture) }}
                        @else '/icon/user.png' @endif"
                            alt="">
                    </div>
                    <div class="ml-2">
                        <h1 class="text-left">{{ $message->name }}</h1>
                        <p class="mb-3">{{ $message->created_at->diffForHumans() }}</p>
                        <textarea
                            class="text-xl resize-none w-full h-[10vh] bg-slate-900 text-gray-300 border-indigo-600 ring-indigo-600 rounded-md shadow-sm p-2"
                            name="messages" id="messages" disabled autofocus="off">{{ $message->message }}</textarea>
                    </div>
                </div>
                <div class="flex justify-between w-20">
                    <form action="/deletemessage/{{ $message->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"><img src="/icon/delete.png" alt="edit message" class="w-8 h-8"></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-dashboard>
