{{-- Edit --}}

<div class="modal fade" id="edit-categories-{{$category->id}}">
    <div class="modal-dialog">
        <form action="{{route('admin.categories.update',$category->id)}}" method="post">
            @csrf
            @method('PATCH')
                <div class="modal-content border-warning">
                    <div class="modal-header border-warning">
                        <h3 class="h5 modal-title text-primary">
                            <i class="fa-solid fa-pen-to-square text-dark"></i><span class="text-dark"> Edit Category</span>
                        </h3>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}" placeholder="Category name">
                    </div>
                    <div class="modal-footer border-0">
                            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>
                    </div>
                </div>
        </form>
    </div>
</div>

{{-- delete --}}

<div class="modal fade" id="delete-categories-{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-primary">
                    <i class="fa-solid fa-pen-to-square text-dark"></i><span class="text-dark"> Delete Category</span>
                </h3>
            </div>
            <div class="modal-body">
                <p class="mt-2">Are you sure you want to delete <span class="fw-bold">{{$category->name}}</span> category?</p>
                <br>
                <p class="fw-light">This action with affect all the posts under the category. Posts without a category will fall under Uncategorized.</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>