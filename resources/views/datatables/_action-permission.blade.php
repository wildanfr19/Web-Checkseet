@permission('edit-permission')
<a href="{{ $edit_url }}" class="btn btn-icon btn-secondary"><i class="fas fa-edit"></i> Edit</a>
@endpermission

@permission('delete-permission')
<a href="#" data-href="{{ $delete_url }}" data-id="{{ $model->id }}" id="deleted-data-permission" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i> Deleted</a>
@endpermission