<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Wizard V1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors/switch.css') }}" />
    <!-- Color Alternatives -->
    <style>
        .form-group {
            margin: 1rem auto;
        }

        .wizard-forms .card {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .actions li span,
        .actions li button {
            height: 50px;
            width: 95px;
            line-height: 52px;
            font-size: 15px;
        }

    </style>

    </link>
</head>

<body>
    <div class="clearfix"></div>
    <div class="wrapper">
        <div class="steps-area steps-area-fixed">
            <div class="image-holder"><img src="{{ asset('assets/img/side-img.jpg') }}" alt="" /></div>
            <div class="steps clearfix">
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn js-active current"><span>1</span></li>
                    <li class="multisteps-form__progress-btn"><span>2</span></li>
                    <li class="multisteps-form__progress-btn last"><span>3</span></li>
                </ul>
            </div>
        </div>
        <form class="multisteps-form__form" action="#" id="wizard" method="POST">
            <div class="form-area position-relative">
                <!-- div 1 -->
                <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <h3>LLN Assessment</h3>
                                    <div class="step-box">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-6"><label
                                                                        for="name">Name</label><input type="text"
                                                                        class="form-control required" name="name"
                                                                        required placeholder="Name" /></div>
                                                                <div class="col-6"><label
                                                                        for="date">Date</label><input type="date"
                                                                        class="form-control" name="date"
                                                                        placeholder="Date" /></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label
                                                                for="courses">Course/UoC</label><select id="courses"
                                                                class="form-control">
                                                                <option value="">Select a course...</option>
                                                                <option value="Course 1">Course 1</option>
                                                                <option value="Course 2">Course 2</option>
                                                                <option value="Course 3">Course 3</option>
                                                            </select></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="text-center">Language Literacy and Numeracy
                                                        Indication </h3>
                                                    <p>This document is designed to provide us with some idea as
                                                        to your literacy and numeracy skills to ensure that you
                                                        will be able to meet the English Language requirements
                                                        for the First Aid training. All questions must be
                                                        attempted. </p>
                                                    <p>There is no pass mark,
                                                        but rather the process advises us of your English
                                                        Language and numeracy skills and knowledge,
                                                        this provides us with an indication of the degree of
                                                        support you may require and if we can provide this. </p>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="text-center">ENGLISH LITERACY EXAM</h3>
                                                    <p>Read the following passage and answers the questions from
                                                        information in the passage. </p>
                                                    <p>There was a little detective agency in Africa;
                                                        it was at the foot of a large mountain. These were its
                                                        assets: a tiny white vatwo desks,
                                                        two chairs,
                                                        a telephone,
                                                        and an old typewriter. Then there was a teapot,
                                                        in which the lady detective brewed redbush tea. There
                                                        were three mugs,
                                                        one for the detective,
                                                        one for the secretary and one for a client. This agency
                                                        was in a beautiful little town. </p>
                                                    <p>When you walked out of the front door you could see an
                                                        acacia tree,
                                                        throne tree and the edge of the desert. As you walked
                                                        down the front stairs onto the red gravely road an old
                                                        Ford truck was parked in the driveway. </p>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group"><label>What country do you
                                                                find the agency?</label><input type="text"
                                                                class="form-control" /></div>
                                                        <div class="form-group"><label>List 5 of the assets
                                                                the agency had?</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group"><label>Who were the mugs
                                                                for?</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group"><label>What type of tea was
                                                                brewed by the lady detective?</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group"><label>Name the plants you
                                                                see outside the front door?</label>
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group"><label>You have arrived at
                                                                the local shopping centre and notice that the
                                                                floor is wet however no sign has been placed in
                                                                the area. Circle the appropriate sign that
                                                                should be placed in this area.</label>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <label>
                                                                        <input type="radio"
                                                                            class="input-form-check-input"
                                                                            name="radio_1" />
                                                                        <img src="{{ asset('/images/enrolments/1.png') }}"
                                                                            alt="Option 1" />
                                                                    </label>
                                                                </div>
                                                                <div class="col-4"><label><input type="radio"
                                                                            class="input-form-check-input"
                                                                            name="radio_1" /><img
                                                                            src="{{ asset('/images/enrolments/2.png') }}"
                                                                            alt="Option 2" /></label></div>
                                                                <div class="col-4"><label><input type="radio"
                                                                            class="input-form-check-input"
                                                                            name="radio_1" /><img
                                                                            src="{{ asset('/images/enrolments/3.png') }}"
                                                                            alt="Option 3" /></label></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label>It is important not
                                                                to use the lift in the event of a fire. Circle
                                                                the sign that indicates this practice.</label>
                                                            <div class="row">
                                                                <div class="col-4"><label><input type="radio"
                                                                            class="input-form-check-input"
                                                                            name="radio_2" /><img
                                                                            src="{{ asset('/images/enrolments/21.png') }}"
                                                                            alt="Option 1" /></label></div>
                                                                <div class="col-4"><label><input type="radio"
                                                                            class="input-form-check-input"
                                                                            name="radio_2" /><img
                                                                            src="{{ asset('/images/enrolments/22.png') }}"
                                                                            alt="Option 2" /></label></div>
                                                                <div class="col-4"><label><input type="radio"
                                                                            class="input-form-check-input"
                                                                            name="radio_2" /><img
                                                                            src="{{ asset('/images/enrolments/23.png') }}"
                                                                            alt="Option 3" /></label></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group"><label>Explain why it is
                                                                important to read all signs in the workplace.
                                                            </label>
                                                            <textarea class="form-control" placeholder="Explain here..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5>NUMERACY EXAM</h5>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group"><label>You are earning $19
                                                                per hour. You have worked 37 hours last week.
                                                                What is the amount prior to tax that you would
                                                                expect to be paid?</label><input type="text"
                                                                class="form-control" placeholder="$ XX" />
                                                        </div>
                                                        <div class="form-group"><label>You have a 25mg
                                                                tablet and you need give your client usually
                                                                takes 75mg. How many tablets would you need to
                                                                give to the client?</label><input type="input"
                                                                class="form-control" placeholder="X tablets" />
                                                        </div>
                                                        <div class="form-group"><label>You are organising a
                                                                bus trip with clients today and the bus seats 25
                                                                clients. On your list are 37 clients. How many
                                                                clients must you take off that
                                                                list?</label><input type="text" class="form-control"
                                                                placeholder="X clients" />
                                                        </div>
                                                        <div class="form-group"><label>You have 4 staff and
                                                                52 clients to care for. Each staff member will
                                                                have how many residents?</label><input type="text"
                                                                class="form-control" placeholder="X residents" />
                                                        </div>
                                                        <div class="form-group"><label>You have to give a
                                                                client 2 Panadol;
                                                                each Panadol tablet is 500mg. How many
                                                                milligrams of Panadol are you
                                                                giving?</label><input type="text" class="form-control"
                                                                placeholder="X mg" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.inner -->
                        <div class="actions">
                            <ul>
                                <li class="disable" aria-disabled="true"><span class="js-btn-next"
                                        title="NEXT">Backward <i class="fa fa-arrow-right"></i></span></li>
                                <li><span class="js-btn-next" title="NEXT">NEXT <i
                                            class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- div 2 -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <h2>PTR Form</h2>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group"><label for="expectations">What do
                                                    you hope to gain from undertaking this
                                                    qualification?</label>
                                                <textarea name="expectations" id="expectations" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group"><label for="position">Please write
                                                    a brief description of your current position.</label>
                                                <textarea name="position" id="position" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group"><label for="employed">Provide your
                                                    last 3 job titles and how long you were employed in each
                                                    position.</label>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="border-0 p-1"><input type="text"
                                                                    name="employed[]" class="form-control w-100" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-0 p-1"><input type="text"
                                                                    name="employed[]" class="form-control w-100" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border-0 p-1"><input type="text"
                                                                    name="employed[]" class="form-control w-100" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group"><label for="training1">Have you
                                                    acquired any formal training in any of the
                                                    qualifications you wish to enrol into?</label>
                                                <div class="d-block">
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="training1"
                                                            id="radio11" value="Yes" /><label class="form-check-label"
                                                            for="radio11">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="training1"
                                                            id="radio12" value="No" /><label class="form-check-label"
                                                            for="radio12">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="trainin2">Do you wish
                                                    to apply for RPL?</label>
                                                <div class="d-block">
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="training2"
                                                            id="radio21" value="Yes" /><label class="form-check-label"
                                                            for="radio21">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="training2"
                                                            id="radio22" value="No" /><label class="form-check-label"
                                                            for="radio22">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group"><label>Following information will
                                                    help us to determine,
                                                    you’re learning and styles and if we are able to deliver
                                                    courses that meet your learning styles. </label>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox"
                                                        value="Power Points explained to me during classes"
                                                        id="support11" /><label class="form-check-label"
                                                        for="support11">Power Points explained to me during
                                                        classes </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="Pictures and diagrams "
                                                        id="support12" /><label class="form-check-label"
                                                        for="support12">Pictures and diagrams </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="Group discussions with others "
                                                        id="support13" /><label class="form-check-label"
                                                        for="support13">Group discussions with others
                                                    </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="Conducting my own research "
                                                        id="support14" /><label class="form-check-label"
                                                        for="support14">Conducting my own research </label>
                                                </div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="Listening to the lectures/ trainers "
                                                        id="support15" /><label class="form-check-label"
                                                        for="support15">Listening to the lectures/ trainers
                                                    </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox"
                                                        value="Practical application of skills and knowledge in a workplace or similar or watching videos "
                                                        id="support16" /><label class="form-check-label"
                                                        for="support16">Practical application of skills and
                                                        knowledge in a workplace or similar or watching
                                                        videos </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox"
                                                        value="Working through real examples such as a case study or scenario "
                                                        id="support17" /><label class="form-check-label"
                                                        for="support17">Working through real examples such
                                                        as a case study or scenario </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="" id="support18" /><label
                                                        class="form-check-label" for="support18">Other </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group"><label for="expectations">What
                                                    additional support do you think you will need in order
                                                    to complete this course successfully? </label>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="English language support"
                                                        id="support21" /><label class="form-check-label"
                                                        for="support21">English language support </label>
                                                </div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="Reading support " id="support22" /><label
                                                        class="form-check-label" for="support22">Reading
                                                        support </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="Writing support" id="support23" /><label
                                                        class="form-check-label" for="support23">Writing
                                                        support </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="One-on-one guidance"
                                                        id="support24" /><label class="form-check-label"
                                                        for="support24">One-on-one
                                                        guidance </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="Additional resources"
                                                        id="support25" /><label class="form-check-label"
                                                        for="support25">Additional
                                                        resources </label></div>
                                                <div class="form-check"><input class="form-check-input"
                                                        type="checkbox" value="" id="support26" /><label
                                                        class="form-check-label" for="support26">Other </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.inner -->
                        <div class="actions">
                            <ul>
                                <li><span class="js-btn-prev" title="BACK"><i class="fa fa-arrow-left"></i>BACK
                                    </span></li>
                                <li><span class="js-btn-next" title="NEXT">NEXT <i
                                            class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- div 3 -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <h2>Enrolement</h2>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="givenName">Given
                                                            name</label><input type="text" class="form-control"
                                                            name="givenName" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="sureName">Family name
                                                            (surname)</label><input type="text" class="form-control"
                                                            name="sureName" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label
                                                            for="address">Address</label><input type="text"
                                                            class="form-control" name="address" /></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="town">Town</label><input
                                                            type="text" class="form-control" name="town" /></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label
                                                            for="territory">Territory</label><input type="text"
                                                            class="form-control" name="territory" /></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="code">Code</label><input
                                                            type="text" class="form-control" name="code" /></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="phone">Phone
                                                        </label><input type="text" class="form-control"
                                                            name="phone" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="mobile">Mobile</label><input type="text"
                                                            class="form-control" name="mobile" /></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="email">Email</label><input
                                                            type="text" class="form-control" name="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6"><label for="gender">Gender</label>
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="male" value="male" /><label
                                                                class="form-check-label" for="male">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="female" value="female" /><label
                                                                class="form-check-label" for="female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="dob">Date
                                                            of birth</label><input type="date" class="form-control"
                                                            name="dob" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="cob">Country of
                                                            Birth</label><input type="text" class="form-control"
                                                            name="cob" /></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group"><label for="spoken">Language spoken
                                                                at
                                                                home?</label><input type="text" class="form-control"
                                                                name="spoken" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group"><label for="usi">Do
                                                                you already possess a unique student
                                                                identifier (USI)? </label><input type="text"
                                                                class="form-control" name="usi" /></div>
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
                                                                <input class="form-check-input" type="radio"
                                                                    name="origin" id="No" value="female" /><label
                                                                    class="form-check-label" for="No">No</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="origin" id="Aboriginal"
                                                                    value="female" /><label class="form-check-label"
                                                                    for="Aboriginal">Yes
                                                                    Aboriginal</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="origin" id="Yes"
                                                                    value="Yes Torres Strait islander" /><label
                                                                    class="form-check-label" for="Yes">Yes
                                                                    Torres Strait
                                                                    islander</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-center">
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="identifier" value="identifier" /><label
                                                                class="form-check-label" for="identifier">I
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
                                                            for="emergencyRelation">Relationship</label><input
                                                            type="text" class="form-control" id="emergencyRelation"
                                                            name="emergencyRelation" /></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="dayTimeTelephone">Daytime
                                                            telephone</label><input type="text" class="form-control"
                                                            name="dayTimeTelephone" id="dayTimeTelephone" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="mobile">Mobile</label><input type="text"
                                                            class="form-control" id="mobile" name="mobile" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="courseCode">Course
                                                            code</label><input type="text" class="form-control"
                                                            name="courseCode" id="courseCode" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="courseTitle">Course
                                                            title</label><input type="text" class="form-control"
                                                            id="courseTitle" name="courseTitle" /></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="unitName">Unit
                                                            name</label><input type="text" class="form-control"
                                                            id="unitName" name="unitName" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="">Unit
                                                            code</label><input type="text" class="form-control"
                                                            name="unitCode" id="unitCode" /></div>
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
                                                            English? </label><select name="speakEnglish"
                                                            id="speakEnglish" class="form-control">
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
                                                    <div class="form-group"><label
                                                            for="schoolTown">Town/City</label><input type="text"
                                                            name="schoolTown" id="schoolTown" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="schoolCompletedYear">What
                                                            is your
                                                            highest completed school
                                                            year?</label><select name="schoolCompletedYear"
                                                            id="schoolCompletedYear" class="form-control">
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
                                                            attending secondary school?</label><select
                                                            name="attendingSchool" id="attendingSchool"
                                                            class="form-control">
                                                            <option value="">Yes</option>
                                                            <option value="">No</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="completedQualification">Have you
                                                            successfully completed any of the following
                                                            qualifications?</label><select name="completedQualification"
                                                            id="completedQualification" class="form-control">
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
                                                    <div class="form-group"><label
                                                            for="attendingSecondarySchool">Are you still
                                                            attending secondary school?</label><select
                                                            name="attendingSecondarySchool"
                                                            id="attendingSecondarySchool" class="form-control">
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
                                                        </label><select name="disabilityCondition"
                                                            id="disabilityCondition" class="form-control">
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
                                                            list: </label><select name="presenceOfDisability"
                                                            id="presenceOfDisability" class="form-control">
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
                                                    <div class="form-group"><label
                                                            for="anythingPreventFromCourse">Is there
                                                            anything that may prevent you from
                                                            successfully completing the training course?
                                                        </label><select name="anythingPreventFromCourse"
                                                            id="anythingPreventFromCourse" class="form-control">
                                                            <option value="">Yes</option>
                                                            <option value="">No</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="needHelp">Do
                                                            you need help with reading
                                                            and writing or maths? </label><select name="needHelp"
                                                            id="needHelp" class="form-control">
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
                                                        </label><select name="wishToCompleteCourse"
                                                            id="wishToCompleteCourse" class="form-control">
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
                                                    <div class="form-group"><label
                                                            for="currentEmploymentStatus">Which
                                                            situation,
                                                            as listed below,
                                                            best describes your current employment
                                                            status?</label><select name="currentEmploymentStatus"
                                                            id="currentEmploymentStatus" class="form-control">
                                                            <option value="">Employed (as an unpaid
                                                                family worker) </option>
                                                            <option value="">Employee full time</option>
                                                            <option value="">Employee part time</option>
                                                            <option value="">Unemployed and seeking full
                                                                time work </option>
                                                            <option value="">An employer</option>
                                                            <option value="">Not employed – not seeking
                                                                employment/retired </option>
                                                            <option value="">Self employed (not
                                                                employing others) </option>
                                                            <option value="">Unemployed and seeking part
                                                                time work </option>
                                                        </select></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="occupation">Occupation</label><input type="text"
                                                            class="form-control" name="occupation" /></div>
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
                                                    <div class="form-group"><label for="fax">Fax</label><input
                                                            type="text" class="form-control" name="fax" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="email">Email</label><input
                                                            type="email" class="form-control" name="email" />
                                                    </div>
                                                </div>
                                            </div>
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
                                <li><button type="submit" title="NEXT">SUBMIT <i
                                            class="fa fa-arrow-right"></i></button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/conditionize.flexible.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/wizard-main.js') }}"></script>
    <script src="{{ asset('assets/js/switch.js') }}"></script>
    <script>
        $("#files").change(function() {
            filename = this.files[0].name;
            // console.log(filename);
        });

        function UploadFile() {
            var reader = new FileReader();
            var file = document.getElementById("attach").files[0];
            reader.onload = function() {
                document.getElementById("fileContent").value = reader.result;
                document.getElementById("filename").value = file.name;
                document.getElementById("wizard").submit();
            };
            reader.readAsDataURL(file);
        }

        $(document).ready(function() {
            $(".conditional").conditionize();
        });
    </script>
</body>

</html>
