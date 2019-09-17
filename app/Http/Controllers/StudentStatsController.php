<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::from('students as s')
            ->select(
                'c.title as course',
                's.gender as gender',
                \DB::raw("count(case when s.birthday > date_format(adddate(now(), interval -15 year), '%Y-%m-%d') then 'under_15_years' end) as under_15_years"),
                \DB::raw("count(case when s.birthday between date_format(adddate(now(), interval -18 year), '%Y-%m-%d') and date_format(adddate(now(), interval -15 year), '%Y-%m-%d') then 'between_15_and_18_years' end) as between_15_and_18_years"),
                \DB::raw("count(case when s.birthday between date_format(adddate(now(), interval -24 year), '%Y-%m-%d') and date_format(adddate(now(), interval -19 year), '%Y-%m-%d') then 'between_19_and_25_years' end) as between_19_and_25_years"),
                \DB::raw("count(case when s.birthday between date_format(adddate(now(), interval -30 year), '%Y-%m-%d') and date_format(adddate(now(), interval -25 year), '%Y-%m-%d') then 'between_25_and_30_years' end) as between_25_and_30_years"),
                \DB::raw("count(case when s.birthday < date_format(adddate(now(), interval -30 year), '%Y-%m-%d') then 'greater_then_30_years' end) as greater_then_30_years"),
                \DB::raw('COUNT(s.id) as total_students')
            )
            ->join('enrollments as e', 'e.student_id', '=', 's.id')
            ->join('courses as c', 'e.course_id', '=', 'c.id')
            ->groupBy('s.gender', 'c.title')
            ->orderBy('c.title', 'ASC')
            ->get();

        return response()->json([
            'data' => $students
        ]);
    }
}
