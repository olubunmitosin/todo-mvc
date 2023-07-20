@if (session()->has('success'))
    <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('status'))
    <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
        {{ session()->get('status') }}
    </div>
@endif
@if (session()->has('message'))
    <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
        {{ session()->get('error') }}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert bg-danger" role="alert">
        @foreach($errors->all() as $error)
            <li style="list-style: none;" class="text-white">{{ $error }}</li>
        @endforeach
    </div>
@endif