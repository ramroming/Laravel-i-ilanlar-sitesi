<!--Category nav-->

@php
   $parentCategories = \App\Http\Controllers\HomeController::categorylist()
@endphp

<li class="has-children">

    <a>Categories</a>
    <ul class="dropdown">
        @foreach($parentCategories as $rs)
        <li>
            <a style="font-weight:bold">{{$rs->title}} </a>
                    @if(count($rs->children))
                        @include('home._categorytree',['children' => $rs->children])
                    @endif
        </li>
        @endforeach
    </ul>

</li>
