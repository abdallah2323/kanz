@extends('admin.parent')

@section('title', 'Create Admin')

@section('styles')

<link rel="stylesheet" href="{{ asset('project/assets/plugins/toastr/toastr.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->

        @section('icon')

        <i class="ti ti-plus btn-success"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Admins</a>
            </li>

        @endsection

        @section('sub-title')

            Create New Admin

        @endsection

        @section('sub-text')

            Add Admins

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="card">
                    <div class="card-block">
                        <h2 class="sub-title" style="font-size: 18px; text-align:center">Add New Admin</h2>
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your E-mail">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Enter Your Phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <select id="country" class="form-control" name="country">
                                        <option value="" disabled selected>إختر</option>
                                        <option value="أفغانستان">أفغانستان</option>
                                        <option value="فلسطين">فلسطين</option>
                                        <option value="ألبانيا">ألبانيا</option>
                                        <option value="الجزائر">الجزائر</option>
                                        <option value="أندورا">أندورا</option>
                                        <option value="أنغولا">أنغولا</option>
                                        <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                                        <option value="الأرجنتين">الأرجنتين</option>
                                        <option value="أرمينيا">أرمينيا</option>
                                        <option value="أستراليا">أستراليا</option>
                                        <option value="النمسا">النمسا</option>
                                        <option value="أذربيجان">أذربيجان</option>
                                        <option value="البهاما">البهاما</option>
                                        <option value="البحرين">البحرين</option>
                                        <option value="بنغلاديش">بنغلاديش</option>
                                        <option value="باربادوس">باربادوس</option>
                                        <option value="بيلاروسيا">بيلاروسيا</option>
                                        <option value="بلجيكا">بلجيكا</option>
                                        <option value="بليز">بليز</option>
                                        <option value="بنين">بنين</option>
                                        <option value="بوتان">بوتان</option>
                                        <option value="بوليفيا">بوليفيا</option>
                                        <option value="البوسنة والهرسك ">البوسنة والهرسك </option>
                                        <option value="بوتسوانا">بوتسوانا</option>
                                        <option value="البرازيل">البرازيل</option>
                                        <option value="بروناي">بروناي</option>
                                        <option value="بلغاريا">بلغاريا</option>
                                        <option value="بوركينا فاسو ">بوركينا فاسو </option>
                                        <option value="بوروندي">بوروندي</option>
                                        <option value="كمبوديا">كمبوديا</option>
                                        <option value="الكاميرون">الكاميرون</option>
                                        <option value="كندا">كندا</option>
                                        <option value="الرأس الأخضر">الرأس الأخضر</option>
                                        <option value="جمهورية أفريقيا الوسطى ">جمهورية أفريقيا الوسطى </option>
                                        <option value="تشاد">تشاد</option>
                                        <option value="تشيلي">تشيلي</option>
                                        <option value="الصين">الصين</option>
                                        <option value="كولومبيا">كولومبيا</option>
                                        <option value="جزر القمر">جزر القمر</option>
                                        <option value="كوستاريكا">كوستاريكا</option>
                                        <option value="ساحل العاج">ساحل العاج</option>
                                        <option value="كرواتيا">كرواتيا</option>
                                        <option value="كوبا">كوبا</option>
                                        <option value="قبرص">قبرص</option>
                                        <option value="التشيك">التشيك</option>
                                        <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                                        <option value="الدنمارك">الدنمارك</option>
                                        <option value="جيبوتي">جيبوتي</option>
                                        <option value="دومينيكا">دومينيكا</option>
                                        <option value="جمهورية الدومينيكان">جمهورية الدومينيكان</option>
                                        <option value="تيمور الشرقية ">تيمور الشرقية </option>
                                        <option value="الإكوادور">الإكوادور</option>
                                        <option value="مصر">مصر</option>
                                        <option value="السلفادور">السلفادور</option>
                                        <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                                        <option value="إريتريا">إريتريا</option>
                                        <option value="إستونيا">إستونيا</option>
                                        <option value="إثيوبيا">إثيوبيا</option>
                                        <option value="فيجي">فيجي</option>
                                        <option value="فنلندا">فنلندا</option>
                                        <option value="فرنسا">فرنسا</option>
                                        <option value="الغابون">الغابون</option>
                                        <option value="غامبيا">غامبيا</option>
                                        <option value="جورجيا">جورجيا</option>
                                        <option value="ألمانيا">ألمانيا</option>
                                        <option value="غانا">غانا</option>
                                        <option value="اليونان">اليونان</option>
                                        <option value="جرينادا">جرينادا</option>
                                        <option value="غواتيمالا">غواتيمالا</option>
                                        <option value="غينيا">غينيا</option>
                                        <option value="غينيا بيساو">غينيا بيساو</option>
                                        <option value="غويانا">غويانا</option>
                                        <option value="هايتي">هايتي</option>
                                        <option value="هندوراس">هندوراس</option>
                                        <option value="المجر">المجر</option>
                                        <option value="آيسلندا">آيسلندا</option>
                                        <option value="الهند">الهند</option>
                                        <option value="إندونيسيا">إندونيسيا</option>
                                        <option value="إيران">إيران</option>
                                        <option value="العراق">العراق</option>
                                        <option value="جمهورية أيرلندا ">جمهورية أيرلندا </option>
                                        <option value="إيطاليا">إيطاليا</option>
                                        <option value="جامايكا">جامايكا</option>
                                        <option value="اليابان">اليابان</option>
                                        <option value="الأردن">الأردن</option>
                                        <option value="كازاخستان">كازاخستان</option>
                                        <option value="كينيا">كينيا</option>
                                        <option value="كيريباتي">كيريباتي</option>
                                        <option value="الكويت">الكويت</option>
                                        <option value="قرغيزستان">قرغيزستان</option>
                                        <option value="لاوس">لاوس</option>
                                        <option value="لاوس">لاوس</option>
                                        <option value="لاتفيا">لاتفيا</option>
                                        <option value="لبنان">لبنان</option>
                                        <option value="ليسوتو">ليسوتو</option>
                                        <option value="ليبيريا">ليبيريا</option>
                                        <option value="ليبيا">ليبيا</option>
                                        <option value="ليختنشتاين">ليختنشتاين</option>
                                        <option value="ليتوانيا">ليتوانيا</option>
                                        <option value="لوكسمبورغ">لوكسمبورغ</option>
                                        <option value="مدغشقر">مدغشقر</option>
                                        <option value="مالاوي">مالاوي</option>
                                        <option value="ماليزيا">ماليزيا</option>
                                        <option value="جزر المالديف">جزر المالديف</option>
                                        <option value="مالي">مالي</option>
                                        <option value="مالطا">مالطا</option>
                                        <option value="جزر مارشال">جزر مارشال</option>
                                        <option value="موريتانيا">موريتانيا</option>
                                        <option value="موريشيوس">موريشيوس</option>
                                        <option value="المكسيك">المكسيك</option>
                                        <option value="مايكرونيزيا">مايكرونيزيا</option>
                                        <option value="مولدوفا">مولدوفا</option>
                                        <option value="موناكو">موناكو</option>
                                        <option value="منغوليا">منغوليا</option>
                                        <option value="الجبل الأسود">الجبل الأسود</option>
                                        <option value="المغرب">المغرب</option>
                                        <option value="موزمبيق">موزمبيق</option>
                                        <option value="بورما">بورما</option>
                                        <option value="ناميبيا">ناميبيا</option>
                                        <option value="ناورو">ناورو</option>
                                        <option value="نيبال">نيبال</option>
                                        <option value="هولندا">هولندا</option>
                                        <option value="نيوزيلندا">نيوزيلندا</option>
                                        <option value="نيكاراجوا">نيكاراجوا</option>
                                        <option value="النيجر">النيجر</option>
                                        <option value="نيجيريا">نيجيريا</option>
                                        <option value="كوريا الشمالية ">كوريا الشمالية </option>
                                        <option value="النرويج">النرويج</option>
                                        <option value="سلطنة عمان">سلطنة عمان</option>
                                        <option value="باكستان">باكستان</option>
                                        <option value="بالاو">بالاو</option>
                                        <option value="بنما">بنما</option>
                                        <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
                                        <option value="باراغواي">باراغواي</option>
                                        <option value="بيرو">بيرو</option>
                                        <option value="الفلبين">الفلبين</option>
                                        <option value="بولندا">بولندا</option>
                                        <option value="البرتغال">البرتغال</option>
                                        <option value="قطر">قطر</option>
                                        <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                                        <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
                                        <option value="رومانيا">رومانيا</option>
                                        <option value="روسيا">روسيا</option>
                                        <option value="رواندا">رواندا</option>
                                        <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
                                        <option value="سانت لوسيا">سانت لوسيا</option>
                                        <option value="سانت فنسينت والجرينادينز">سانت فنسينت والجرينادينز</option>
                                        <option value="ساموا">ساموا</option>
                                        <option value="سان مارينو">سان مارينو</option>
                                        <option value="ساو تومي وبرينسيب">ساو تومي وبرينسيب</option>
                                        <option value="السعودية">السعودية</option>
                                        <option value="السنغال">السنغال</option>
                                        <option value="صربيا">صربيا</option>
                                        <option value="سيشيل">سيشيل</option>
                                        <option value="سيراليون">سيراليون</option>
                                        <option value="سنغافورة">سنغافورة</option>
                                        <option value="سلوفاكيا">سلوفاكيا</option>
                                        <option value="سلوفينيا">سلوفينيا</option>
                                        <option value="جزر سليمان">جزر سليمان</option>
                                        <option value="الصومال">الصومال</option>
                                        <option value="جنوب أفريقيا">جنوب أفريقيا</option>
                                        <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                                        <option value="جنوب السودان">جنوب السودان</option>
                                        <option value="إسبانيا">إسبانيا</option>
                                        <option value="سريلانكا">سريلانكا</option>
                                        <option value="السودان">السودان</option>
                                        <option value="سورينام">سورينام</option>
                                        <option value="سوازيلاند">سوازيلاند</option>
                                        <option value="السويد">السويد</option>
                                        <option value="سويسرا">سويسرا</option>
                                        <option value="سوريا">سوريا</option>
                                        <option value="طاجيكستان">طاجيكستان</option>
                                        <option value="تنزانيا">تنزانيا</option>
                                        <option value="تايلاند">تايلاند</option>
                                        <option value="توغو">توغو</option>
                                        <option value="تونجا">تونجا</option>
                                        <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
                                        <option value="تونس">تونس</option>
                                        <option value="تركيا">تركيا</option>
                                        <option value="تركمانستان">تركمانستان</option>
                                        <option value="توفالو">توفالو</option>
                                        <option value="أوغندا">أوغندا</option>
                                        <option value="أوكرانيا">أوكرانيا</option>
                                        <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                                        <option value="المملكة المتحدة">المملكة المتحدة</option>
                                        <option value="الولايات المتحدة">الولايات المتحدة</option>
                                        <option value="أوروغواي">أوروغواي</option>
                                        <option value="أوزبكستان">أوزبكستان</option>
                                        <option value="فانواتو">فانواتو</option>
                                        <option value="فنزويلا">فنزويلا</option>
                                        <option value="فيتنام">فيتنام</option>
                                        <option value="اليمن">اليمن</option>
                                        <option value="زامبيا">زامبيا</option>
                                        <option value="زيمبابوي">زيمبابوي</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Upload Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>
                            </div>
                            <button type="button" onclick="store()" class="btn btn-success">Store</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function store() {

            let formData = new FormData();

            formData.append('email', document.getElementById('email').value);
            formData.append('name', document.getElementById('name').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('country', document.getElementById('country').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('photo',document.getElementById('photo').files[0]);

            axios.post('/cms/admin/admins', formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                    window.location.href = "/cms/admin/admins"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
    {{-- <script>
        function update(id) {

            const formData = new FormData();

            formData.append('_method', 'PUT');
            formData.append('name_en', document.getElementById('name_en').value);
            formData.append('name_ar', document.getElementById('name_ar').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('id_photo', document.getElementById('id_photo').files[0]);
            formData.append('photo', document.getElementById('photo').files[0]);

            axios.post('/sensorial/dashboard/admin/' + id, formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
                    window.location.href = "/sensorial/dashboard/admin"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);
                })
                .then(function() {
                    // always executed
                });
        }
    </script> --}}

    {{-- <script>
        $(document).on('click', '.edit', function() {
            var _this = $(this).parents('tr');
            var row_id = _this.find('#row_id').text();
            console.log(row_id);
            var first = '<button type="button" onclick="update(';
            var second = ')" class="btn btn-primary">Update</button>';
            var last = first + row_id + second;
            $(document).find('#update_id').html(last);
            $('#e_id').val(_this.find('.e_id').text());
            $('#name_en').val(_this.find('.name_en').text());
            $('#name_ar').val(_this.find('.name_ar').text());
            $('#email').val(_this.find('.email').text());
            $('#code').val(_this.find('.code').text());
            $('#phone_number').val(_this.find('.phone_number').text());
            $('#address').val(_this.find('.address').text());
            $('#photo').val(_this.find('.photo').text());
            $('#id_photo').val(_this.find('.id_photo').text());




        });
    </script> --}}
    {{-- <script>
        function confirmDestroy(id, reference) {
            console.log("ID: " + id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id, reference);
                }
            })
        }

        function destroy(id, reference) {
            axios.delete('/sensorial/dashboard/admin/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    reference.closest('tr').remove();
                    showMessage(response.data);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showMessage(error.response.data);
                })
                .then(function() {
                    // always executed
                });
        }

        function showMessage(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script> --}}
    <script src="{{ asset('project/assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">

        $("#country").select2({
              placeholder: "Select Country",
              allowClear: true,

          });

  </script>

    <!-- Datatable JS -->
@endsection
