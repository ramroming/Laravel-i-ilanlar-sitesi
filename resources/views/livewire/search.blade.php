{{--<div class="col-6 col-sm-9 col-md-9 col-lg-10 m-auto">--}}

<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4 mb-lg-0">
    <input wire:model="search" name="search" type="text"
           class="input search-input form-control form-control-lg" list="mylist" placeholder="search Job.."/>

    @if(!empty($query))
        <datalist class="selectpicker" data-style="btn-white btn-lg" id="mylist">  {{--   when an option is selected,redirect to the value  --}}
            @foreach($datalist as $rs)
                <option value="{{$rs->title}}">{{$rs->category->title}}</option>
            @endforeach
        </datalist>

    @endif

</div>




