@if(session()->has('flash_message'))

    <div class="alert alert-{{session()->get('flash_message_level')}} alert-dismissable" role="alert" style="opacity: .5;">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true" ></span><span class="sr-only">close</span>
        </button>
        {{session()->get('flash_message')}}
    </div>

@endif