@extends('layouts.back')

@section('content')
<div class="border-bottom pb-3 mb-2">
    <h2 class="d-inline">Create a new Order</h2>
    <a href="{{ route('order.index') }}" class="float-right btn btn-primary">
        <i class="mr-1 fas fa-shopping-cart"></i> List all Orders
    </a>
</div>
<form action="{{ route('order.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col">
                    <span class="text-muted">User Order</span>
                    <select class="custom-select custom-select-sm mb-2" name="user_id" required>
                        <option selected>--pilih user--</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col text-right">
                    <span class="text-muted">Order Number</span>
                    <h4>#{{ $orderNumber }}</h4>
                    <input type="hidden" name="order_number" value="{{ $orderNumber }}">
                </div>
            </div>

            <table class="table" id="tableOrder">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="align-middle">1</td>
                        <td class="align-middle">
                            <select class="custom-select custom-select-sm productName" name="product_id[]" required>
                                <option>--pilih product--</option>
                                @foreach ($products as $product)
                                <option data-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="price[]" value="">
                        </td>
                        <td class="align-middle">
                            <select class="custom-select custom-select-sm quantity" name="quantity[]">
                                <option>--quantity--</option>
                                @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                        <td class="showPrice align-middle">
                            Rp. <span class="float-right">0</span>
                        </td>
                        <td class="align-middle">
                            <a href="#" id="addOrderForm" class="btn btn-primary mb-2"><i class="fas fa-plus"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="float-right btn btn-primary">Submit Data</button>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>

const formatMoney = (amount, decimalCount = 2, decimal = ",", thousands = ".") => {
    try {
        decimalCount = Math.abs(decimalCount)
        decimalCount = isNaN(decimalCount) ? 2 : decimalCount

        const negativeSign = amount < 0 ? "-" : ""

        let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString()
        let j = (i.length > 3) ? i.length % 3 : 0

        return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "")
    } catch (e) {
        console.log(e)
    }
}

$(function() {

    let maxField = 10
    let addButton = $('#addOrderForm')
    let wrapper = $('#tableOrder')
    let x = 1

    //Once add button is clicked
    $(addButton).click(function(){
        let i = $('#tableOrder tbody tr').length + 1
        let fieldHTML = `<tr>
            <td class="align-middle">${i}</td>
            <td class="align-middle">
                <select class="custom-select custom-select-sm productName" name="product_id[]" required>
                    <option>--pilih product--</option>
                    @foreach ($products as $product)
                    <option data-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="price[]" value="">
            </td>
            <td class="align-middle">
                <select class="custom-select custom-select-sm quantity" name="quantity[]">
                    <option>--quantity--</option>
                    @for ($i = 1; $i < 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </td>
            <td class="showPrice align-middle">Rp. <span class="float-right">0</span></td>
            <td class="align-middle">
                <a href="#" class="removeOrderForm btn btn-danger mb-2"><i class="fas fa-times"></i></a>
            </td>
        </tr>`

        if(x < maxField){
            x++
            $(wrapper).append(fieldHTML)
        } else {
            alert('Maksimal 10 product')
        }
    });

    const productName = $('.productName')
    const showPrice = $('.showPrice')

    $(wrapper).on('click', '.removeOrderForm', function(e){
        e.preventDefault()
        $(this).parents('tr').remove()
        x--
    })

    $(productName).change(function() {
        let price = $(this).find(':selected').data('price')
        $(this).parent().siblings(showPrice).children('span').text(`${formatMoney(price)}`)
        $(this).siblings('input').val(`${price}`)
    })

    // $('.quantity').change(function() {
    //     let quantity = $(this).val()
    //     var totalQuantity = $(this).parent().siblings(showPrice).children('span').text(`${quantity}`)
    // })

    $(wrapper).on('change', '.productName', function() {
        let price = $(this).find(':selected').data('price')
        $(this).parent().siblings(showPrice).children('span').text(`${formatMoney(price)}`)
        $(this).siblings('input').val(`${price}`)
    })
})
</script>
@endpush
