<?php

namespace App\Imports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\ToModel;

class ScheduleImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Schedule([
            'id' => $row[0],
            'classroom_name' => $row[1],
            'course_name' => $row[2],
            'location_name' => $row[3],
            'time_description' => $row[4],
            'lecturer_nidn' => $row[5],
            'academic_year' => $row[6],
            'total_students' => $row[7]
        ]);
    }
}
