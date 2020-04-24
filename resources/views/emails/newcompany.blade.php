@component('mail::message')
# New company created

A new company has been created!

@component('mail::button', ['url' => url('companies/'.$company->id), 'color' => 'primary'])
View Company
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
