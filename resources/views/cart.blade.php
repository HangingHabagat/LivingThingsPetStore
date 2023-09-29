@extends('shop')

@section('content')
    <div class="m-1, p-2">
        <table id="cart" class="table table-bordered">

            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Modify</th>
                </tr>
            </thead>

            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)

                        <tr rowId="{{ $id }}">
                            <td data-th="Product">
                                <div class="cart-thumbnail">
                                    <div class="card">
                                            <div class="card-header" >
                                            <img src="{{asset('images') }}/{{ $details['picture' ]}}"
                                            class="card-img" alt="product-img"/>
                                            </div>
                                            <div class="card-body">
                                            <small class="align-center">{{ $details['title'] }}</small>
                                            </div>
                                    </div>
                                </div>
                            </td>

                            <td data-th="Price" class="text-center">PHP {{ $details['price'] }}</td>
                            <td data-th="Quantity" class="text-center">{{$details['quantity']}}</td>
                            <td data-th="Subtotal" class="text-center"> Insert Here</td>

                            <td class="actions">
                                <a class="btn btn-outline-danger btn-sm delete-product">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="4">
                        <strong> Grand Total</strong>
                    </td>
                    <td colspan="2" class="text-center">
                        PHP SUM
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-angle-left">
                            </i> Continue Shopping</a>
                        <button class="btn btn-danger">Checkout</button>
                        <button class="btn btn-danger" href="/checkout">Checkout</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">

        $(".edit-cart-info").change(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.shopping.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                },
                success: function (response) {
                window.location.reload();
                }
            });
        });

        $(".delete-product").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
@endsection
