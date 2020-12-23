@component('mail::message')
    # Introduction

    @component('mail::panel')
        Button Text
        @component('mail::button', ['url' => ''])
            Button Text
        @endcomponent
    @endcomponent

    The body of your message.



    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
