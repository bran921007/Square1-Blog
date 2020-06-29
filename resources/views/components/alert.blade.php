<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('status') }}
    </div>
    @endif
</div>
