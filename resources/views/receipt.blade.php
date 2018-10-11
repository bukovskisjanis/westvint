{{ $vendor->name }}
{{ $vendor->address }}
{{ $vendor->city }}
{{ $vendor->country}}
{{ $vendor->phone}}
{{ $vendor->email}}

{{ $owner->name }}
{{ $owner->address }}
{{ $owner->city }}
{{ $owner->country}}
{{ $owner->phone}}
{{ $owner->email}}


@foreach( $products as $product)
	    {{ $product->name }}
        {{ $product->quantity }}
        {{ $product->price }}
        {{ $product->total }}
@endforeach



{{ $transaction->id}}
{{ $transaction->subtotal}}
{{ $transaction->discount}}
{{ $transaction->delivery}}
{{ $transaction->tax}}
{{ $transaction->total}}
{{ $transaction->createdAt}}
{{ $transaction->meta}}


