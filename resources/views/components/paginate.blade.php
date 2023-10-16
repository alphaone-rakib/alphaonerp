<br>
@if($data)
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" role="status" aria-live="polite">
            Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{$data->total()}} entries
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="fixed-header_paginate">
            <ul class="pagination float-end">
                <li class="paginate_button page-item previous {{ ($data->currentPage() == 1) ? ' disabled' : '' }}" id="fixed-header_previous">
                    <a href="{{ $data->url(1) }}" aria-controls="fixed-header" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
                @for ($i = 1; $i <= $data->lastPage(); $i++)
                    <li class="paginate_button page-item {{ ($data->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="paginate_button page-item next {{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}" id="fixed-header_next">
                    <a href="{{ $data->url($data->currentPage()+1) }}" aria-controls="fixed-header" data-dt-idx="3" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif

