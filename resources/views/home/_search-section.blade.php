{{--    search section--}}
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="mb-5 text-center">
                <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                <p class="text-white">Get started now and search for a job!</p>
            </div>
            <form action="{{route('getjob')}}" method="post" class="search-jobs-form">
                <div class="row align-items-center justify-content-center">
                @csrf
                @livewire('search')
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                    </div>
                </div>
            </form>
{{--         moved to footer >>   @livewireScripts--}}
        </div>
    </div>
</div>
