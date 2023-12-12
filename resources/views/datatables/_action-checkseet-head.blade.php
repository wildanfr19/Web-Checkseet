@permission('manage-index-checkseet|view-checkseet')
<a  href="#" class="btn btn-sm btn-success" id="view-items" data-id="{{ $model->id }}"type="button"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
@endpermission
<a href ="#" class="btn btn-sm btn-danger"
data-id="{{ $model->id }}" 
row-id="{{ $model->approve_date_1 }}"  
row-approve-users="{{ $model->approve_date_2 }}"
row-approve-head="{{ $model->approve_date_3 }}"
id="approve-head" type="button"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
