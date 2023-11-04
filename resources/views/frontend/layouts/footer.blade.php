<footer>
    <div class="container footer_sec">
        <div class="row foot_first">
            <div class="col-12">
                <h3>Business Opportunities</h3>
            </div>
            @foreach (getHeaderCategories() as $headerCategory)
                @if ($loop->iteration <= 8)
                    <div class="col-lg-3 col-sm-4 col-6">
                        <h5>
                            <a
                                href="{{ route('listByCategory', ['slug' => $headerCategory->slug]) }}">{!! $headerCategory->title !!}</a>
                        </h5>
                        <ul>
                            @foreach ($headerCategory->children as $childCategory)
                                @if ($loop->iteration <= 10)
                                    <li>
                                        <a
                                            href="{{ route('listByCategory', ['slug' => $childCategory->slug]) }}">{!! $childCategory->title !!}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach


        </div>

        <div class="row foot_first foot_third">
            <div class="col-lg-9 col-sm-12 col-12">
                <h3 class="mt-3">Business Opportunities</h3>
                <ul>
                    <li>
                        <a href="javascript:void(0)">Uttar Pradesh</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Maharashtra</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Karnataka</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Rajasthan</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Delhi</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Punjab</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Andhra Pradesh</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Arunachal Pradesh</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Assam</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Bihar</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-12  col-12 socila_items">
                <h3 class="mt-3">Business Opportunities</h3>
                <div class="footer_social_icon">
                    <ul>
                        <li>
                            <a target="_blank" href="javascript:void(0)">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="javascript:void(0)">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="javascript:void(0)">
                                <i class="fa fa-youtube-square"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="javascript:void(0)">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid foot_last">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-4 col-12">
                        <div class="foot_l">Copyright © 2023 All Establish Distributors. All rights reserved.</div>
                    </div>
                    <div class="col-lg-6 col-sm-8 col-12">
                        <ul class="foot-r">
                            <li>
                                <a href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">About Us</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Contact Us</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Privacy &amp; Policy</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Refund &amp; Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
