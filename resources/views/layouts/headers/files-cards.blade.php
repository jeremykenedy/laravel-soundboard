<div class="header bg-gradient-primary pb-5 pt-5 pt-md-8 mt--5 mt-md--7">
    <div class="container-fluid">
        <div class="header-body mt-md-1">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        {{ trans('admin.file-manager.uploaded-sounds') }}
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $uploadfilesNames->count() }}
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        {{ trans('admin.file-manager.recorded-sounds') }}
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $recordedfilesNames->count() }}
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-microphone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
