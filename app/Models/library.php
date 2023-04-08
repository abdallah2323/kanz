<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class library extends Model
{
    use HasFactory;

    protected $table = 'libraries';

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

    public function education()
    {
        return $this->belongsTo(Education::class, 'education_id', 'id');
    }

    public static function getLibraries($semester, $education , $material , $type)

    {
        //  return $semester;
        $libs = DB::table('libraries');



        if (isset($education) && $education != "المستوى الدراسي"){
            // $semester = lcfirst($semester);

                if ( isset($semester) && $semester != "الفصل الدراسي" ){

                    if ( isset($material) && $material != "المواد التعليمية" ){

                        if(isset($type) && $type != "نوع المرفق"){
                            $libs = $libs->where('education_id', $education)
                        ->where('semester', $semester)
                        ->where('material_id', $material)
                        ->where('attachment_type', $type)
                        ->get();
                        }else{
                            $libs = $libs->where('education_id', $education)
                            ->where('semester', $semester)
                            ->where('material_id', $material)
                            ->get();
                        }


                    }else{
                        $libs = $libs->where('education_id', $education)
                        ->where('semester', $semester)->get();

                    }

                }else{
                    $libs = $libs->where('education_id', $education)->get();

                }

        }else  if ( isset($semester) && $semester != "الفصل الدراسي" ){

            if ( isset($material) && $material != "المواد التعليمية" ){

                if(isset($type) && $type != "نوع المرفق"){
                    $libs = $libs
                ->where('semester', $semester)
                ->where('material_id', $material)
                ->where('attachment_type', $type)
                ->get();
                }else{
                    $libs = $libs
                    ->where('semester', $semester)
                    ->where('material_id', $material)
                    ->get();
                }


            }else{
                $libs = $libs
                ->where('semester', $semester)->get();

            }

        }else if ( isset($material) && $material != "المواد التعليمية" ){

            if(isset($type) && $type != "نوع المرفق"){
                $libs = $libs
            ->where('material_id', $material)
            ->where('attachment_type', $type)
            ->get();
            }else{
                $libs = $libs
                ->where('material_id', $material)
                ->get();
            }


        }else{
            $libs = $libs
            ->where('attachment_type', $type)
            ->get();
        }



        return $libs;
    }
}
