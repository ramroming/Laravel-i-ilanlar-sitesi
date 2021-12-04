
@foreach($children as $subcategory)

        @if(count($subcategory->children))
            <a style="font-weight:bold"> {{$subcategory -> title}}</a>
                @include('home._categorytree',['children' => $subcategory->children])
            <hr>
          @else
            <li><a href="#">{{$subcategory->title}}</a></li>
        @endif

@endforeach

