@props(['template', 'create'])

<div class="pc-container">
    <div class="pcoded-content">
        <x-breadcrumb :title="$template->title" :links="$template->breadcrumb" />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="flex-grow-1">
                            <h5>Data</h5>
                            <span class="d-block m-t-5">Lists and Management</span>
                        </div>
                        @if(!isset($create) || $create !== false)
                            <div>
                                <a href="{{route($template->option['route'] . '.create')}}" class="btn btn-primary">Create</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <x-table :field="$template->field" :rows="$template->row" :option="$template->option" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>