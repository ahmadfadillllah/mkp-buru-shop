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
                        <p>Penjual: {{ $p->name }}</p>
                        <div class="quickview-plus-minus">
                            <div class="cart-plus-minus">
                                <input type="text" value="1" name="quantity" class="cart-plus-minus-box">
                            </div>
                            <div class="quickview-btn-cart">
                                <a class="btn-hover-black" href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="{{ $kp->namakategori }}" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-compare-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#">
                    <div class="table-content compare-style table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <a href="#">Remove <span>x</span></a>
                                        <img src="{{ asset('home') }}/assets/img/cart/4.jpg" alt="">
                                        <p>Blush Sequin Top </p>
                                        <span>$75.99</span>
                                        <a class="compare-btn" href="#">Add to cart</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Description </h4>
                                    </td>
                                    <td class="compare-dec compare-common">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has beenin the stand ard dummy text ever since the
                                            1500s, when an unknown printer took a galley</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Sku </h4>
                                    </td>
                                    <td class="product-none compare-common">
                                        <p>-</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Availability </h4>
                                    </td>
                                    <td class="compare-stock compare-common">
                                        <p>In stock</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Weight </h4>
                                    </td>
                                    <td class="compare-none compare-common">
                                        <p>-</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Dimensions </h4>
                                    </td>
                                    <td class="compare-stock compare-common">
                                        <p>N/A</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>brand </h4>
                                    </td>
                                    <td class="compare-brand compare-common">
                                        <p>HasTech</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>color </h4>
                                    </td>
                                    <td class="compare-color compare-common">
                                        <p>Grey, Light Yellow, Green, Blue, Purple, Black </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>size </h4>
                                    </td>
                                    <td class="compare-size compare-common">
                                        <p>XS, S, M, L, XL, XXL </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title"></td>
                                    <td class="compare-price compare-common">
                                        <p>$75.99 </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
