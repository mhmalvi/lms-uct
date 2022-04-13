<div class="multisteps-form__panel" data-animation="slideHorz">
    <div class="wizard-forms">
        <div class="innerclearfix">
            <div class="container form-content pera-content p-md-3">
                <div class="step-inner-content">
                    <h2 class="py-2">Enrollement</h2>

                    <div class="wizard-topper">
                        <div class="wizard-progress">
                            <span>3 of 3 Completed</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="step-box">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="givenName">Given name *</label>
                                            <input type="text" class="form-control @error('givenName') is-invalid @enderror" name="givenName" />
                                            @error('givenName')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sureName">Family name (surname) *</label>
                                            <input type="text" class="form-control @error('sureName') is-invalid @enderror" name="sureName" />
                                            @error('sureName')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="address">Address</label><input type="text"
                                                class="form-control" name="address" /></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="town">Town</label><input type="text"
                                                class="form-control" name="town" /></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="territory">Territory</label><input
                                                type="text" class="form-control" name="territory" /></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="code">Code</label><input type="text"
                                                class="form-control" name="code" /></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="phone">Phone
                                            </label><input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" />
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="mobile">Mobile</label><input type="text"
                                                class="form-control @error('mobile') is-invalid @enderror" name="mobile" /></div>
                                            @error('mobile')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="email">Email</label><input type="text"
                                                class="form-control @error('email') is-invalid @enderror" name="email" />
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6"><label for="gender">Gender</label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="male"
                                                    value="male" /><label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="female"
                                                    value="female" /><label class="form-check-label"
                                                    for="female">Female</label>
                                            </div>
                                        </div>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="dob">Date
                                                of birth</label><input type="date" class="form-control" name="dob" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="cob">Country of
                                                Birth</label><input type="text" class="form-control" name="cob" /></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group"><label for="spoken">Language spoken
                                                    at
                                                    home?</label><input type="text" class="form-control" name="spoken" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group"><label for="usi">Do
                                                    you already possess a unique student
                                                    identifier (USI)? </label><input type="text" class="form-control"
                                                    name="usi" /></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="origin">Are
                                                you of Aboriginal or Torres Strait Islander
                                                origin? </label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="origin" id="No"
                                                        value="female" /><label class="form-check-label" for="No">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="origin"
                                                        id="Aboriginal" value="female" /><label class="form-check-label"
                                                        for="Aboriginal">Yes
                                                        Aboriginal</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="origin" id="Yes"
                                                        value="Yes Torres Strait islander" /><label class="form-check-label"
                                                        for="Yes">Yes
                                                        Torres Strait
                                                        islander</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="identifier"
                                                    value="identifier" name="identifier" /><label class="form-check-label"
                                                    for="identifier">I
                                                    wish Unique College
                                                    of Technology UCT Pty Ltd permission to
                                                    source a unique student identifier on
                                                    your behalf </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="emergencyContact">Emergency
                                                contact</label><input type="text" class="form-control"
                                                id="emergencyContact" name="emergencyContact" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label
                                                for="emergencyRelation">Relationship</label><input type="text"
                                                class="form-control" id="emergencyRelation" name="emergencyRelation" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="dayTimeTelephone">Daytime
                                                telephone</label><input type="text" class="form-control"
                                                name="dayTimeTelephone" id="dayTimeTelephone" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="emergencyMobile">Mobile</label><input
                                                type="text" class="form-control" id="emergencyMobile"
                                                name="emergencyMobile" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="courseCode">Course
                                                code</label><input type="text" class="form-control" name="courseCode"
                                                id="courseCode" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="courseTitle">Course
                                                title</label><input type="text" class="form-control" id="courseTitle"
                                                name="courseTitle" /></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="unitName">Unit
                                                name</label><input type="text" class="form-control" id="unitName"
                                                name="unitName" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="">Unit
                                                code</label><input type="text" class="form-control" name="unitCode"
                                                id="unitCode" /></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="aboutCourse">How did you
                                                hear about the
                                                course? </label><input type="text" class="form-control"
                                                name="aboutCourse" id="aboutCourse" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="couseEntry">Do
                                                you satisfy the course
                                                entry requirements (if any)? </label><select id="couseEntry"
                                                name="couseEntry" class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="speakEnglish">How well do
                                                you speak
                                                English? </label><select name="speakEnglish" id="speakEnglish"
                                                class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Very well</option>
                                                <option value="">Well</option>
                                                <option value="">Not well</option>
                                                <option value="">Not at all</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="schoolCompleted">Year
                                                school completed
                                                (eg.1998)</label><input type="text" name="schoolCompleted"
                                                id="schoolCompleted" class="form-control" /></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="schoolTown">Town/City</label><input
                                                type="text" name="schoolTown" id="schoolTown" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="schoolCompletedYear">What
                                                is your
                                                highest completed school
                                                year?</label><select name="schoolCompletedYear" id="schoolCompletedYear"
                                                class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Year 12</option>
                                                <option value="">Year 11</option>
                                                <option value="">Year 10</option>
                                                <option value="">Year 9</option>
                                                <option value="">Year 8 or below</option>
                                                <option value="">never attended school
                                                </option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="attendingSchool">Are you
                                                still
                                                attending secondary school?</label><select name="attendingSchool"
                                                id="attendingSchool" class="form-control">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="completedQualification">Have you
                                                successfully completed any of the following
                                                qualifications?</label><select name="completedQualification"
                                                id="completedQualification" class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Advanced Diploma or
                                                    Associate Degree </option>
                                                <option value="">Bachelor Degree or higher
                                                    degree </option>
                                                <option value="">Diploma or Associate
                                                    Diploma </option>
                                                <option value="">Certificate I</option>
                                                <option value="">Certificate II</option>
                                                <option value="">Certificate III or Trade
                                                    Certificate </option>
                                                <option value="">Certificate
                                                    I/Advanced/Technical Cert </option>
                                                <option value="">Other certificate</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="attendingSecondarySchool">Are you still
                                                attending secondary school?</label><select name="attendingSecondarySchool"
                                                id="attendingSecondarySchool" class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="disabilityCondition">Do you
                                                have a
                                                disability,
                                                impairment or long-term condition?
                                            </label><select name="disabilityCondition" id="disabilityCondition"
                                                class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="presenceOfDisability">If
                                                you indicated
                                                the presence of a disability,
                                                impairment or long-term condition,
                                                please select the area(s) in the following
                                                list: </label><select name="presenceOfDisability" id="presenceOfDisability"
                                                class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Acquired brain injury
                                                </option>
                                                <option value="">Hearing/deaf</option>
                                                <option value="">Intellectual</option>
                                                <option value="">Learning</option>
                                                <option value="">Medical Condition</option>
                                                <option value="">Mental Illness</option>
                                                <option value="">Other disability</option>
                                                <option value="">Physical</option>
                                                <option value="">Unspecified</option>
                                                <option value="">Visual/sight</option>
                                                <option value="">Chronic Illness</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="anythingPreventFromCourse">Is there
                                                anything that may prevent you from
                                                successfully completing the training course?
                                            </label><select name="anythingPreventFromCourse" id="anythingPreventFromCourse"
                                                class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="needHelp">Do
                                                you need help with reading
                                                and writing or maths? </label><select name="needHelp" id="needHelp"
                                                class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="wishToCompleteCourse">For
                                                what
                                                reason/s,
                                                as listed below,
                                                do you wish to complete this course?
                                            </label><select name="wishToCompleteCourse" id="wishToCompleteCourse"
                                                class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="">Get a job</option>
                                                <option value="">Try for a different career
                                                </option>
                                                <option value="">Extra skills for my job
                                                </option>
                                                <option value="">For self-development
                                                </option>
                                                <option value="">Develop my existing
                                                    business </option>
                                                <option value="">Get a better job or
                                                    promotion </option>
                                                <option value="">Get into another course or
                                                    study </option>
                                                <option value="">Start my own business
                                                </option>
                                                <option value="">Requirement of my job
                                                </option>
                                                <option value="">For personal interest
                                                </option>
                                                <option value="">Other reasons</option>
                                            </select></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="currentEmploymentStatus">Which
                                                situation,
                                                as listed below,
                                                best describes your current employment
                                                status?</label><select name="currentEmploymentStatus"
                                                id="currentEmploymentStatus" class="form-control">
                                                <option value="" disabled selected>Please select...</option>
                                                <option value="Employed (as an unpaid
                                                    family worker) ">Employed (as an unpaid
                                                    family worker) </option>
                                                <option value="Employee full time">Employee full time</option>
                                                <option value="Employee part time">Employee part time</option>
                                                <option value="Unemployed and seeking full
                                                    time work">Unemployed and seeking full
                                                    time work </option>
                                                <option value="An employer">An employer</option>
                                                <option value="Not employed – not seeking
                                                    employment/retired">Not employed – not seeking
                                                    employment/retired </option>
                                                <option value="Self employed (not
                                                    employing others) ">Self employed (not
                                                    employing others) </option>
                                                <option value="Unemployed and seeking part
                                                    time work">Unemployed and seeking part
                                                    time work </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="occupation">Occupation</label><input
                                                type="text" class="form-control" name="occupation" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="businessName">Business
                                                Name</label><input type="text" class="form-control"
                                                name="businessName" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="postalAddress">Postal
                                                Address</label><input type="text" class="form-control"
                                                name="postalAddress" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="contactPhone">Contact
                                                Phone</label><input type="text" class="form-control"
                                                name="contactPhone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="fax">Fax</label><input type="text"
                                                class="form-control" name="fax" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="email">Email</label><input type="email"
                                                class="form-control" name="businessEmail" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="currentEmploymentStatus">
                                            Do you wish to apply for Recognition of Prior Learning (RPL) or Credit Transfer
                                            (CT)?
                                        </label>
                                        <select name="currentEmploymentStatus" id="currentEmploymentStatus"
                                            class="form-control">
                                            <option value="" disabled selected>Please select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./inner -->
                    <div class="actions">
                        <ul>
                            <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i>BACK
                                </span></li>
                            <li><button type="submit" title="NEXT">SUBMIT <i class="fa fa-arrow-right"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
