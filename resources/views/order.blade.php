@extends('shop')

@section('content')
    <div class="m-1, p-2">
        <h1> Please review the details </h1>
        <div class="checkout">
        <h1>Order Summary</h1>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Order Summary <button class="btn bg-white btn-outline">Edit</button>
                    </div>
                    <div class="cdc">
                        <table id="cart" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Item </th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            <tr rowId="{{ $id }}">
                                                <td data-th="Item">
                                                    <div class="cart-summary">
                                                            <div class="card">
                                                                <div class="card-header" >
                                                                <img src="{{asset('images') }}/{{ $details['picture' ]}}"
                                                                class="card-img" alt="product-img"/>
                                                                </div>
                                                                <div class="card-body">
                                                                <small class="align-center">{{ $details['title'] }}</small>
                                                                <small class="align-left">
                                                                    Price: PHP {{ $details['price'] }}
                                                                </small>
                                                                <small class="">
                                                                   Quantity: {{$details['quantity']}}
                                                                </small>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </td>

                                                <td data-th="Subtotal" class="text-center">
                                                    Insert Subtotal
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="1">
                                            <strong> Grand Total</strong>
                                        </td>
                                        <td colspan="2" class="text-center">
                                            PHP SUM
                                        </td>

                                    </tr>
                                </tfoot>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Delivery and Payment Details
                    </div>
                    <div class="card-body">
                        <h2>Insert Fom Here</h2>
                        <ul>
                            <li>Name: {{Auth::user()->name}} </li>
                            <li>Email: </li>
                            <li>Contact Number:</li>
                            <li>Address: </li>
                            <li>Mode of Payment:</li>

                            <small>Note: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui nulla, hic corrupti iste alias nemo, recusandae eos similique maiores debitis cum dolore architecto tempore iure accusamus quas, velit ea ex.</small>
                        </ul>
                        <button>
                            Confirm Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
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
