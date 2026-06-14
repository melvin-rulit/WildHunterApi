<?php
return [
    'name' => [
        'model_name' => 'Оружие',
    ],
    'errors' => [

    ],
    'rules' => [

    ],
    'validation' => [
        'hunter_license_number_required' => 'Номер лицензии обязателен',
        'hunter_license_number_string' => 'Номер лицензии должен быть строкой',

        'hunter_license_date_required' => 'Дата лицензии обязательна',
        'hunter_license_date_invalid' => 'Неверная дата лицензии',

        'weapon_type_required' => 'Тип оружия обязателен',
        'weapon_type_not_found' => 'Тип оружия не найден',

        'caliber_required' => 'Калибр обязателен',
        'caliber_string' => 'Калибр должен быть строкой',
    ],
    'successes' => [
        'save_success' => 'Оружие сохранено.',
    ]
];
