@extends('website.parent')

@section('title', 'طرق الدفع')

@section('styles')

    <link rel="stylesheet" href="{{ asset('project/website/css/Payment-1.css') }}">

@endsection

@section('content')

    <section class="section-1">
        <div class="container">
            <div class="row">
                <div class="div-head">
                    <h1 class="heading-1">آلية الدفع</h1>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="right-side">
                        <form action="" class="pb-4">
                            <div class="flex-box">


                                <div class="div-img">
                                    <div class="a aa">
                                        <label for="visa">
                                            <img src="{{ asset('project/website/img/visa.png') }}" alt=""
                                                class="img-1">
                                        </label>
                                    </div>
                                    <div class="button one active" target="1"><input type="radio" name="expo"
                                            id="visa" checked></div>
                                </div>

                                <div class="div-img">
                                    <div class="aa text-center">
                                        <label for="pay">
                                                <img src="{{ asset('project/website/img/pay.jpg') }}" alt=""
                                                    class="img-1 pay">
                                        </label>
                                    </div>
                                    <div class="button two" target="2"><input type="radio"
                                            name="expo" id="pay"></div>
                                </div>

                                <!-- Button trigger modal -->
                                <div class="aternat">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        طرق دفع بديلة
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog  first">
                                        <div class="modal-content first">
                                            <div class="modal-header first">
                                                <h5 class="modal-title" id="staticBackdropLabel">أخي الحبيب .. أختي الحبيبة
                                                    تيسيرا لمن لا يستطيع سداد رسوم الدورات باستخدام بطاقة الدفع عبر الإنترنت
                                                    بإمكانك استخدام هذه الطرق البديلة المتاحة حاليا :</h5>
                                                <button type="button" class="btn-close first" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ol>
                                                    <li class="first mb-3">يمكنك سداد الرسوم عن طريق مؤسسة عمارة للاستشارات
                                                        و التدريب في مصر ( القاهرة - الاسكندرية )</li>
                                                    <li class="first mb-3">التواصل عبر الواتس: 05987456</li>
                                                    <li class="first mb-3">يمكنك سداد الرسوم عن طريق تحويل بنكي</li>
                                                </ol>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success first"
                                                    data-bs-dismiss="modal">اغلاق</button>
                                                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="div1 single">
                                <h6 class="h6-1 mt-3">التسجيل بواسطة الفيزا (VISA)</h6>
                                <div class="form-all">
                                    <label for="" class="label-1">اسم حامل البطاقة</label>
                                    <input type="text" placeholder="ادخل اسمك كامل" class="form-control inp-1">


                                    <label for="" class="label-1">رقم البطاقة</label>
                                    <input type="number" class="form-control inp-1" placeholder="أدخل رقم بطاقتك">

                                    <label class="label-1">شهر انتهاء الصلاحية</label>
                                    <select id="exp_mon" class="form-control inp-1" name="exp_mon">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>

                                    <label class="label-1">سنة انتهاء الصلاحية</label>
                                    <select id="exp_yr" class="form-control inp-1" name="exp_yr">
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                        <option value="2037">2037</option>
                                        <option value="2038">2038</option>
                                        <option value="2039">2039</option>
                                        <option value="2040">2040</option>
                                        <option value="2041">2041</option>
                                        <option value="2042">2042</option>
                                        <option value="2043">2043</option>
                                    </select>

                                    <label for="" class="label-1">رقم CVV</label>
                                    <input type="number" class="form-control inp-1" placeholder="أدخل رقم ال CVV">

                                </div>


                                <input type="submit" value="دفع 50₪" class="form-control submit mt-4">
                            </div>
                        </form>
                        <div class="div2 single" style="display: none">
                            <h6 class="h6-1 mb-4">التسجيل بواسطة (Jawwal Pay)</h6>
                            <a href="" class="a-1">انقر هنا</a>

                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">

                                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_eaawoubu.json"
                                        background="transparent" speed="1"
                                        style="width: 100px; height: 100px; margin:auto; margin-top: -23px;" loop autoplay>
                                    </lottie-player>

                                    <div class="heading-3">
                                        <h1 class="head-1">لقد تمت عملية الدفع بنجاح</h1>
                                        <p class="para">قم بمتابعة الإشعارات معنا</p>
                                    </div>

                                    <div class="success-1">
                                        <div class="pay">
                                            <p class="p-7">نوع الدفع</p>
                                            <p class="p-8">الراجحي</p>
                                        </div>
                                        <div class="pay">
                                            <p class="p-7">الايميل</p>
                                            <p class="p-8">fado54@gmail.com</p>
                                        </div>
                                        <div class="pay">
                                            <p class="p-7">رقم الجوال</p>
                                            <p class="p-8">5678942</p>
                                        </div>
                                        <div class="pay">
                                            <p class="p-7">اجمالي الفاتورة</p>
                                            <p class="p-8">3455</p>
                                        </div>
                                    </div>
                                    <div class="print mt-4">
                                        <a href="index-1.html" class="form-control a-1">الرجوع للرئيسية</a>
                                        <a href="#" class="form-control a-1">طباعة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="left-side">
                        <div class="img-expo">
                            <img src="{{ asset('project/website/img/logo.png') }}" alt="" class="expoo">
                        </div>
                        <div class="heading-2">
                            <h1 class="heading">الجرافيك ديزاين وتصميمات السوشيال ميديا</h1>
                        </div>
                        <p class="paragraph">تفاصيل الفاتورة</p>
                        <hr>
                        <div class="contant">
                            <div class="div_1">
                                <p class="p--1">الاجمالي</p>
                                <p class="fees">140.00 ₪</p>
                            </div>
                            <div class="div_1">
                                <p class="p--1">الرسوم</p>
                                <p class="fees">0 ₪</p>
                            </div>
                            <div class="div_1">
                                <p class="p--1">اجمالي الفاتورة</p>
                                <p class="fees">140.00 ₪</p>
                            </div>
                        </div>

                    </div>
                    <div class="btn_1">
                        <input type="button" class="botton-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            value="أكمل الدفع" />
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        jQuery(".button").click(function() {
            jQuery(".single").hide();
            jQuery(".div" + $(this).attr("target")).show();
        });
    </script>

@endsection
