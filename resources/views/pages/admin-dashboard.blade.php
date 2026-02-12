@extends('layouts.admin-app')

@section('title', 'Admin | Dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('website.home') }}" target="_blank">Website</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box dashboard-stat stat-category">
                            <div class="inner">
                                <h3>{{ $category->count() }}</h3>
                                <p>Total Category</p>
                            </div>
                            <div class="icon stat-icon">
                                <i class="fas fa-th-large"></i>
                            </div>
                            <a href="{{ route('admin.category') }}" class="small-box-footer">Manage <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box dashboard-stat stat-blog">
                            <div class="inner">
                                <h3>{{ $TotalBlog->count() }}</h3>
                                <p>Total Blog</p>
                            </div>
                            <div class="icon stat-icon">
                                <i class="fas fa-blog"></i>
                            </div>
                            <a href="{{ route('admin.blog.index') }}" class="small-box-footer">Manage <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box dashboard-stat stat-service">
                            <div class="inner">
                                <h3>{{ $service->count() }}</h3>
                                <p>All Service</p>
                            </div>
                            <div class="icon stat-icon">
                                <i class="fas fa-concierge-bell"></i>
                            </div>
                            <a href="{{ route('service.index') }}" class="small-box-footer">Manage <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box dashboard-stat stat-team">
                            <div class="inner">
                                <h3>{{ $team->count() }}</h3>
                                <p>All Team</p>
                            </div>
                            <div class="icon stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('team-member.index') }}" class="small-box-footer">Manage <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-outline card-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title mb-0">Traffic Overview</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart"
                                        style="min-height: 260px; height: 260px; max-height: 260px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-outline card-secondary">
                            <div class="card-header border-0">
                                <h3 class="card-title mb-0">Quick Access</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('page.index') }}" class="btn btn-outline-primary btn-block mb-2">Manage
                                    Pages</a>
                                <a href="{{ route('setting.website') }}"
                                    class="btn btn-outline-primary btn-block mb-2">Website Settings</a>
                                <a href="{{ route('website.home') }}" target="_blank"
                                    class="btn btn-outline-primary btn-block">View Live Website</a>
                            </div>
                        </div>

                        <div class="card card-outline card-secondary">
                            <div class="card-header border-0">
                                <h3 class="card-title mb-0">Recent Blogs</h3>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    @forelse ($blog->take(5) as $recentBlog)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <a href="{{ route('admin.blog.edit', $recentBlog->slug) }}" class="text-dark">
                                                {{ \Illuminate\Support\Str::limit($recentBlog->title, 35) }}
                                            </a>
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse($recentBlog->created_at)->diffForHumans() }}</small>
                                        </li>
                                    @empty
                                        <li class="list-group-item text-muted">No blog data found.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
