@component('mail::message')
# Seu código de autenticação de dois fatores

Seu código de autenticação de dois fatores é: **{{ $twoFactorCode }}**

Por favor, use este código para concluir o processo de autenticação de dois fatores.

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
