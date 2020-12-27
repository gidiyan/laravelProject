@component('mail::message')
    # Introduction

    The body of your message.


    @component('mail::button', ['url' => $url, 'color' => 'success'])
        View Order
    @endcomponent

    @component('mail::panel')
        This is the panel content.
    @endcomponent

    @component('mail::table')
        |      Id       | Ordered At         | Price  |
        | ------------- |:-------------:| --------:|
        | {{ $order->order_number }}      | {{ $order->created_at }}      | {{ $order->grand_total }}      |
    @endcomponent


    Thanks,
    {{ config('app.name') }}
@endcomponent
