@extends('Email::layout')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; font-family: Arial, sans-serif;">

        <div style="padding: 30px; color: #1f2a44;">

            <h2 style="margin-top: 0;">{{ $hello }}</h2>

            <p style="font-size: 14px; line-height: 1.6;">
            {{ $bodyText }}
            </p>

            <p style="font-size: 13px; color: #555; line-height: 1.5;">
                Срок действия кода для сброса пароля истекает через {{ $ttl }} минут.
            </p>

            <p style="font-size: 13px; color: #555; line-height: 1.5;">
               {{ $warning }}
            </p>

            @if(!empty($code))
                <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;">

                <div style="font-size: 22px; font-weight: bold; text-align: center; margin: 10px 0;">
                    {{ $code }}
                </div>
            @endif
        </div>
    </div>
@endsection
