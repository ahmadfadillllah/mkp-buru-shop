<div class="modal fade" id="detailProduk{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-quickview-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="qwick-view-left">
                    <div class="quick-view-learg-img">
                        <div class="quick-view-tab-content tab-content">
                            <div class="tab-pane active show fade" id="modal1{{ $p->id }}" role="tabpanel">
                                <img src="{{ asset('admin/template/assets/images/') }}/{{ $p->gambarproduk1 }}" alt="">
                            </div>
                            <div class="tab-pane fade" id="modal2{{ $p->id }}" role="tabpanel">
                                <img src="{{ asset('admin/template/assets/images/') }}/{{ $p->gambarproduk2 }}" alt="">
                            </div>
                            <div class="tab-pane fade" id="modal3{{ $p->id }}" role="tabpanel">
                                <img src="{{ asset('admin/template/assets/images/') }}/{{ $p->gambarproduk3 }}" alt="">
                            </div>
                            <div class="tab-pane fade" id="modal4{{ $p->id }}" role="tabpanel">
                                <img src="{{ asset('admin/template/assets/images/') }}/{{ $p->gambarproduk4 }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="quick-view-list nav" role="tablist">
                        <a href="#modal2{{ $p->id }}" data-bs-toggle="tab" role="tab">
                            <img src="{{ asset('admin/template/assets/images/') }}/{{ $p->gambarproduk2 }}" width="100">
                        </a>
                        <a href="#modal3{{ $p->id }}" data-bs-toggle="tab" role="tab">
                            <img src="{{ asset('admin/template/assets/images/') }}/{{ $p->gambarproduk3 }}" width="100">
                        </a>
                        <a href="#modal4{{ $p->id }}" data-bs-toggle="tab" role="tab">
                            <img src="{{ asset('admin/template/assets/images/') }}/{{ $p->gambarproduk4 }}" width="100">
                        </a>
                    </div>
                </div>
                <div class="qwick-view-right">
                    <div class="qwick-view-content">
                        <h3>{{ $p->namaproduk }}</h3>
                        <div class="price">
                            <span class="new">@currency($p->hargaproduk)</span>
                        </div>
                        <p>{{ $p->deskripsiproduk }}</p>
                        <div class="quick-view-select">
                            <div class="select-option-part">
                                <label>Kategori Produk</label>
                                <select class="select">
                                    <option value="">- {{ $p->kategoriproduk }} -</option>
                                </select>
                            </div>
                        </div>
                        <p>Penjual: {{ $p->name }} - <a href="{{ route('home.toko', $p->user_id) }}">(Kunjungi Toko)</a></p>
                        @if (Auth::user())
                        @foreach ($user->where('name',$p->name) as $item)
                            <a href="/public/Chat/{{ $p->user_id }}">
                                <p>Chat Penjual? Klik Disini!</p>
                            </a>
                        @endforeach
                        <div class="quickview-plus-minus">
                            <div class="quickview-btn-cart">
                                <a class="btn-hover-black" href="{{ route('home.addcart', $p->id) }}">Tambah ke keranjang</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
