<div class="header bg-gradient-green pb-8 pt-5 pt-md-8 mt--5 mt-md--7">
    <div class="container-fluid">
        <div class="header-body mt-md-1">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        {{ trans('admin.themes.current-theme') }}
                                    </h5>
                                    <div id="current_theme_name" class="h2 font-weight-bold mb-0">
                                        {{ $currentTheme->name }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-palette"></i>
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
                                        {{ trans('admin.themes.total-themes') }}
                                    </h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $themes->count() }}
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-palette"></i>
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
