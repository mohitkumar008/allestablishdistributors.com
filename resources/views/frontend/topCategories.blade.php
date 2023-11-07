@extends('frontend.layouts.app')
@section('content')
    <section class="cat_home_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12 cat_circle_box">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="heading_title">
                                <h5>Trending categories</h5>
                            </div>
                        </div>
                        @foreach ($getTopCategories as $topCategory)
                            <div class="col-md-2 col-6 text-center">
                                <a class="cat_btn" href="{{ route('listByCategory', ['slug' => $topCategory->slug]) }}">
                                    <div class="round_cat">
                                        @if (Storage::exists($topCategory->logo))
                                            <img src="{{ Storage::url($topCategory->logo) }}" alt="" />
                                        @endif
                                        <h5>{!! $topCategory->title !!}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
