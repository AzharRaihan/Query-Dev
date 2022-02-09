<?php

namespace App\Http\Controllers;

use App\Album;
use App\Gallery;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    // Inner Join
    public function innerJoin(){
        $data = DB::table('students')
        ->select('students.name','students.phone','subjects.subject_name')
        ->join('subjects', 'subjects.student_id','=','students.id')
        ->get();
        dd($data);
    }
    // Left Join
    public function leftJoin(){
        $data = DB::table('students')
        ->select('students.name','students.phone','subjects.subject_name')
        ->leftJoin('subjects', 'subjects.student_id','=','students.id')
        ->get();
        dd($data);
    }
    // Right Join
    public function rightJoin(){
        $data = DB::table('students')
        ->select('students.name','students.phone','subjects.subject_name')
        ->rightJoin('subjects', 'subjects.student_id','=','students.id')
        ->get();
        dd($data);
    }
    // Cross Join
    public function crossJoin(){
        $data = DB::table('students')
        ->select('students.name','students.phone','subjects.subject_name')
        ->crossJoin('subjects')
        ->get();
        dd($data);
    }
    // Advance Join
    public function advanceJoin(){
        $data = DB::table('students')
        ->select('students.name','students.phone','subjects.subject_name')
        ->join('subjects', function($join){
            $join->on('subjects.student_id','=','students.id')->where('students.id','=',1);
        })
        ->get();
        dd($data);
    }

    // Sub Query Join
    public function subQueryJoin(){
        $subjectsData = DB::table('subjects')->select('student_id','subject_name');
        $data = DB::table('students')
        ->joinSub($subjectsData, 'subjectsData', function($join){
            $join->on('subjectsData.student_id','=','students.id');
        })
        ->get();
        dd($data);
    }


    public function deleteY($id){
        $year = Year::findOrFail($id);
        foreach($year->albums() as $item){
            $item->delete();
        }
        $year->delete();
        return 'success';
    }
    public function deleteA($id){
        $album = Album::findOrFail($id);
        $album->gallery()->delete();
        $album->delete();
        return 'success';
    }
    public function deleteG($id){
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return 'success';
    }
}
