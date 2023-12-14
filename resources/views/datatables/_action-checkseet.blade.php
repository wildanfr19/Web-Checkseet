<div class="text-center">
<div class="dropdown">
    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <a  href="#" id="view-items" data-id="{{ $model->id }}" class="dropdown-item" type="button"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
      <a href ="#" 
          id="edit-items" 
          data-id="{{ $model->id }}" 
          class="dropdown-item" 
          data-id="{{ $model->id }}" 
          row-id="{{ $model->approve_date_1 }}"  
          row-approve-users="{{ $model->approve_date_2 }}"
          row-approve-head="{{ $model->approve_date_3 }}"
          type="button"> <i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
      <a href ="#" 
         class="dropdown-item"
         {{-- data-href="{{ $deleted }}" --}}
         data-id="{{ $model->id }}" 
         row-id="{{ $model->approve_date_1 }}"  
         row-approve-users="{{ $model->approve_date_2 }}"
         row-approve-head="{{ $model->approve_date_3 }}"
         id="deleted-items-data"
         type="button">
         <i class="fa fa-ban" aria-hidden="true">
         </i> Delete</a>
      <a href ="#" 
          class="dropdown-item" 
          data-id="{{ $model->id }}" 
          row-id="{{ $model->approve_date_1 }}"  
          row-approve-users="{{ $model->approve_date_2 }}"
          row-approve-head="{{ $model->approve_date_3 }}"
          id="approve-ict" type="button"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>
    </div>
  </div>
</div>