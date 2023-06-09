@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-info text-secondary">
            <tr>
                <th></th>
                <th></th>
                <th>CATEGORY</th>
                <th>OWNER</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>
                        <a href="{{route('post.show', $post->id)}}"><img src="{{$post->image}}" alt="{{$post->name}}" class="image-lg"></a>
                    </td>
                    <td>
                        @forelse ($post->categoryPost as $category_post)
                            <div class="badge bg-secondary bg-opacity-50">
                                {{$category_post->category->name }}
                            </div>
                        @empty
                            <div class="badge bg-dark text-wrap">Uncategorized</div>
                        @endforelse
                    </td>
                    <td><a href="{{route('profile.show', $post->user->id)}}" class="text-decoration-none text-dark">{{$post->user->name}}</a></td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        @if ($post->trashed())
                            <i class="fa-solid fa-circle-minus text-secondary"></i>&nbsp; Hidden
                        @else
                            <i class="fa-solid fa-circle text-primary"></i>&nbsp; Visible
                        @endif
                    </td>
                    <td>
                            <div class="dropdown">
                                <button class="btn btn-sm"data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @if ($post->trashed())
                                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#visible-post-{{$post->id}}">
                                            <i class="fa-solid fa-eye"></i>Unhide Post {{$post->id}}
                                        </button>
                                    @else
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hidden-post-{{$post->id}}">
                                            <i class="fa-solid fa-eye-slash"></i>Hide Post {{$post->id}}
                                        </button>
                                    @endif
                                </div>
                            </div>
                            {{-- Include a modal here --}}
                            @include('admin.posts.modal.status')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection