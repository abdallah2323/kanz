@extends('admin.parent')

@section('title', 'Update User')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @section('icon')

        <i class="ti ti-pencil-alt btn-warning"></i>

        @endsection

        @section('link')

            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">users</a></li>

        @endsection

        @section('sub-title')

            Update {{ $user->name }} User

        @endsection

        @section('sub-text')

            update user that you selected

        @endsection

        <!-- Page-header end -->

        <div class="page-body">
            <div class="card">
                    <div class="card-block">
                        <h2 class="sub-title" style="font-size: 18px; text-align:center">Update User</h2>

                        <form>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $user->name }}" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" value="{{ $user->email }}" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" value="{{ $user->photo }}" name="photo" id="photo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Code</label>
                                <div class="col-sm-4">
                                    <select name="code" id="code" class="form-control">
                                        <optgroup label="Other countries">
                                            <option data-countryCode="" value="{{ $user->code }}" selected disabled>{{ $user->code }}</option>
                                            <option data-countryCode="DZ" value="970">Palestine (+970)</option>
                                            <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                            <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                            <option data-countryCode="AO" value="244">Angola (+244)</option>
                                            <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                            <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                            <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                            <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                            <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                            <option data-countryCode="AU" value="61">Australia (+61)</option>
                                            <option data-countryCode="AT" value="43">Austria (+43)</option>
                                            <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                            <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                            <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                            <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                            <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                            <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                            <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                            <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                            <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                            <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                            <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                            <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                            <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                            <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                            <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                            <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                            <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                            <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                            <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                            <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                            <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                            <option data-countryCode="CA" value="1">Canada (+1)</option>
                                            <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                            <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                            <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                            <option data-countryCode="CL" value="56">Chile (+56)</option>
                                            <option data-countryCode="CN" value="86">China (+86)</option>
                                            <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                            <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                            <option data-countryCode="CG" value="242">Congo (+242)</option>
                                            <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                            <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                            <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                            <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                            <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                            <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                            <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                            <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                            <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                            <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                            <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                            <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                            <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                            <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                            <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                            <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                            <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                            <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                            <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                            <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                            <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                            <option data-countryCode="FI" value="358">Finland (+358)</option>
                                            <option data-countryCode="FR" value="33">France (+33)</option>
                                            <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                            <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                            <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                            <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                            <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                            <option data-countryCode="DE" value="49">Germany (+49)</option>
                                            <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                            <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                            <option data-countryCode="GR" value="30">Greece (+30)</option>
                                            <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                            <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                            <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                            <option data-countryCode="GU" value="671">Guam (+671)</option>
                                            <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                            <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                            <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                            <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                            <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                            <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                            <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                            <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                            <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                            <option data-countryCode="IN" value="91">India (+91)</option>
                                            <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                            <option data-countryCode="IR" value="98">Iran (+98)</option>
                                            <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                            <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                            <option data-countryCode="IL" value="972">Israel (+972)</option>
                                            <option data-countryCode="IT" value="39">Italy (+39)</option>
                                            <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                            <option data-countryCode="JP" value="81">Japan (+81)</option>
                                            <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                            <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                            <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                            <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                            <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                            <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                            <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                            <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                            <option data-countryCode="LA" value="856">Laos (+856)</option>
                                            <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                            <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                            <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                            <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                            <option data-countryCode="LY" value="218">Libya (+218)</option>
                                            <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                            <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                            <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                            <option data-countryCode="MO" value="853">Macao (+853)</option>
                                            <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                            <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                            <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                            <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                            <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                            <option data-countryCode="ML" value="223">Mali (+223)</option>
                                            <option data-countryCode="MT" value="356">Malta (+356)</option>
                                            <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                            <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                            <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                            <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                            <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                            <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                            <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                            <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                            <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                            <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                            <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                            <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                            <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                            <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                            <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                            <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                            <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                            <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                            <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                            <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                            <option data-countryCode="NE" value="227">Niger (+227)</option>
                                            <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                            <option data-countryCode="NU" value="683">Niue (+683)</option>
                                            <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                            <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                            <option data-countryCode="NO" value="47">Norway (+47)</option>
                                            <option data-countryCode="OM" value="968">Oman (+968)</option>
                                            <option data-countryCode="PW" value="680">Palau (+680)</option>
                                            <option data-countryCode="PA" value="507">Panama (+507)</option>
                                            <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                            <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                            <option data-countryCode="PE" value="51">Peru (+51)</option>
                                            <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                            <option data-countryCode="PL" value="48">Poland (+48)</option>
                                            <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                            <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                            <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                            <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                            <option data-countryCode="RO" value="40">Romania (+40)</option>
                                            <option data-countryCode="RU" value="7">Russia (+7)</option>
                                            <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                            <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                            <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                            <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                            <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                            <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                            <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                            <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                            <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                            <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                            <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                            <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                            <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                            <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                            <option data-countryCode="ES" value="34">Spain (+34)</option>
                                            <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                            <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                            <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                            <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                            <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                            <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                            <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                            <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                            <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                            <option data-countryCode="SI" value="963">Syria (+963)</option>
                                            <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                            <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                            <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                            <option data-countryCode="TG" value="228">Togo (+228)</option>
                                            <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                            <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                            <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                            <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                            <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                            <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                            <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                            <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                            <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                            <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                            <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                            <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                            <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                            <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                            <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                            <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                            <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                            <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                            <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                            <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                            <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                            <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                            <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                            <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                            <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                            <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-4">
                                    <input type="number" value="{{ $user->phone_number }}" id="phone_number" name="phone_number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                    <input type="date" id="birth" value="{{ $user->date_of_birth }}" name="birth" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select name="gender" id="gender" class="form-control">
                                        <option selected value="{{ $user->gender }}">{{ $user->gender }}</option>

                                        <option value="male">male</option>
                                        <option value="female">female</option>


                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Level in English</label>
                                <div class="col-sm-10">
                                    <select name="level_id" id="level_id" class="form-control">
                                        <option selected hidden value="{{ $user->level_id }}">{{ $user->level->level }}</option>
                                        @foreach ($levels as $level)

                                        <option value="{{ $level->id }}">{{ $level->level }}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Education Level</label>
                                <div class="col-sm-10">
                                    <select name="education_id" id="education_id" class="form-control">
                                        <option selected hidden value="{{ $user->education_id }}">{{ $user->education->education }}</option>
                                        @foreach ($educations as $education)

                                        <option value="{{ $education->id }}">{{ $education->education }}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <select id="country" class="form-control" name="country">
                                        <option value="{{ $user->country }}" disabled selected>{{ $user->country }}</option>
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
                                        <input type="text" value="{{ $user->address }}" id="address" name="address" class="form-control">
                                </div>
                            </div>

                            <button type="button" onclick="update({{$user->id}})" class="btn btn-warning">Update</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    function update(id){

    const formData = new FormData();

        formData.append('_method', 'PUT');
        formData.append('email', document.getElementById('email').value);
        formData.append('name', document.getElementById('name').value);
        formData.append('phone_number', document.getElementById('phone_number').value);
        formData.append('birth', document.getElementById('birth').value);
        formData.append('code', document.getElementById('code').value);
        formData.append('gender', document.getElementById('gender').value);
        formData.append('level_id', document.getElementById('level_id').value);
        formData.append('education_id', document.getElementById('education_id').value);
        formData.append('country', document.getElementById('country').value);
        formData.append('address', document.getElementById('address').value);
        formData.append('photo',document.getElementById('photo').files[0]);


    axios.post('/cms/admin/users/'+id, formData)
        .then(function (response) {
        // handle success
        console.log(response);
        toastr.success(response.data.message);
        // document.getElementById('create-form').reset(); //عمل اعادة تحدث للصفحة بعد اضافة عنصر
        window.location.href= "/cms/admin/users"; // الانتقال الي الراوت المكتوب عند اضافة عنصر
        })
        .catch(function (error) {
        // handle error
        console.log(error);
        toastr.error(error.response.data.message);
        })
        .then(function () {
        // always executed
        });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">


      $("#country").select2({
          placeholder: "Select Country",
          allowClear: true,

      });

      $("#code").select2({
          placeholder: "Select Country Code",
          allowClear: true,

      });

</script>
@endsection
