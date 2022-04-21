<template>
  <form @submit.prevent="onFormSubmitHandler">
    <div class="py-5">
      <h4 class="text-center">Enrollment</h4>
      <div class="py-4">
        <div class="progress">
          <div
            class="progress-bar"
            role="progressbar"
            style="width: 100%"
            aria-valuenow="100"
            aria-valuemin="0"
            aria-valuemax="100"
          >
            100%
          </div>
        </div>
      </div>
      <div class="my-5"></div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="givenName">Given name *</label>
                <input type="text" class="form-control" name="givenName" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sureName">Family name (surname) *</label>
                <input type="text" class="form-control" name="sureName" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group pt-4">
                <label for="address">Address</label
                ><input type="text" class="form-control" name="address" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="town">Town</label
                ><input type="text" class="form-control" name="town" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="territory">Territory</label
                ><input type="text" class="form-control" name="territory" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="code">Code</label
                ><input type="text" class="form-control" name="code" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="phone">Phone </label
                ><input type="text" class="form-control" name="phone" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="mobile">Mobile</label
                ><input type="text" class="form-control" name="mobile" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="email">Email</label
                ><input type="text" class="form-control" name="email" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="gender">Gender</label>
                <select class="form-control">
                  <option value selected disabled>
                    Please select your gender
                  </option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="dob">Date of birth</label
                ><input type="date" class="form-control" name="dob" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="cob">Country of Birth</label
                ><input type="text" class="form-control" name="cob" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="spoken">Language spoken at home?</label
                ><input type="text" class="form-control" name="spoken" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="usi"
                  >Do you already possess a unique student identifier (USI)? </label
                ><input type="text" class="form-control" name="usi" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="origin"
                  >Are you of Aboriginal or Torres Strait Islander origin?
                </label>
                <select class="form-control" name="origin">
                  <option value selected disabled>Please select...</option>
                  <option value="no">No</option>
                  <option value="yes aboriginal">Yes Aboriginal</option>
                  <option value="yes torres strait islander">
                    Yes Torres Strait islander
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="emergencyContact">Emergency contact</label
                ><input
                  type="text"
                  class="form-control"
                  id="emergencyContact"
                  name="emergencyContact"
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="emergencyRelation">Relationship</label
                ><input
                  type="text"
                  class="form-control"
                  id="emergencyRelation"
                  name="emergencyRelation"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="dayTimeTelephone">Daytime telephone</label
                ><input
                  type="text"
                  class="form-control"
                  name="dayTimeTelephone"
                  id="dayTimeTelephone"
                />
              </div>
            </div>
          </div>
          <div class="form-group pt-4">
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="checkbox"
                id="identifier"
                value="identifier"
                name="identifier"
              /><label class="form-check-label" for="identifier"
                >I wish Unique College of Technology UCT Pty Ltd permission to
                source a unique student identifier on your behalf
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="my-5"></div>

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="courseCode">Course code</label
                ><input
                  type="text"
                  class="form-control"
                  name="courseCode"
                  id="courseCode"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="courseTitle">Course title</label
                ><input
                  type="text"
                  class="form-control"
                  id="courseTitle"
                  name="courseTitle"
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="unitName">Unit name</label
                ><input
                  type="text"
                  class="form-control"
                  id="unitName"
                  name="unitName"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="">Unit code</label
                ><input
                  type="text"
                  class="form-control"
                  name="unitCode"
                  id="unitCode"
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="aboutCourse"
                  >How did you hear about the course? </label
                ><input
                  type="text"
                  class="form-control"
                  name="aboutCourse"
                  id="aboutCourse"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="couseEntry"
                  >Do you satisfy the course entry requirements (if any)? </label
                ><select id="couseEntry" name="couseEntry" class="form-control">
                  <option value="" disabled selected>Please select...</option>
                  <option value="">Yes</option>
                  <option value="">No</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="my-5"></div>

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="speakEnglish">How well do you speak English? </label
                ><select
                  name="speakEnglish"
                  id="speakEnglish"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="">Very well</option>
                  <option value="">Well</option>
                  <option value="">Not well</option>
                  <option value="">Not at all</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="schoolCompleted"
                  >Year school completed (eg.1998)</label
                ><input
                  type="text"
                  name="schoolCompleted"
                  id="schoolCompleted"
                  class="form-control"
                />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="schoolTown">Town/City</label
                ><input
                  type="text"
                  name="schoolTown"
                  id="schoolTown"
                  class="form-control"
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="schoolCompletedYear"
                  >What is your highest completed school year?</label
                ><select
                  name="sclCompletedYear"
                  id="schoolCompletedYear"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="">Year 12</option>
                  <option value="">Year 11</option>
                  <option value="">Year 10</option>
                  <option value="">Year 9</option>
                  <option value="">Year 8 or below</option>
                  <option value="">never attended school</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="attendingSchool"
                  >Are you still attending secondary school?</label
                ><select
                  name="attendingSchool"
                  id="attendingSchool"
                  class="form-control"
                >
                  <option value="">Yes</option>
                  <option value="">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="completedQualification"
                  >Have you successfully completed any of the following
                  qualifications?</label
                ><select
                  name="completedQualification"
                  id="completedQualification"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="Advanced Diploma or Associate Degree">
                    Advanced Diploma or Associate Degree
                  </option>
                  <option value="Bachelor Degree or higher degree">
                    Bachelor Degree or higher degree
                  </option>
                  <option value="Diploma or Associate Diploma">
                    Diploma or Associate Diploma
                  </option>
                  <option value="Certificate I">Certificate I</option>
                  <option value="Certificate II">Certificate II</option>
                  <option value="Certificate III or Trade Certificate">
                    Certificate III or Trade Certificate
                  </option>
                  <option value="Certificate I/Advanced/Technical Cert">
                    Certificate I/Advanced/Technical Cert
                  </option>
                  <option value="Other certificate">Other certificate</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="attendingSecondarySchool"
                  >Are you still attending secondary school?</label
                ><select
                  name="attendingSecondarySchool"
                  id="attendingSecondarySchool"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group pt-4">
                <label for="disabilityCondition"
                  >Do you have a disability, impairment or long-term condition? </label
                ><select
                  name="disabilityCondition"
                  id="disabilityCondition"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group pt-4">
                <label for="presenceOfDisability"
                  >If you indicated the presence of a disability, impairment or
                  long-term condition, please select the area(s) in the
                  following list: </label
                ><select
                  name="presenceOfDisability"
                  id="presenceOfDisability"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="Acquired brain injury">
                    Acquired brain injury
                  </option>
                  <option value="Hearing/deaf">Hearing/deaf</option>
                  <option value="Intellectual">Intellectual</option>
                  <option value="Learning">Learning</option>
                  <option value="Medical Condition">Medical Condition</option>
                  <option value="Mental Illness">Mental Illness</option>
                  <option value="Other disabilit">Other disability</option>
                  <option value="Physical">Physical</option>
                  <option value="Unspecified">Unspecified</option>
                  <option value="Visual/sight">Visual/sight</option>
                  <option value="Chronic Illness">Chronic Illness</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group pt-4">
                <label for="anythingPreventFromCourse"
                  >Is there anything that may prevent you from successfully
                  completing the training course? </label
                ><select
                  name="anythingPreventFromCourse"
                  id="anythingPreventFromCourse"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="needHelp"
                  >Do you need help with reading and writing or maths? </label
                ><select name="needHelp" id="needHelp" class="form-control">
                  <option value="" disabled selected>Please select...</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="wishToCompleteCourse"
                  >For what reason/s, as listed below, do you wish to complete
                  this course? </label
                ><select
                  name="wishToCompleteCourse"
                  id="wishToCompleteCourse"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="Get a job">Get a job</option>
                  <option value="Try for a different career">
                    Try for a different career
                  </option>
                  <option value="Extra skills for my job">
                    Extra skills for my job
                  </option>
                  <option value="For self-development">
                    For self-development
                  </option>
                  <option value="Develop my existing business">
                    Develop my existing business
                  </option>
                  <option value="Get a better job or promotion">
                    Get a better job or promotion
                  </option>
                  <option value="Get into another course or study">
                    Get into another course or study
                  </option>
                  <option value="Start my own business">
                    Start my own business
                  </option>
                  <option value="Requirement of my job">
                    Requirement of my job
                  </option>
                  <option value="For personal interest">
                    For personal interest
                  </option>
                  <option value="Other reasons">Other reasons</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="my-5"></div>

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="currentEmploymentStatus"
                  >Which situation, as listed below, best describes your current
                  employment status?</label
                ><select
                  name="currentEmploymentStatus"
                  id="currentEmploymentStatus"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option
                    value="Employed (as an unpaid
                                                    family worker) "
                  >
                    Employed (as an unpaid family worker)
                  </option>
                  <option value="Employee full time">Employee full time</option>
                  <option value="Employee part time">Employee part time</option>
                  <option
                    value="Unemployed and seeking full
                                                    time work"
                  >
                    Unemployed and seeking full time work
                  </option>
                  <option value="An employer">An employer</option>
                  <option
                    value="Not employed – not seeking
                                                    employment/retired"
                  >
                    Not employed – not seeking employment/retired
                  </option>
                  <option
                    value="Self employed (not
                                                    employing others) "
                  >
                    Self employed (not employing others)
                  </option>
                  <option
                    value="Unemployed and seeking part
                                                    time work"
                  >
                    Unemployed and seeking part time work
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="occupation">Occupation</label
                ><input type="text" class="form-control" name="occupation" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group pt-4">
                <label for="businessName">Business Name</label
                ><input type="text" class="form-control" name="businessName" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="postalAddress">Postal Address</label
                ><input type="text" class="form-control" name="postalAddress" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="contactPhone">Contact Phone</label
                ><input type="text" class="form-control" name="contactPhone" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group pt-4">
                <label for="fax">Fax</label
                ><input type="text" class="form-control" name="fax" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group pt-4">
                <label for="currentEmploymentStatus">
                  Do you wish to apply for Recognition of Prior Learning (RPL)
                  or Credit Transfer (CT)?
                </label>
                <select
                  name="currentEmploymentStatus"
                  id="currentEmploymentStatus"
                  class="form-control"
                >
                  <option value="" disabled selected>Please select...</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="my-5">
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </div>
  </form>
</template>
<script>
export default {
  setup(props, context) {
    function onFormSubmitHandler(e) {
      const data = Object.fromEntries(new FormData(e.target).entries());
      context.emit("onClickEvent", data);
    }

    return {
      onFormSubmitHandler,
    };
  },
};
</script>
<style>
</style>