@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <!-- first section -->
        @include('layouts.first')

        <!-- recent songs -->
        @include('layouts.songs')

        <!-- second section -->
        @include('layouts.second')

        <!-- recent podcasts -->
        @include('layouts.podcasts')

        <!-- third section -->
        @include('layouts.third')

        <!-- recent albums -->
        @include('layouts.albums')

        <!-- fourth section -->
        @include('layouts.fourth')

        <!-- recent artists -->
        @include('layouts.artists')

        <!-- Footer -->
        @include('layouts.footer')
    </div>
@endsection
