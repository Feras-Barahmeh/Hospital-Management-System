@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            <div class="">
                @foreach ($errors->all() as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            </div>
        </strong>
    </div>
@endif
