<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\User;
use App\Models\About;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Course;
use App\Models\Policy;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Lecture;
use App\Models\library;
use App\Models\Opinion;
use App\Models\Student;
use App\Models\Activity;
use App\Models\Material;
use App\Models\Question;
use App\Models\Education;
use App\Models\Guarantee;
use App\Models\Instructor;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class WebController extends Controller
{
    //

    public function index()
    {
        $main = Main::all()->first();
        $news = Article::orderBy('created_at', 'DESC')->get();
        $opinions = Opinion::orderBy('created_at', 'DESC')->take(5)->get();
        $activities = Activity::orderBy('created_at', 'DESC')->take(5)->get();
        $about = About::all()->first();
        $paidCourses = Course::whereNotNull('price')->where('type', 'course')->orderBy('created_at', 'DESC')->get();
        $freeCourses = Course::whereNull('price')->where('type', 'course')->orderBy('created_at', 'DESC')->get();
        $psychologicalCourses = Course::where('type', '=', 'psychological')->orderBy('created_at', 'DESC')->get();
        return view('website.home.index', [
            'main' => $main,
            'about' => $about,
            'paidCourses' => $paidCourses,
            'freeCourses' => $freeCourses,
            'psychologicalCourses' => $psychologicalCourses,
            'news' => $news,
            'activities' => $activities,
            'opinions' => $opinions
        ]);
    }

    public function showLogin()
    {
        return view('website.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:3|max:30'
        ], [
            'email.exists' => 'عذراً ! الإيميل الذي أدخلته غير مسجل فعلاً',
            'email.required' => 'عذراً ! أدخل الإيميل الخاص بك',
            'password.required' => 'عذراً ! أدخل كلمة السر الخاص بك',
        ]);

        if(!$validator->fails()) {
            $credintials = [
                'email' => $request->get('email'),
                'password' =>  $request->get('password'),
            ];

            if(Auth::guard('web')->attempt($credintials)) {
                return response()->json([
                    'message' => 'تم تسجيل الدخول بنجاح'
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'فشل في تسجيل الدخول , كلمة السر خاطئة'
                ], Response::HTTP_BAD_REQUEST);
            }

        } else {
            return response()->json([
                'message'=>$validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function forgetPass()
    {
        return view('website.auth.forget-pass');
    }

    public function showSignUp()
    {
        $levels = Level::all();
        $educations = Education::all();
        return view('website.auth.sign-up', [
            'levels' => $levels,
            'educations' => $educations
        ]);
    }

    public function register(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|email|unique:users|ends_with:@gmail.com',
            'password' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'min:8',
            ],
            'birth' => 'required|date',
            'name' => 'required|string|unique:users',
            'gender' => 'required',
            'code' => 'required',
            'phone_number' => 'required|unique:users|min:3|max:30',
            'education_id' => 'required',
            'level_id' => 'required',
            'address' => 'required',
            'country' => 'required',
            'check' => 'required'
        ],[
            'name.required' => 'عذراً ! أدخل إسمك',
            'email.required' => 'عذراً ! أدخل الإيميل الخاص بك',
            'email.email' => 'عذراً ! أدخل إيميل صحيحاً',
            'password.required' => 'عذراً ! أدخل كلمة السر الخاصة بك',
            'birth.required' => 'عذراً ! أدخل تاريخ ميلادك',
            'gender.required' => 'عذراً ! أدخل جنسك',
            'code.required' => 'عذراً ! أدخل رمز البلد الخاصة بك',
            'phone_number.required' => 'عذراً ! أدخل رقم الهاتف الخاص بك',
            'education_id.required' => 'عذراً ! أدخل مستواك التعليمي',
            'level_id.required' => 'عذراً ! أدخل مستواك في اللغة الإنجليزية',
            'country.required' => 'عذراً ! أدخل بلدك',
            'address.required' => 'عذراً ! أدخل عنوانك',
            'password.regex' => 'عذرا ! يجب أن تحتوي كلمة المرور على حروف وأرقام',
        ]);
        if (!$validator->fails()) {
            $user = new User();
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->date_of_birth = $request->input('birth');
            $user->password = Hash::make($request->input('password'));
            $user->phone_number = $request->input('phone_number');
            $user->code = $request->input('code');
            $user->gender = $request->input('gender');
            $user->country = $request->input('country');
            $user->address = $request->input('address');
            $user->education_id = $request->input('education_id');
            $user->level_id = $request->input('level_id');
            $user->image = $request->input('photo');


            $issaved = $user->save();
            if(Auth::guard('web')->attempt($request->only('email','password'))){
                return response()->json(
                    ['message' => $issaved ? 'تم التسجيل بنجاح' : 'تم التسجيل بنجاح'],
                    $issaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
                );
            }else {
                return response()->json(
                    [
                        'message' => $validator->getMessageBag()->first()
                    ],
                    Response::HTTP_BAD_REQUEST

                );
            }
        } else  {
                return response()->json(
                    [
                        'message' => $validator->getMessageBag()->first()
                    ],
                    Response::HTTP_BAD_REQUEST

                );
            }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }



    public function contact(Request $request)
    {
        $validator = validator($request->all(), [
            'message' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ], [
            'message.required' => 'عذرا ! قم بملئ حقل الرسالة ما من شيء لإرساله' ,
        ]);
        $auth = $request->input('user_id');
        $auth_check = $auth == Auth::user()->id;

        if($auth_check){
            if (!$validator->fails()) {
                $contact = new Contact();
                $contact->message = $request->input('message');
                $auth = $contact->user_id = $request->input('user_id');

                $issaved = $contact->save();
                return response()->json(
                    ['message' => $issaved ? 'تم إرسال الرسالة بنجاح إنتظر الرد قريباً' : 'حدث خطأ ما , فشل في إرسال الرسالة'],
                    $issaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
                } else {
                    return response()->json(
                        [
                            'message' => $validator->getMessageBag()->first()
                        ],
                        Response::HTTP_BAD_REQUEST

                    );
                }
            }  else {
                return response()->json([
                    'code'      =>  400,
                    'message'   =>  $auth ? 'عزيزي الطالب حدث خطأ في عملية الإرسال تأكد من عملية تسجيل دخولك بالأكاديمية' : 'فشل'
                ], $auth ? Response::HTTP_BAD_REQUEST : Response::HTTP_BAD_REQUEST);
            }
    }



    public function coursesPage()
    {
        $sliders = Slider::whereNotNull('slider')->get();
        $data = Slider::all()->first();
        $paidCourses = Course::whereNotNull('price')->orderBy('created_at', 'DESC')->get();
        $freeCourses = Course::whereNull('price')->orderBy('created_at', 'DESC')->get();
        $psychologicalCourses = Course::where('type', '=', 'psychological')->orderBy('created_at', 'DESC')->get();
        return view('website.courses.index', [
            'sliders' => $sliders,
            'data' => $data,
            'paidCourses' => $paidCourses,
            'freeCourses' => $freeCourses,
            'psychologicalCourses' => $psychologicalCourses,
        ]);
    }

    public function studentStore(Request $request)
    {

        $user = $request->get('user_id');
        $course = $request->get('course_id');

        $student_check = Student::where('user_id', '=', $user)->where('course_id', '=', $course)->first();
        if(!$student_check){
            $validator = validator($request->all(), [
                'course_id' => 'required|integer',
                'user_id' => 'required|integer',

            ]);
            if (!$validator->fails()) {
                $student = new Student();
                $student->user_id = $request->input('user_id');
                $student->course_id = $request->input('course_id');


                $issaved = $student->save();
                return response()->json(
                    ['message' => $issaved ? 'أصبحت طالب مسجل في هذا الكورس' : 'حدث خطأ ما في عملية التسجيل'],
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
        } else {
            return response()->json([
                'code'      =>  400,
                'message'   =>  $student_check ? 'عزيزي الطالب'.' '.$student_check->user->name.' '.'انت مسجل فعلياً في كورس'.' '.$student_check->course->name : 'Failed'
            ], $student_check ? Response::HTTP_BAD_REQUEST : Response::HTTP_BAD_REQUEST);
        }

    }

    public function studentRegister($id)
    {
        $course = Course::find($id);
        return view('website.courses.register', [
            'course' => $course
        ]);
    }

    public function instructorShow($id)
    {
        $socials = Social::all();
        $instructor = Instructor::find($id);
        return view('website.instructor.show', [
            'instructor' => $instructor,
            'socials' => $socials,
        ]);
    }

    public function aboutPage()
    {
        $aboutFirst = About::all()->first();
        $abouts = About::all();
        $activityFirst = Activity::all()->first();
        $activities = Activity::orderBy('created_at', 'DESC')->get();
        return view('website.about.index', [
            'aboutFirst' => $aboutFirst,
            'abouts' => $abouts,
            'activities' => $activities,
            'activityFirst' => $activityFirst,
        ]);
    }

    public function libraryPage()
    {
        $libs = Library::orderBy('created_at', 'DESC')->get();
        $materials = Material::orderBy('created_at', 'DESC')->get();
        $educations = Education::orderBy('created_at', 'DESC')->get();
        return view('website.library.index', [
            'libs' => $libs,
            'educations' => $educations,
            'materials' => $materials,
        ]);
    }

    public function getMoreLibraries(Request $request)
    {
        // return $request;
        $semester = $request->semester;
        $education = $request->education_id;
        // return $semester;
        $type = $request->type;
        $material = $request->material_id;

        if($request->ajax()) {
            $libs = Library::getLibraries($semester,$education , $material , $type);
            return view('website.library.search-result', compact('libs'))->render();
        }

    }

    public function filePage($id)
    {
        $lib = Library::find($id);
        return view('website.library.show', [
            'lib' => $lib
        ]);
    }

    public function libDownload(Request $request, $file)
    {
        return response()->download(public_path('library/'.$file));
    }

    public function questions()
    {
        $questions = Question::all();
        return view('website.q&a.index', [
            'questions' => $questions
        ]);
    }

    public function courseDetails($id)
    {
        $course = Course::find($id);
        return view('website.courses.details', [
            'course' => $course
        ]);
    }

    public function courseContent($id)
    {
        $course = Course::find($id);

        $students = $course->users;



        // $students = $user->courses;
        // return $auth.$user->id.$course->id;
        // $student_check = Student::where('user_id', $auth)->where('course_id', $course)->first();

        // return $student_check;
        // $student_check = Student::where('user_id', '=' ,$auth)->where('course_id', '=' ,$course)->first();
        return view('website.courses.content', [
            // 'student' => $student_check,
            'course' => $course,
            'students' => $students,

        ]);
    }

    public function comment(Request $request)
    {
        $validator = validator($request->all(), [
            'comment' => 'required|string',
            'user_id' => 'required|integer',
        ], [
            'comment.required' => 'عذرا ! قم بملئ حقل التعليق ما من شيء لإرساله' ,
        ]);
            if (!$validator->fails()) {
                $comment = new Comment();
                $comment->comment = $request->input('comment');
                $comment->user_id = $request->input('user_id');
                $comment->course_id = $request->input('course_id');


                $issaved = $comment->save();
                return response()->json(
                    ['message' => $issaved ? 'تم نشر تعليقك بنجاح' : 'حدث خطأ ما , فشل في نشر التعليق'],
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

    public function lectureShow($id)
    {
        $course = Course::find($id);
        $lecture = Lecture::find($id);
        return view('website.courses.lecture', [
            'course' => $course,
            'lecture' => $lecture,
        ]);
    }

    public function contactUsPage()
    {
        $admin = Admin::all()->first();
        return view('website.contact_us.index', [
            'admin' => $admin
        ]);
    }

    public function userShow()
    {
        return view('website.user_profile.index');
    }

    public function editProfileShow()
    {
        return view('website.user_profile.edit-profile');
    }

    public function editProfile(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|email|ends_with:@gmail.com',
            'name' => 'required|string',
            'code' => 'required',
            'phone_number' => 'required|min:3|max:30',
            'country' => 'required'
        ]);
        if (!$validator->fails()) {
            $user_id = Auth::user()->id;
            $user = User::findOrFail($user_id);
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->phone_number = $request->input('phone_number');
            $user->code = $request->input('code');
            $user->country = $request->input('country');

            if ($request->hasFile('photo')){
                $image = time() .'.'.$request -> photo->extension();
                $request->photo->move(('project/uploads/users/'),$image);
                $user->image = $image;
            }


            $issaved = $user->save();
            return response()->json(
                ['message' => $issaved ? 'تم حفظ التغييرات بنجاح' : 'فشل في حفظ التغييرات'],
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

    public function changePassShow()
    {
        return view('website.user_profile.change-password');
    }

    public function changePass(Request $request)
    {
        $guard = session('guard');
        $guard = auth($guard)->check() ? $guard : null;
        $validator = validator($request->all(), [
            'password' => 'required|current_password:' . $guard,
            'new_password' => ['required', 'confirmed','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'min:8',]
        ], [
            'password.required' => 'عذراً ! قم بملئ حقل كلمة المرور الحالية',
            'password.current_password' => 'عذراً ! كلمة المرور الحالية خاطئة',
            'new_password.required' => 'عذراً ! قم بملئ حقل كلمة المرور الجديدة',
            'new_password.confirmed' => 'عذراً ! كلمة المرور غير متطابقة',
            'new_password.regex' => 'عذرا ! يجب أن تحتوي كلمة المرور على حروف وأرقام',
        ]);

        if (!$validator->fails()) {
            $user = $request->user();
            $user->forceFill([
                'password' => Hash::make($request->input('new_password')),
            ]);
            $isSaved = $user->save();
            return response()->json(
                ['message' => $isSaved ? 'تم تغيير كلمة المرور بنجاح' : 'فشل في تغيير كلمة المرور'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function privacy()
    {
        $data = Policy::orderBy('created_at', 'ASC')->get();;
        return view('website.privacy.index', [
            'data' => $data,
        ]);
    }

    public function guarantee()
    {
        $data = Guarantee::orderBy('created_at', 'ASC')->get();;
        return view('website.guarantee.index', [
            'data' => $data,
        ]);
    }

    public function paymentShow($id)
    {
        $course = Course::find($id);
        return view('website.payment.index', [
            'course' => $course
        ]);
    }
    
    public function download(Request $request, $file)
    {
        return response()->download(('project/uploads/attachments/'.$file));
    }
    public function fileDownload(Request $request, $file)
    {
        return response()->download(('project/uploads/files/'.$file));
    }




}
