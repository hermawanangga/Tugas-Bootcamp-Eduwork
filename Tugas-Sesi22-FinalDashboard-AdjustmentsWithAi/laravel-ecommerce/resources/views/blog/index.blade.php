@extends('layouts.app')

@section('title', 'Blog')

@section('content')

<section class="blog-section">

    <div class="container">

        <div class="blog-header">
            <span class="blog-label">
                OUR JOURNAL
            </span>

            <h1>
                Latest Stories
            </h1>

            <p>
                Discover fashion tips, trends, inspiration,
                and stories from Krist.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="blog-card">

                    <div class="blog-image">
                        <img src="{{ asset('storage/images/hero-women.png') }}"
                             alt="Fashion Trends">
                    </div>

                    <div class="blog-content">

                        <span>
                            FASHION
                        </span>

                        <h3>
                            Discover the Latest Fashion Trends
                        </h3>

                        <p>
                            Explore the latest styles and fashion
                            inspiration for your everyday look.
                        </p>

                        <a href="#">
                            Read More
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </div>

</section>

@endsection