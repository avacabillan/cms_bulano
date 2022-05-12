

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Bulano Accounting & Auditing Firm</a>
    </li>
  </ul>
  <div></div>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
    <i class="fas fa-envelope fa-lg"></i>
    @if(auth()->user())
    @forelse(auth()->user()->notifications->whereNull('read_at') as $notification)

    <span class="position-absolute top-10 start-60 translate-middle badge rounded-pill bg-danger">{{$notification->where('type', 'App\Notifications\AssocNewMessageNotification')->whereNull('read_at')->count()}}</span>&nbsp;&nbsp; 
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width:40rem;">
    <span class="dropdown-header">{{$notification->where('type', 'App\Notifications\ClientNewMessageNotification')->whereNull('read_at')->count()}} Notifications</span>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">
    <div class="mt-2 ml-3">
      @if($notification->type == 'App\Notifications\AssocNewMessageNotification')
        <div class="alert alert-success" role="alert">
          Client {{ $notification->data['name'] ?? "" }}  sent a message.
         <a href="{{route('assoc.markNotification')}}" class="float-right mark-as-read" data-id="{{ $notification->id }}">
             Mark as read
         </a>
        </div>
        @else
        <div class="alert alert-success" role="alert">
          User {{ $notification->data['name'] ?? "" }} ({{ $notification->data['email'] ?? ""}}) was assigned to you.
         <a href="{{route('assoc.markNotification')}}" class="float-right mark-as-read" data-id="{{ $notification->id }}">
             Mark as read
         </a>
        </div>
      @endif
          <div class="alert alert-success me-3" role="alert" style="padding-bottom: 15%;">
             <p class="text-dark"> {{Auth::user()->clients->associates->name}} has sent a message.</p>
              <a href="{{route('admin.markNotification')}}" class="float-right mark-as-read text-dark" data-id="{{ $notification->id }}">
                  Mark as read
              </a>
          </div>
  
          @if($loop->last)
              <a href="{{route('admin.markNotification')}}" id="mark-all">
                  Mark all as read
              </a>
          @endif
          @empty
              There are no new notifications 
          @endforelse
      @endif
    </div>

    
    </li>



  
  {{-- <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-bell"></i>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width:40rem;">
      <div class="mt-2 ml-3">
      @if(auth()->user())
      
        @forelse(auth()->user()->notifications->whereNull('read_at') as $notification)
        @if($notification->type == 'App\Notifications\AssocNewMessageNotification')
        <div class="alert alert-success" role="alert">
          Client {{ $notification->data['name'] ?? "" }}  sent a message.
         <a href="{{route('assoc.markNotification')}}" class="float-right mark-as-read" data-id="{{ $notification->id }}">
             Mark as read
         </a>
        </div>
        @else
        <div class="alert alert-success" role="alert">
          User {{ $notification->data['name'] ?? "" }} ({{ $notification->data['email'] ?? ""}}) was assigned to you.
         <a href="{{route('assoc.markNotification')}}" class="float-right mark-as-read" data-id="{{ $notification->id }}">
             Mark as read
         </a>
     </div>
        @endif
        
  
          @if($loop->last)
              <a href="{{route('assoc.markNotification')}}" id="mark-all">
                  Mark all as read
              </a>
          @endif
          @empty
              There are no new notifications
          @endforelse
      @endif
    </div>
    </ul>
  </div> --}}
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="btn btn-light" href="{{'logout'}}" role="button"><i class="fal fa-sign-out-alt"></i> Logout</a>
    </li>
  </ul>
  <ul>
    
  </ul>
</nav>
