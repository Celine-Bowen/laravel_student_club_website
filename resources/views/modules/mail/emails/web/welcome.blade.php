@component('mail::message')
### Hello {{ $user->name }}!

Welcome to {{ config('app.name') }}. You have successfuly registered as a member of {{ config('app.nick') }} with {{ $user->email }} as your email address.

#### Next Step
* Verify Your Email Address through the verification email,
* Complete your profile,
* Connect & Learn with us.

Regrads,<br>
{{ config('app.nick') }} team.

@component('mail::subcopy')
  Connect with us<br>
  <a href="https://github.com/"><img src="https://copatechclub.com/assets/images/icons/social/github.png" alt="GitHub"></a> <a href="https://twitter.com/"><img src="https://copatechclub.com/assets/images/icons/social/twitter.png" alt="Twitter"></a> <a href="https://www.youtube.com/channel/"><img src="https://copatechclub.com/assets/images/icons/social/youtube.png" alt="YouTube"></a> <a href="https://telegram.me/"><img src="https://copatechclub.com/assets/images/icons/social/telegram.png" alt="Telegram"></a>
@endcomponent
@endcomponent
