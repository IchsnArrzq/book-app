@switch($loan->status)
    @case(0)
        <div class="badge bg-warning">
            waiting for approval
        </div>
    @break

    @case(1)
        <div class="badge bg-success">
            approved
        </div>
    @break

    @case(2)
        <div class="badge bg-danger">
            rejected
        </div>
    @break

    @case(3)
        <div class="badge bg-info">
            done
        </div>
    @break
@endswitch
