<?php
namespace App\Enums;
enum Gender: string
{
    case MALE = 'M';
    case FEMALE = 'F';
    case OTHER = 'O';

    public function label():string
    {
        return match ($this){
            self::MALE => 'Maculino',
            self::FEMALE => 'Femenino',
            self::OTHER => 'Otro',
        };
    }
    public static function options(): array
    {
        return collect(self:cases())
            ->map(fn(self $genero)=>[
                'value'=>$gender->value,
                'label'=>$gender->label(),
            ])
            ->toArray();
    }
}