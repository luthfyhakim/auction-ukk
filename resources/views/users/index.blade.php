@extends('layouts.user-master')

@section('title', '| Beranda')

@section('title-header', 'Beranda')

@section('content')
<div class="row">
    <!-- Goodies -->
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-ring"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Barang</h4>
                </div>
                <div class="card-body">
                    {{ $goodies->count() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Following -->
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Mengikuti Lelang</h4>
                </div>
                <div class="card-body">
                    {{ $auction_histories->count() }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-book-reader"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>My Lelang</h4>
                </div>
                <div class="card-body">
                    {{ $auctions->count() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<div class="row">
    <div class="col-lg col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Recent Activities</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    @foreach ($users as $user)
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="{{ $user->avatar ? asset('usersFile/' . $user->avatar) : '/stisla/assets/img/avatar/avatar-1.png' }}" alt="avatar">
                            <div class="media-body">
                                <div class="float-right text-primary">{{ date_format($user->created_at, "d M Y") }}</div>
                                <div class="media-title">{{ $user->name }}</div>
                                <span class="text-small text-muted">{{ $user->description ? Str::limit($user->description, 50, '...') : 'tidak ada deskripsi' }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            {{ $users->links() }}
                        </ul>
                    </nav>
                </div>
                {{-- <div class="text-center pt-1 pb-1">
                    <a href="#" class="btn btn-primary btn-lg btn-round">
                    View All
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
