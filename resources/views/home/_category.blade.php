
<!--Category nav-->


<ul>
        @foreach($parentCategories as $rs)
            @if(!count($rs->children))
            <li><a href="#">{{$rs->title}}</a></li>
            @endif
            @if(count($rs->children))
                <li class="dropdown"><a href="#"><span>{{$rs->title}}</span><i class="bi bi-chevron-right"></i></a>
             @include('home._category',['parentCategories' => $rs->children])
                </li>
            @endif
        @endforeach
</ul>








