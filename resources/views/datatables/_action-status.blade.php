<div class="text-center">
    @if ($model->approve_date_1 !== NULL && $model->approve_date_2 == NULL && $model->approve_date_3 == NULL)
        <span class="badge badge-pill badge-success"><i class="fa fa-check" aria-hidden="true"></i> Approve ICT Staff</span>
        <span class="badge badge-pill badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Approve Users</span>
        <span class="badge badge-pill badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Approve Dept Head</span>
    @elseif($model->approve_date_2 !== NULL && $model->approve_date_1 !== NULL && $model->approve_date_3 == NULL)
        <span class="badge badge-pill badge-success"><i class="fa fa-check" aria-hidden="true"></i> Approve ICT Staff</span>
        <span class="badge badge-pill badge-success"><i class="fa fa-check" aria-hidden="true"></i> Approve Users</span>
        <span class="badge badge-pill badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Approve Dept Head</span>
    @elseif($model->approve_date_3 !== NULL && $model->approve_date_2 !== NULL && $model->approve_date_1 !== NULL)
        <span class="badge badge-pill badge-success"><i class="fa fa-check" aria-hidden="true"></i> Approve ICT Staff</span>
        <span class="badge badge-pill badge-success"><i class="fa fa-check" aria-hidden="true"></i> Approve Users</span>
        <span class="badge badge-pill badge-success"><i class="fa fa-check" aria-hidden="true"></i> Approve Dept Head</span>
    @else
        <span class="badge badge-pill badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Approve ICT Staff</span>
        <span class="badge badge-pill badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Approve Users</span>
        <span class="badge badge-pill badge-danger"><i class="fa fa-times" aria-hidden="true"></i> Approve Dept Head</span>
    @endif
</div>