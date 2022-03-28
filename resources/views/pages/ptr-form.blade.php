@extends('layouts.guest')

@section('content')
<div class="container">
    <form>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="expectations">What do you hope to gain from undertaking this qualification?</label>
                    <textarea name="expectations" id="expectations" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="position">Please write a brief description of your current position.</label>
                    <textarea name="position" id="position" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="employed">Provide your last 3 job titles and how long you were employed in each position.</label>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="border-0 p-1">
                                    <input type="text" name="employed[]" class="form-control w-100">
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0 p-1">
                                    <input type="text" name="employed[]" class="form-control w-100">
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0 p-1">
                                    <input type="text" name="employed[]" class="form-control w-100">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="training1">Have you acquired any formal training in any of the qualifications you wish to enrol into?</label>
                    <div class="d-block">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="training1" id="radio11" value="Yes">
                            <label class="form-check-label" for="radio11">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="training1" id="radio12" value="No">
                            <label class="form-check-label" for="radio12">No</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="trainin2">Do you wish to apply for RPL?</label>
                    <div class="d-block">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="training2" id="radio21" value="Yes">
                            <label class="form-check-label" for="radio21">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="training2" id="radio22" value="No">
                            <label class="form-check-label" for="radio22">No</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>
                        Following information will help us to determine, you’re learning and styles 
                        and if we are able to deliver courses that meet your learning styles.
                    </label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Power Points explained to me during classes" id="support11">
                        <label class="form-check-label" for="support11">
                            Power Points explained to me during classes 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pictures and diagrams " id="support12">
                        <label class="form-check-label" for="support12">
                            Pictures and diagrams 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Group discussions with others " id="support13">
                        <label class="form-check-label" for="support13">
                            Group discussions with others 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Conducting my own research " id="support14">
                        <label class="form-check-label" for="support14">
                            Conducting my own research 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Listening to the lectures/ trainers " id="support15">
                        <label class="form-check-label" for="support15">
                            Listening to the lectures/ trainers 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Practical application of skills and knowledge in a workplace or similar or watching videos " id="support16">
                        <label class="form-check-label" for="support16">
                            Practical application of skills and knowledge in a workplace or similar or watching videos 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Working through real examples such as a case study or scenario " id="support17">
                        <label class="form-check-label" for="support17">
                            Working through real examples such as a case study or scenario 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="support18">
                        <label class="form-check-label" for="support18">
                            Other 
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="expectations">
                        What additional support do you think you will need in order to complete this course successfully?
                    </label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="English language support" id="support21">
                        <label class="form-check-label" for="support21">
                            English language support
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Reading support " id="support22">
                        <label class="form-check-label" for="support22">
                            Reading support 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Writing support" id="support23">
                        <label class="form-check-label" for="support23">
                            Writing support
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="One-on-one guidance" id="support24">
                        <label class="form-check-label" for="support24">
                            One-on-one guidance
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Additional resources" id="support25">
                        <label class="form-check-label" for="support25">
                            Additional resources 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="support26">
                        <label class="form-check-label" for="support26">
                            Other
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
