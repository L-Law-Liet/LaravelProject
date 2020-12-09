<p>FullName: {{ $order->name }}</p>
<p>Email: {{ $order->email }}</p>

<b>Products:</b>
@php
$total = 0;
@endphp
    @foreach($orderItems as $o)
        @php
            $p = App\Models\Product::find($o->pId);
        @endphp
	<p>{{ $p->name }} x {{ $o->count }}, cost: {{ $p->price }}$</p>
        @php
            $total += ($p->price*(1-$p->discount/100))*$o->count;
        @endphp
@endforeach

<p>
	<b>Total:</b> {{ number_format($total, 0, "", " ") }}$
</p>
