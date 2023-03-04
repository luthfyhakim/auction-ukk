@extends('layouts.user-master')

@section('title', '| Lelang Diikuti')

@section('title-header', 'Lelang Diikuti')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Lelang Diikuti <span>({{ $auctionHistories->count() }})</span></h4>
        <div class="card-header-action">
            <button class="btn btn-danger" id="modal-4">Ekspor <i class="fas fa-file-export"></i></button>
        </div>
    </div>

    <!-- Export Modal -->
    <form class="modal-part" id="modal-cetak" target="_blank" action="{{ route('user.auction-histories.export_filter') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="start_export">Dari</label>
            <div class="input-group">
                <input type="date" name="start_export" id="start_export" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="end_export">Sampai</label>
            <div class="input-group">
                <input type="date" name="end_export" id="end_export" class="form-control">
            </div>
        </div>
        <div class="form-group row mb-4 float-right">
            <div class="col-sm-12 col-md-7 float-right">
                <button class="btn btn-primary">Cetak</button>
            </div>
        </div>
    </form>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Awal</th>
                    <th scope="col">Penawaran Saya</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Berakhir</th>
                    <th scope="col">Aksi</th>
                    @foreach ($auctionHistories as $auctions_history)
                    <tr>
                        <td>{{ !empty($auctions_history->goods->goods) ? $auctions_history->goods->goods : '' }}</td>
                        <td>Rp. {{ !empty($auctions_history->goods->initial_price) ? $auctions_history->goods->initial_price : '' }}</td>
                        <td>Rp. {{ $auctions_history['bid'] }}</td>
                        <td>{{ !empty($auctions_history->auction->start_date) ? custom_date($auctions_history->auction->start_date, 'd M Y') : '' }}</td>
                        <td>{{ !empty($auctions_history->auction->end_date) ? custom_date($auctions_history->auction->end_date, 'd M Y') : '' }}</td>
                        <td>
                            <a href="{{ 'auctions/' . $auctions_history->auction_id . '/detail' }}" class="btn btn-info"><i class="fa fa-search"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{ $auctionHistories->links() }}
            </ul>
        </nav>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>
@endpush
