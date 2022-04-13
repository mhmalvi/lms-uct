<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Enrollment Submission - UCT</title>

    <style>
        body {
            margin: 0;
        }

        .container-wrapper {
            /* background: #dfdfdf; */
            /* padding: 15px 0; */
        }

        .container {
            background-color: #fff;
            width: 560px;
            border-radius: 4px;
            box-shadow: 0 2px 5px 1px #ddd;
            overflow: hidden;
            margin: 0 auto;
        }

        * {
            font-family: "Roboto", sans-serif;
        }

        .text-center {
            text-align: center;
        }

        .row {
            margin-left: 20px;
            margin-right: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .row-fluid {
            margin-left: 0;
            margin-right: 0;
            padding-left: 20px;
            padding-right: 20px;
        }

        .submission-item .question {
            font-weight: bold;
        }

        .footer {
            background-color: #92241d;
            color: #fff;
        }

        .fluid-p {
            margin-top: 0;
            margin-bottom: 0;
        }

    </style>
</head>

<body>
    <div class="container-wrapper">
        <div class="container">
            <h3 class="text-center">UCT Enrollment Form Submission</h3>
            <hr />

            <h4>Language Literacy and Numeracy Indication</h4>
            <div class="row">
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Name</p>
                    <p class="answer">Answer: {{ @$data->name }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Date</p>
                    <p class="answer">
                        Answer: {{ @$data->date }}
                    </p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Course/UoC</p>
                    <p class="answer">Answer: {{ @$data->selected_course }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: What country do you find the agency?</p>
                    <p class="answer">Answer: {{ @$data->country_agency }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q:List 5 of the assets the agency had?</p>
                    <p class="answer">Answer: {{ @$data->agency_5_assets }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Who were the mugs for?</p>
                    <p class="answer">Answer: {{ @$data->who_were_the_mugs_for }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: What type of tea was brewed by the lady
                        detective?
                    </p>
                    <p class="answer">Answer: {{ @$data->type_of_tea_brewed_by_lady_detective }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: Name the plants you see outside the front door?
                    </p>
                    <p class="answer">Answer: {{ @$data->plants_outside_front_door }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->wet_floor_sign))
                    <div class="submission-item">
                        <p class="question">
                            Q: You have arrived at the local shopping centre and
                            notice that the floor is wet however no sign has
                            been placed in the area. Circle the appropriate sign
                            that should be placed in this area.
                        </p>
                        <p class="answer">Answer: {{ @$data->wet_floor_sign }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->use_lift_in_event_of_fire))
                    <div class="submission-item">
                        <p class="question">
                            Q: It is important not to use the lift in the event
                            of a fire. Circle the sign that indicates this
                            practice.
                        </p>
                        <p class="answer">Answer: {{ @$data->use_lift_in_event_of_fire }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: Explain why it is important to read all signs in
                        the workplace.
                    </p>
                    <p class="answer">Answer: {{ @$data->explain_importance_of_read_signs }}</p>
                </div>
                <!-- End of the submission item -->
                H
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: You are earning $19 per hour. You have worked 37
                        hours last week. What is the amount prior to tax
                        that you would expect to be paid?
                    </p>
                    <p class="answer">Answer: {{ @$data->amount_of_paid }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: You have a 25mg tablet and you need give your
                        client usually takes 75mg. How many tablets would
                        you need to give to the client?
                    </p>
                    <p class="answer">Answer: {{ @$data->tablets_to_give_clients }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: You are organising a bus trip with clients today
                        and the bus seats 25 clients. On your list are 37
                        clients. How many clients must you take off that
                        list?
                    </p>
                    <p class="answer">Answer: {{ @$data->clients_to_take_off_list }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: You have 4 staff and 52 clients to care for. Each
                        staff member will have how many residents?
                    </p>
                    <p class="answer">Answer: {{ @$data->how_many_residents }}</p>
                </div>
                <!-- End of the submission item -->

                <h4>Pre-Training Review</h4>

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: You have to give a client 2 Panadol; each Panadol
                        tablet is 500mg. How many milligrams of Panadol are
                        you giving?
                    </p>
                    <p class="answer">Answer: {{ @$data->how_many_panadol }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: What do you hope to gain from undertaking this
                        qualification?
                    </p>
                    <p class="answer">Answer: {{ @$data->expectations }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: Please write a brief description of your current
                        position.
                    </p>
                    <p class="answer">Answer: {{ @$data->position }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: Provide your last 3 job titles and how long you
                        were employed in each position.
                    </p>
                    <p class="answer">Title 1: {{ @$data->employed[0] }}</p>
                    <p class="answer">Title 2: {{ @$data->employed[1] }}</p>
                    <p class="answer">Title 3: {{ @$data->employed[2] }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->training1))
                    <div class="submission-item">
                        <p class="question">
                            Q: Have you acquired any formal training in any of
                            the qualifications you wish to enrol into?
                        </p>
                        <p class="answer">Answer: {{ @$data->training1 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->training2))
                    <div class="submission-item">
                        <p class="question">Q: Do you wish to apply for RPL?</p>
                        <p class="answer">Answer: {{ @$data->training2 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->support1))
                    <div class="submission-item">
                        <p class="question">
                            Q: Following information will help us to determine,
                            you’re learning and styles and if we are able to
                            deliver courses that meet your learning styles.
                        </p>
                        <p class="answer">Answer: {{ @$data->support1 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->support2))
                    <div class="submission-item">
                        <p class="question">
                            Q: What additional support do you think you will
                            need in order to complete this course successfully?
                        </p>
                        <p class="answer">Answer: {{ @$data->support2 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->assesment1))
                    <div class="submission-item">
                        <p class="question">
                            Q: Is the course chosen aligned to the student’s
                            employment history/ career objectives and
                            aspirations?
                        </p>
                        <p class="answer">Answer: {{ @$data->assesment1 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->assesment2))
                    <div class="submission-item">
                        <p class="question">
                            Q: Student is fully aware of the course training and
                            assessment arrangements i.e. attendance
                            requirements, training and assessment method?
                        </p>
                        <p class="answer">Answer: {{ @$data->assesment2 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->assesment3))
                    <div class="submission-item">
                        <p class="question">
                            Q: Student is fully aware of their rights and
                            obligation?
                        </p>
                        <p class="answer">Answer: {{ @$data->assesment3 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->assesment4))
                    <div class="submission-item">
                        <p class="question">
                            Q: Training and assessment strategy is suitable
                            based on the students learning needs and learning
                            styles?
                        </p>
                        <p class="answer">Answer: {{ @$data->assesment4 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->assesment5))
                    <div class="submission-item">
                        <p class="question">
                            Q: Student is aware of RPL and CT arrangements and
                            application process?
                        </p>
                        <p class="answer">Answer: {{ @$data->assesment5 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->assesment6))
                    <div class="submission-item">
                        <p class="question">
                            Q: Authorised Person’s declaration
                        </p>
                        <p class="answer">Answer: {{ @$data->assesment6 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->assesment7))
                    <div class="submission-item">
                        <p class="question">
                            Q: Based on the information provided on this form,
                            student meets the requirements for this course,
                            subject to LLN.
                        </p>
                        <p class="answer">Answer: {{ @$data->assesment7 }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <h4>Enrollment</h4>
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Given name</p>
                    <p class="answer">Answer: {{ @$data->givenName }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Family name (surname)</p>
                    <p class="answer">Answer: {{ @$data->sureName }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Address</p>
                    <p class="answer">Answer: {{ @$data->address }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Town</p>
                    <p class="answer">Answer: {{ @$data->town }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Territory</p>
                    <p class="answer">Answer: {{ @$data->territory }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Code</p>
                    <p class="answer">Answer: {{ @$data->code }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Phone</p>
                    <p class="answer">Answer: {{ @$data->phone }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Mobile</p>
                    <p class="answer">Answer: {{ @$data->mobile }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Email</p>
                    <p class="answer">Answer: {{ @$data->email }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                @if (isset($data->gender))
                    <div class="submission-item">
                        <p class="question">Q: Gender</p>
                        <p class="answer">Answer: {{ @$data->gender }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Date of birth</p>
                    <p class="answer">Answer: {{ @$data->dob }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Country of Birth</p>
                    <p class="answer">Answer: {{ @$data->cob }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Language spoken at home?</p>
                    <p class="answer">Answer: {{ @$data->spoken }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Do you already possess a unique student identifier (USI)?</p>
                    <p class="answer">Answer: {{ @$data->usi }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                @if (isset($data->origin))
                    <div class="submission-item">
                        <p class="question">Q: Are you of Aboriginal or Torres Strait Islander origin?</p>
                        <p class="answer">Answer: {{ @$data->origin }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                @if (isset($data->identifier))
                    <div class="submission-item">
                        <p class="question">Q: I wish Unique College of Technology UCT Pty Ltd permission to
                            source a unique student identifier on your behalf</p>
                        <p class="answer">Answer: {{ @$data->identifier }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Emergency contact</p>
                    <p class="answer">Answer: {{ @$data->emergencyContact }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Relationship</p>
                    <p class="answer">Answer: {{ @$data->emergencyRelation }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Daytime telephone</p>
                    <p class="answer">Answer: {{ @$data->dayTimeTelephone }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Mobile</p>
                    <p class="answer">Answer: {{ @$data->emergencyMobile }}</p>
                </div>
                <!-- End of the submission item -->

                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Course code</p>
                    <p class="answer">Answer: {{ @$data->courseCode }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Course title</p>
                    <p class="answer">Answer: {{ @$data->courseTitle }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Unit name</p>
                    <p class="answer">Answer: {{ @$data->unitName }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Unit code</p>
                    <p class="answer">Answer: {{ @$data->unitCode }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: How did you hear about the course?
                    </p>
                    <p class="answer">Answer: {{ @$data->aboutCourse }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->couseEntry))
                    <div class="submission-item">
                        <p class="question">
                            Q: Do you satisfy the course entry requirements (if
                            any)?
                        </p>
                        <p class="answer">Answer: {{ @$data->couseEntry }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->speakEnglish))
                    <div class="submission-item">
                        <p class="question">
                            Q: How well do you speak English?
                        </p>
                        <p class="answer">Answer: {{ @$data->speakEnglish }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: Year school completed (eg.1998)
                    </p>
                    <p class="answer">Answer: {{ @$data->schoolCompleted }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Town/City</p>
                    <p class="answer">Answer: {{ @$data->schoolTown }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->schoolCompletedYear))
                    <div class="submission-item">
                        <p class="question">
                            Q: What is your highest completed school year?
                        </p>
                        <p class="answer">Answer: {{ @$data->schoolCompletedYear }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">
                        Q: Are you still attending secondary school?
                    </p>
                    <p class="answer">Answer: {{ @$data->attendingSchool }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->completedQualification))
                    <div class="submission-item">
                        <p class="question">
                            Q: Have you successfully completed any of the
                            following qualifications?
                        </p>
                        <p class="answer">Answer: {{ @$data->completedQualification }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->attendingSecondarySchool))
                    <div class="submission-item">
                        <p class="question">
                            Q: Are you still attending secondary school?
                        </p>
                        <p class="answer">Answer: {{ @$data->attendingSecondarySchool }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->disabilityCondition))
                    <div class="submission-item">
                        <p class="question">
                            Q: Do you have a disability, impairment or long-term
                            condition?
                        </p>
                        <p class="answer">Answer: {{ @$data->disabilityCondition }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->presenceOfDisability))
                    <div class="submission-item">
                        <p class="question">
                            Q: If you indicated the presence of a disability,
                            impairment or long-term condition, please select the
                            area(s) in the following list:
                        </p>
                        <p class="answer">Answer: {{ @$data->presenceOfDisability }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->anythingPreventFromCourse))
                    <div class="submission-item">
                        <p class="question">
                            Q: Is there anything that may prevent you from
                            successfully completing the training course?
                        </p>
                        <p class="answer">Answer: {{ @$data->anythingPreventFromCourse }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->needHelp))
                    <div class="submission-item">
                        <p class="question">
                            Q: Do you need help with reading and writing or
                            maths?
                        </p>
                        <p class="answer">Answer: {{ @$data->needHelp }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->wishToCompleteCourse))
                    <div class="submission-item">
                        <p class="question">
                            Q: For what reason/s, as listed below, do you wish
                            to complete this course?
                        </p>
                        <p class="answer">Answer: {{ @$data->wishToCompleteCourse }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->currentEmploymentStatus))
                    <div class="submission-item">
                        <p class="question">
                            Q: Which situation, as listed below, best describes
                            your current employment status?
                        </p>
                        <p class="answer">Answer: {{ @$data->currentEmploymentStatus }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Occupation</p>
                    <p class="answer">Answer: {{ @$data->occupation }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Business Name</p>
                    <p class="answer">Answer: {{ @$data->businessName }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Postal Address</p>
                    <p class="answer">Answer: {{ @$data->postalAddress }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Contact Phone</p>
                    <p class="answer">Answer: {{ @$data->contactPhone }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Fax</p>
                    <p class="answer">Answer: {{ @$data->fax }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                <div class="submission-item">
                    <p class="question">Q: Email</p>
                    <p class="answer">Answer: {{ @$data->businessEmail }}</p>
                </div>
                <!-- End of the submission item -->
                <!-- This is a submission item -->
                @if (isset($data->currentEmploymentStatus))
                    <div class="submission-item">
                        <p class="question">
                            Q: Do you wish to apply for Recognition of Prior
                            Learning (RPL) or Credit Transfer (CT)?
                        </p>
                        <p class="answer">Answer: {{ @$data->currentEmploymentStatus }}</p>
                    </div>
                @endif
                <!-- End of the submission item -->
            </div>

            <div class="row row-fluid footer">
                <p class="text-center fluid-p">copyright @UCT</p>
            </div>
        </div>
    </div>
</body>

</html>
