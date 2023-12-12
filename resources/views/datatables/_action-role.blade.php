@permission('edit-role')
<a href="{{ $edit_url }}" class="btn btn-icon btn-secondary"><i class="fas fa-edit"></i> Edit & Set Permission</a>
@endpermission

@permission('delete-role')
<a href="#"  data-href="{{ $delete_url }}" data-id="{{ $model->id }}" id="deleted-data-role" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i> Deleted</a>
@endpermission