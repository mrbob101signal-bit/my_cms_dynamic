<section class="pxa_header_wr pxa_megaMenu_wraper pxa_dropdown_menu mt_bgtempconatainer">
    <div class="pxa_header_full">
        <div class="pxa_header_flex">
            <div class="pxa_header_logo">
                <a href="{{ route('website.home') }}">
                    <img src="{{ asset('frontend') }}/public/pages/assets/images/CHHINH_CMS_logo_3.png"
                        alt="Logo" height="40" width="158">
                </a>
            </div>
            <div class="pxa_header_nav">
                <ul class="pxa_menu_list pxa_dropdown_flex pxa-tabs">
                    <li class="navActive"><a href="{{ route('website.home') }}">Home</a></li>
                    <li><a href="{{ route('website.about-us') }}">About</a></li>

                    <li class="pxa_megamenu_list">
                        <a href="#">Service</a>
                        <div class="pxa_header_Subnav pxa_drop_menu" style="display: none;">
                            <div class="pxa_megamenu_grid" id="service_category">
                                <ul class="pxa_megamenu_item pxa_header_Subnav_01">
                                    <!-- @foreach($serviceCategory as $item)
                                        <li>
                                            <a href="{{ route('website.service-category', $item->slug) }}">
                                                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                                                <h4 class="pxa_megamenu_details">{{ $item->title }}</h4>
                                            </a>
                                        </li>
                                        @endforeach -->
                                    @foreach($serviceCategory as $item)
                                    @if($item->category) {{-- Check if category exists --}}
                                    <li>
                                        <a href="{{ $item->category ? route('website.service-category', $item->category->slug) : '#' }}">
                                            <span><i class="fa fa-star"></i></span>
                                            <h4 class="pxa_megamenu_details">{{ $item->title }}</h4>
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li><a href="{{ route('website.blog') }}">Blog</a></li>
                    <li><a href="{{ route('website.gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('website.contact-us') }}">Contact</a></li>
                    <li>
                        @auth
                            <a href="{{ route('admin.dashboard') }}">Admin</a>
                        @else
                            <a href="{{ route('login') }}">Admin</a>
                        @endauth
                    </li>
                </ul>
            </div>

            <div class="pxa_header_toggle">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</section>
