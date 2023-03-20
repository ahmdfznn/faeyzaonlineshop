<x-user>
    <x-slot:title>{{ $title }}</x-slot>
        <div class="w-[80vw] bg-slate-900 flex flex-col items-center pt-16 pb-10">
            <div class="w-[70vw] bg-slate-800 rounded-xl flex flex-col items-center overflow-hidden">
                <header class="w-full h-[70px] bg-slate-700 flex justify-center items-center">
                    <h1 class="text-white text-2xl font-semibold">Your profile</h1>
                </header>
                <div class="w-full flex flex-col items-center p-10">
                    @if (auth()->user()->profile_picture)
                        <form action="/deleteProfilePicture" method="post">
                            @method('delete')
                            @csrf
                            <x-button-submit class="bg-red-600">{{ __('Delete profile picture') }}</x-button-submit>
                        </form><br>
                    @endif
                    <form action="{{ route('profile.update') }}" method="post" class="w-1/2"
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div
                            class="w-[200px] h-[200px] rounded-full overflow-hidden flex justify-center items-center mb-10 m-auto border-2 border-indigo-600">
                            <img src="@if ($user->profile_picture) {{ asset('storage/' . $user->profile_picture) }}
                        @else /icon/user.png @endif"
                                alt="profile" class="w-full img-preview">
                        </div>
                        <input type="file" name="image" id="image" multiple
                            class="bg-slate-900 rounded-lg w-full border-2 border-indigo-700 focus:border-none text-gray-300 focus:outline-indigo-600 focus:ring-indigo-600"><br>
                        <x-label :value="__('Name')" for="name" id="names" />
                        <x-input-text value="{{ $user->name }}" id="name" name="name" required />
                        <x-label :value="__('Gender')" for="gender" />
                        <select type="text" value="{{ $user->gender }}" name="gender" id="gender"
                            class="w-full bg-slate-900 border-2 border-indigo-700 focus:border-none focus:outline-indigo-600 focus:ring-indigo-600 text-gray-300 p-2 mt-3 mb-5 rounded-lg"
                            required>
                            <option value="laki-laki">Man</option>
                            <option value="perempuan">Woman</option>
                        </select>
                        <x-label :value="__('Date of birth')" for="tanggal_lahir" />
                        <x-input-text type="date" value="{{ $user->date_of_birth }}" name="tanggal_lahir"
                            id="tanggal_lahir" />
                        <x-label :value="__('Email')" for="email" />
                        <x-input-text type="email" value="{{ $user->email }}" name="email" id="email" />
                        <x-label :value="__('Phone Number')" for="nomor_telepon" />
                        <x-input-text type="text" value="{{ $user->phone_number }}" name="nomor_telepon"
                            id="nomor_telepon" />
                        <x-label :value="__('Address')" for="alamat" />
                        <textarea
                            class="w-full h-[150px] rounded-lg border-2 border-indigo-700 focus:border-none text-gray-300 focus:outline-indigo-600 focus:ring-indigo-600 bg-slate-900 p-2 resize-none"
                            name="alamat" id="alamat" required>{{ $user->address }}</textarea>
                        <x-button-submit id="save">
                            {{ __('Save Changes') }}
                        </x-button-submit>
                    </form>
                </div>
            </div>
            <div class="w-[70vw] mt-10 p-5 bg-slate-800 rounded-xl flex flex-col items-center overflow-hidden">
                <h1>Delete Account</h1>
                <form action="{{ route('profile.destroy') }}" method="POST" class="w-1/2">
                    @method('delete')
                    @csrf
                    <x-label :value="__('Password')" for="password" />
                    <x-input-text id="password" name="password" type="password" />
                    <x-button-submit class="bg-red-600">{{ __('Delete') }}</x-button-submit>
                </form>
            </div>
        </div>
</x-user>

<script>
    const img = document.querySelector('#image')
    $('#image').change(function(e) {

        const reader = new FileReader()
        reader.readAsDataURL(img.files[0])

        $(reader).on('load', function(e) {
            $('.img-preview').attr('src', e.target.result)
        })
    })


    $(document).ready(function() {
        $('#save').on('click', function(e) {
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        })
    })
</script>
