@php
    $siteName = $website?->site_name ?? 'CMS Admin';
    $logoPath = $website?->site_WhiteLogo ? asset($website->site_WhiteLogo) : asset('backend/dist/img/AdminLTELogo.png');
    $settingMenuOpen = request()->routeIs('setting.*');
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ $logoPath }}" alt="{{ $siteName }}" class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-light">{{ \Illuminate\Support\Str::limit($siteName, 18) }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.dashboard-icon name="dashboard" />
                        </span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('page.index') }}" class="nav-link {{ request()->routeIs('page.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.page-icon name="category" />
                        </span>
                        <span class="menu-text">Page Management</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('model-create') }}"
                        class="nav-link {{ request()->routeIs('model-create') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.category-icon name="category" />
                        </span>
                        <span class="menu-text">Create Model</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.category') }}"
                        class="nav-link {{ request()->routeIs('admin.category*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.category-icon name="category" />
                        </span>
                        <span class="menu-text">Category ({{ $categorylist->count() }})</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.blog.index') }}"
                        class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.blog-icon />
                        </span>
                        <span class="menu-text">Blog</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tag.index') }}" class="nav-link {{ request()->routeIs('tag.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.tag-icon />
                        </span>
                        <span class="menu-text">Tag</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('service.index') }}"
                        class="nav-link {{ request()->routeIs('service.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.service-icon />
                        </span>
                        <span class="menu-text">Service</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gallery.index') }}"
                        class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.gallery-icon />
                        </span>
                        <span class="menu-text">Gallery</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('testimonial.index') }}"
                        class="nav-link {{ request()->routeIs('testimonial.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.testimonial-icon />
                        </span>
                        <span class="menu-text">Testimonial</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('price-plan.index') }}"
                        class="nav-link {{ request()->routeIs('price-plan.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.plan-icon />
                        </span>
                        <span class="menu-text">Price Plan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faq.index') }}" class="nav-link {{ request()->routeIs('faq.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.faq-icon />
                        </span>
                        <span class="menu-text">Faq</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('partner.index') }}"
                        class="nav-link {{ request()->routeIs('partner.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.partner-icon />
                        </span>
                        <span class="menu-text">Partner</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('team-member.index') }}"
                        class="nav-link {{ request()->routeIs('team-member.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.team-icon />
                        </span>
                        <span class="menu-text">Our Team</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.index') }}"
                        class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.contact-icon />
                        </span>
                        <span class="menu-text">Contact Us</span>
                    </a>
                </li>

                <li class="nav-item {{ $settingMenuOpen ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $settingMenuOpen ? 'active' : '' }}">
                        <span class="icon-menu">
                            <x-backend.icon.setting-icon />
                        </span>
                        <span class="menu-text">Setting</span>
                        <i class="right fas fa-angle-left"></i>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('setting.website') }}"
                                class="nav-link {{ request()->routeIs('setting.website') ? 'active' : '' }}">
                                <span class="icon-dash"></span>
                                <span class="menu-text">Website</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('setting.mail-setting') }}"
                                class="nav-link {{ request()->routeIs('setting.mail-setting') ? 'active' : '' }}">
                                <span class="icon-dash"></span>
                                <span class="menu-text">Mail Setting</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('setting.basic-mail') }}"
                                class="nav-link {{ request()->routeIs('setting.basic-mail') ? 'active' : '' }}">
                                <span class="icon-dash"></span>
                                <span class="menu-text">Basic Mail</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent w-100 text-left">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <span class="menu-text">Logout</span>
                        </button>
                    </form>
                </li>

                <li class="nav-item">
                    <a href="{{ route('model.index') }}" class="nav-link {{ request()->routeIs('model.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <span class="menu-text">Model List</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
