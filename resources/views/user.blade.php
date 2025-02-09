@include("subview.header")

<div class="fs-1 text-center text-danger my-2">
     this is an user page.
</div>
<h1 class="text-center fs-3">
     {{Auth::user()->name}}
</h1>
<div class="d-flex align-items-center">
     <a href="{{route("logout")}}">
          <button class="btn btn-primary">Logout</button>
     </a>
     @can("isAuthor")
           <a href="{{route("author")}}">
                 <button class="btn btn-successs">Author</button>
           </a>
      @endcan
</div>

@include("subview.footer")