<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf

       <div class="m-2">
           @error('rate')<span class="text-danger">{{$message}}</span>@enderror
       </div>


        <div class="rating pl-2">
            <input type="radio"  wire:model="rate" name="rate" value="5" id="5"><label for="5">☆</label>
            <input type="radio"  wire:model="rate" name="rate" value="4" id="4"><label for="4">☆</label>
            <input type="radio"  wire:model="rate" name="rate" value="3" id="3"><label for="3">☆</label>
            <input type="radio"  wire:model="rate" name="rate" value="2" id="2"><label for="2">☆</label>
            <input type="radio"  wire:model="rate" name="rate" value="1" id="1"><label for="1">☆</label>
        </div>

        <div class="comment-area mb-2">
            <input type="text" wire:model="subject" class="form-control" placeholder="Subject"/>
            <div class="m-2">
                @error('subject') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </div>

        <div class="comment-area mb-2">
            <textarea class="form-control" wire:model="comment" placeholder="what do you think of this job?"
                      rows="4"></textarea>
            <div class="m-2">
                @error('comment') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </div>

        <div class="comment-btns mt-2">
            <div class="row">
                <div class="col text-center">

                    @auth

                    <button class="btn btn-success send px-5" value="save">Send</button>

                    @else
                        <a href="/login" class="btn btn-primary">Login to submit a comment!</a>
                    @endauth
                </div>
            </div>
        </div>


    </form>

</div>
