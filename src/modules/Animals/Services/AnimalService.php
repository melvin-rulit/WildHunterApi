<?php

namespace Modules\Animals\Services;

use Modules\Animals\Models\Animal;

class AnimalService
{
    public function getAnimals(): array
    {
        $animals = Animal::where('status', 'publish')
            ->get();

        return [
            'animals' => $animals,
        ];
    }
}
