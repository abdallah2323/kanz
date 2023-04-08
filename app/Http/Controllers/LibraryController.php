<?php

namespace App\Http\Controllers;

use App\Models\library;
use App\Models\Material;
use App\Models\Education;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libraries = Library::orderBy('created_at', 'DESC')->get();
        return view('admin.libraries.index', [
            'libraries' => $libraries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $educations = Education::all();
        $materials = Material::all();
        return view('admin.libraries.create', [
            'materials' => $materials,
            'educations' => $educations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string',
            'type' => 'required|string',
            'file' => 'required|mimes:doc,docx,pdf,ppt,pptx',
            'education_id' => 'required|integer',
            'material_id' => 'required|integer',
            'semester' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $library = new Library();
            $library->attachment_name = $request->input('name');
            $library->attachment_type = $request->input('type');
            $library->education_id = $request->input('education_id');
            $library->material_id = $request->input('material_id');
            $library->semester = $request->input('semester');

            $data = $request->file('file');
            $libraryname = 'Al-Kanz-Academy'.'-'.$data->getClientOriginalName();
            $data->move('project/uploads/attachments', $libraryname);

            $library->attachment = $libraryname;


            $issaved = $library->save();
            return response()->json(
                ['message' => $issaved ? 'Attachment Created Successfully' : 'Attachment Created Failed'],
                $issaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST

            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(library $library)
    {
        //
        $educations = Education::all();
        $materials = Material::all();
        return view('admin.libraries.update', [
            'library' => $library,
            'materials' => $materials,
            'educations' => $educations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, library $library)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string',
            'type' => 'required|string',
            'education_id' => 'required|integer',
            'file' => 'required|mimes:doc,docx,pdf',
            'material_id' => 'required|integer',
            'semester' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $library->attachment_name = $request->input('name');
            $library->attachment_type = $request->input('type');
            $library->education_id = $request->input('education_id');
            $library->material_id = $request->input('material_id');
            $library->semester = $request->input('semester');

            $data = $request->file;
            $libraryname = 'Al-Kanz-Academy'.'-'.$data->getClientOriginalName();
            $request->file->move('project/uploads/library', $libraryname);

            $library->attachment = $libraryname;


            $issaved = $library->save();
            return response()->json(
                ['message' => $issaved ? 'Attachment Updated Successfully' : 'Attachment Updated Failed'],
                $issaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST

            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(library $library)
    {
        //
        $isDeleted = $library->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
