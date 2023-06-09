@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-warning text-secondary">

            <div class="mb-4">
                <div class="row">
                    <form action="{{route('admin.categories.store')}}" method="post">
                    @csrf
                        <div class="col-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Add a category ..." autofocus>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</button>
                        </div>
                        {{-- Error --}}
                        @error('name')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </form>
                </div>
            </div>
            <tr>
                <th>#</th>
                <th>CATEGORY</th>
                <th>COUNT</th>
                <th>UPDATED AT</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($all_categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td class="text-dark">{{$category->name}}</td>
                    <td>{{$category->categoryPost->count() }}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>
                        {{-- Edit Button --}}
                        <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#edit-categories-{{$category->id}}" title="edit">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td>
                        {{-- Delete Button --}}
                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-categories-{{$category->id}}">
                            <i class="fa-solid fa-trash-can"></i></i>
                        </button>
                    </td>
                    {{-- Include modal here --}}
                    @include('admin.categories.modal.action')
                </tr>

            @empty
            <tr>
                <td></td>
            </tr>
            @endforelse
            <tr>
                <td></td>
                <td class="text-dark">
                    Uncategorized
                    <p class="xsmall mb-0 text-muted">Hidden posts are not included.</p>
                </td>
                <td>{{$uncategorized_count}}</td>
            </tr>

        </tbody>
    </table>
@endsection
