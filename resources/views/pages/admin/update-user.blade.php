@extends('components.admin.layout')

@section('title', 'Update User')

@section('main')
<div class="my-20 lg:max-w-[50%] lg:p-10">
    <h2 class="text-secondary text-3xl font-bold">Update User</h2>
    <form action="{{ route('action.update.user', $data->id) }}" method="POST" class="mt-8">
        @csrf
        @method('PUT')
        <div class="space-y-6 mt-14">
            <div>
                <p class="text-sm font-bold text-secondary mb-2">Nomor Induk Siswa :</p>
                <input type="text" name="nis" id="nis" value="{{ $data->nis }}" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" autofocus placeholder="NIS" required>
                @error('nis') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <p class="text-sm font-bold text-secondary mb-2">Password :</p>
                <input type="password" name="password" id="password" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" placeholder="Password">
                @error('password') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <p class="text-sm font-bold text-secondary mb-2">Role :</p>
                <select name="role" id="role" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" required>
                    <option value="user" {{ $data->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $data->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <button type="submit" class="flex items-center gap-x-12 bg-primary rounded-[10px] p-4 mt-6">
            <span class="text-white text-lg font-bold">Update</span>
            <img src="{{ asset('HiOutlineChevronRight.svg') }}" alt="">
        </button>
    </form>
</div>
@endsection