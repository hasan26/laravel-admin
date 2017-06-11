<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $order->id !!}</p>
</div>

<!-- Meja Field -->
<div class="form-group">
    {!! Form::label('meja', 'Meja:') !!}
    <p>{!! $order->meja !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $order->created_at !!}</p>
</div>


<div class="form-group">
    <table class="table table-responsive" id="orders-table">
        <thead>
        <th>Menu</th>
        <th>qty</th>
        </thead>
        <tbody>
        @foreach($order->detail as $detail)
            <tr>
                <td>{!! $detail['menu']['name'] !!}</td>
                <td>{!! $detail['qty'] !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>




