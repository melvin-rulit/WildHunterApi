<?php
return [
    'errors' => [
        'current_password_incorrect' => 'Текущий пароль неверный',
        'password_confirmation_mismatch' => 'Пароли не совпадают',
        'code_invalid' => 'Неверный код подтверждения.',
        'code_expired' => 'Код истёк или недействителен.',
        'code_already_sent' => 'Код уже отправлен. Попробуйте позже',
    ],
    'rules' => [

    ],
    'validation' => [
        'current_password_required' => 'Текущий пароль обязателен',
        'new_password_required'  => 'Новый пароль обязателен',
        'new_password_confirmed'  => 'Подтверждение пароля не совпадает',
        'new_password_different'  => 'Новый пароль должен отличаться от текущего',
        'confirmation_password_required'  => 'Подтверждение пароля обязательно',

        'password_reset' => [
            'email_required' => 'Укажите адрес электронной почты.',
            'email_invalid' => 'Укажите корректный адрес электронной почты.',
            'email_max' => 'Адрес электронной почты не должен превышать 255 символов.',
            'email_not_found' => 'Пользователь с таким email не найден',

            'code_required' => 'Введите код подтверждения.',
            'code_digits' => 'Код должен состоять из 6 цифр.',

            'password_required' => 'Пароль обязателен',
            'password_min'      => 'Пароль должен быть минимум 8 символов',
            'password_upper_lower' => 'Пароль должен содержать заглавные и строчные буквы',
            'password_number' => 'Пароль должен содержать хотя бы одну цифру',
            'password_compromised' => 'Этот пароль найден в утечках данных. Выберите другой пароль.',
        ]

    ],
    'email' => [
        'reset_code_subject' => 'Сброс пароля',
        'reset_code_hello' => 'Здравствуйте!',
        'reset_code_body' => ' Вы получили это письмо, потому что был получен запрос на сброс пароля для вашей учетной записи.',
        'reset_code_warning' => 'Если вы не запрашивали сброс пароля, никаких действий не требуется.',
    ],
    'successes' => [
        'password_update_successfully' => 'Пароль успешно обновлен',
        'code_send_successfully' => 'Код успешно отправлен на указанную почту. Код действителен :minutes минут.',
    ]
];
