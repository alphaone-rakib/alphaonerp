<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@if(isset($applicationSetting->item_name))
                        {{ $applicationSetting->item_name }}
                        @else
                        {{ "Alphaonerp" }}
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="my-0 font-weight-bold">@lang('Are You Sure You Want To Delete This Data') ???</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary waves-effect waves-light shadow-none" data-dismiss="modal">@lang('Close')</button>
                    <form class="btn-ok" action="" method="post">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger waves-effect waves-light shadow-none">@lang('Delete')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
