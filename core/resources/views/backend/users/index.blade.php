@extends('backend.layout.master')
@push('style')
    <style>
        img {
            border-radius: 50%;
            vertical-align: top;
            width: auto;
            max-width: 50%;
            max-height: auto;
            object-fit: cover;
        }

        h5 {
            font-size: 13px;
            font-weight: 400px;
            font-family: sans-serif;
            color: #777;
        }

    </style>
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                </div>
            </div>

            


            <div class="section-body ">
                <div class="card">
                    <div class="card-header">
                        <h4></h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="search by name or email">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">

                    
                {{-- <div class="row">
                    @forelse($users as $key => $user)
                        @php
                            
                            $membership = App\Models\Payment::with('membership')
                                ->where('user_id', $user->id)
                                ->where('payment_status', 1)
                                ->whereDate('expire_date', '>', Carbon\Carbon::now())
                                ->first();
                            
                        @endphp
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card shadow rounded p-3">
                                <div class="d-flex justify-content-between">
                                    <h6>{{ $user->fullname }}</h6>
                                    <div>
                                        @if ($user->status)
                                            <span class="badge bg-gradient-success text-white">{{ __('Active') }}</span>
                                        @else
                                            <span class='badge bg-gradient-danger text-white'>{{ __('Inactive') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="content text-center mt-3 mb-3">
                                    @if ($user->image)
                                        <img src="{{ getFile('user', $user->image) }}" alt="img">
                                    @else
                                        <img src="{{ getFile('default', @$general->default_image) }}" alt="img">
                                    @endif

                                </div>

                                <div class="mt-2 mb-3">
                                    <h5>{{ __('Join: ') }} {{ $user->created_at->format('d M, Y') }}</h5>
                                    <h5>{{ __('Email:') }} <span>{{ $user->email }}</span></h5>
                                    <h5>{{ __('Address:') }}
                                        <span>{{ isset($user->address->city) ? $user->address->city . ', ' . $user->address->country : 'Not Updated' }}</span>
                                    </h5>
                                    <h5>{{ __('Membership:') }} <span>
                                            @if ($membership)
                                                {{ @$membership->membership->name }} @
                                                {{ @$membership->expire_date->format('M d, Y H:i:s A') }}
                                            @else
                                                {{ __('Membeship Not Updated') }}
                                            @endif

                                        </span></h5>

                                </div>

                                <div class="d-flex justify-content-between ">
                                    <a href="{{ route('admin.user.details', $user) }}" class="btn btn-primary"><i
                                            class="fa fa-pen"></i></a>
                                    <a href="{{ route('admin.user.history', $user) }}"
                                        class="btn btn-primary">{{ __('History') }}</a>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 mt-5">
                            <h4 class="text-center">{{ __('User Not Found') }}</h4>
                        </div>
                    @endforelse
                </div>
                {{ $users->links('backend.partial.paginate') }} --}}

            </div>
        </div>
    </div>
        </section>
    </div>
@endsection
