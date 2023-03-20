<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot>
    <a href="/manageUser/create">
        <x-button-primary>Add User</x-button-primary>
    </a>
    <h1 class="text-2xl mb-5">{{ $users->count() }} Account available</h1>
    <table cellpadding="10" class="border-2 rounded-lg">
        <thead>
            <tr>
                <td class="border-2 border-slate-300 text-center">No.</td>
                <td class="border-2 border-slate-300 text-center">Profile picture</td>
                <td class="border-2 border-slate-300 text-center">Name</td>
                <td class="border-2 border-slate-300 text-center">Gender</td>
                <td class="border-2 border-slate-300 text-center">Date of birth</td>
                <td class="border-2 border-slate-300 text-center">Email</td>
                <td class="border-2 border-slate-300 text-center">Email Verified</td>
                <td class="border-2 border-slate-300 text-center">Phone Number</td>
                <td class="border-2 border-slate-300 text-center">Address</td>
                <td class="border-2 border-slate-300 text-center">Updated at</td>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td class="border-2 border-slate-300 text-center">{{ $i++ }}</td>
                    <td class="border-2 border-slate-300 text-center">
                        <div class="w-[50px] h-[50px] overflow-hidden"><img src="{{ $user->profile_picture }}"
                                alt="">
                        </div>
                    </td>
                    <td class="border-2 border-slate-300 text-center">{{ $user->name }}</td>
                    <td class="border-2 border-slate-300 text-center">{{ $user->gender }}</td>
                    <td class="border-2 border-slate-300 text-center">{{ $user->date_of_birth }}</td>
                    <td class="border-2 border-slate-300 text-center">{{ $user->email }}</td>
                    <td class="border-2 border-slate-300 text-center">{{ $user->email_verified_at }}</td>
                    <td class="border-2 border-slate-300 text-center">{{ $user->phone_number }}</td>
                    <td class="border-2 border-slate-300 text-center">{{ $user->address }}</td>
                    <td class="border-2 border-slate-300 text-center">{{ $user->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard>
