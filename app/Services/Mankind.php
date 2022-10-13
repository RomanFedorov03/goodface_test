<?php

namespace App\Services;


use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Mankind
{
    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return Person::all();
    }

    /**
     * @param $id
     * @return Builder|Collection|Model|null
     */
    public function getById($id)
    {
        return Person::query()->find($id);
    }

    /**
     * @param $request
     * @return void
     */
    public function loadCSV($request)
    {
        $persons = [];
        if (($open = fopen($request->csv, "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ";")) !== FALSE) {
                $persons[] = $data;
            }
            fclose($open);
        }

        foreach ($persons as $person) {
            Person::query()->firstOrCreate(
                [
                    'id' => $person[0],
                ],
                [
                    'name' => $person[1],
                    'surname' => $person[2],
                    'sex' => $person[3],
                    'birth_date' => Carbon::parse($person[4]),
                ]
            );
        }
    }

    /**
     * @return int[]
     */
    public function sexPercent(): array
    {
        $persons = Person::all();
        $all_count = $persons->count();
        if ($all_count) {
            $mCount = $persons->where('sex', 'M')->count();
            $mPercent = round((100 / $all_count) * $mCount, 2);
            $fPercent = round(100 - $mPercent, 2);
        }
        return [
            'm' => $mPercent ?? 0,
            'f' => $fPercent ?? 0,
        ];


    }
}
