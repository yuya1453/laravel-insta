@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{route('profile.update')}}" method="post" class="bg-white shadow rounded-3 p-5" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <h2 class="h3 mb-3 fw-light text-muted"></h2>

                <div class="row mb-3">
                    <div class="col-4">
                        @if ($user->avatar)
                            <img src="{{$user->avatar}}" alt="{{$user->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">

                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                        @endif
                    </div>
                    <div class="col-auto align-self-end">
                        <input type="file" name="avatar" id="avatar" class="form-control-sm mt-1" aria-describedby="avatar-info">
                        <div class="form-text" id="avatar-info">
                            Acceptable formats: jpeg, jpg, png, gif only <br>
                            Max file size is 1048kb
                        </div>
                {{-- Error --}}
                @error('avatar')
                    <div class="text-danger small">{{$message}}</div>
                @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name', $user->name)}}" autofocus>
                {{-- Error --}}
                @error('name')
                    <div class="text-danger small">{{$message}}</div>
                @enderror
                </div>
                <div class="row mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email', $user->email)}}">
                {{-- Error --}}
                @error('email')
                    <div class="text-danger small">{{$message}}</div>
                @enderror
                </div>
                <div class="row mb-3">
                    <label for="introduction" class="form-label fw-bold">introduction</label>
                    <textarea name="introduction" id="introduction" rows="5" class="form-control" placeholder="Describe yourself">{{old('introduction' ,$user->introduction)}}</textarea>
                {{-- Error --}}
                @error('introduction')
                    <div class="text-danger small">{{$message}}</div>
                @enderror
                </div>

                <button type="submit" class="btn btn-warning px-5">Save</button>
            </form>
        </div>
    </div>    
@endsection