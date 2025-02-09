@include("subview.header")

<div class="fs-1 text-danger my-2">
     this is an author page.
</div>
<div>
     <x-navbar name="{{Auth::user()->name}}" role="{{Auth::user()->role}}" />
</div>

@include("subview.footer")