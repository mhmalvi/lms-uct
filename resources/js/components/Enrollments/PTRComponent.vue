<template>
  <form @submit.prevent="onFormSubmitHandler">
    <div class="py-5">
      <h4 class="text-center">Pre-Training Review</h4>
      <div class="py-4">
        <div class="progress">
          <div
            class="progress-bar"
            role="progressbar"
            style="width: 66.66%"
            aria-valuenow="66.66"
            aria-valuemin="0"
            aria-valuemax="100"
          >
            66.66%
          </div>
        </div>
      </div>
      <div class="py-3">
        <h5>Introduction</h5>
        <p>
          A Pre-Training Review ensures that the learning and assessment
          strategy meets your individual needs. The pre-training review ensures:
        </p>
        <ul>
          <li>Understand your objectives for undertaking this course</li>
          <li>
            Explores your current competencies and provides opportunities for
            these to be assessed through Recognition of Prior Learning (RPL),
            Recognition of Current Competency (RCC) or Credit Transfer (CT)
          </li>
        </ul>

        <div class="pt-3">
          <h5>Instructions for all Students</h5>
          <p>
            Prior to completing Pre-Training Review, make sure you have
            sufficient information about the course. In particular, you must
            have access to the following information;
          </p>
          <ul>
            <li>
              Training and Assessment arrangements i.e. duration of the course,
              training and assessment modes, days of training, assessments to be
              completed
            </li>
            <li>
              Employment prospects - You should conduct your own research and
              have strong evidence of employability options on completion of the
              course
            </li>
            <li>
              Recognition of prior learning and credit transfer application
              process
            </li>
            <li>Fees and charges applicable for the training</li>
            <li>
              Your rights and obligations as a student at
              <strong>Unique College of Technology UCT</strong> - Entry
              requirements into the course
            </li>
          </ul>
        </div>
        <div class="pt-3">
          <h5>Instructions for completing PTR</h5>
          <p>
            Please ensure each question is answered as accurately as possible.
            If you require more space to write your response to a question
            please attach a second sheet and number the responses.
          </p>
          <ul>
            <li>
              Training and Assessment arrangements i.e. duration of the course,
              training and assessment modes, days of training, assessments to be
              completed
            </li>
            <li>
              Employment prospects - You should conduct your own research and
              have strong evidence of employability options on completion of the
              course
            </li>
            <li>
              Recognition of prior learning and credit transfer application
              process
            </li>
            <li>Fees and charges applicable for the training</li>
            <li>
              Your rights and obligations as a student at
              <strong>Unique College of Technology UCT</strong> - Entry
              requirements into the course
            </li>
          </ul>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h5>Part A: Your expectations and experience</h5>
          </div>
          <div class="form-group">
            <label for="expectations"
              >What do you hope to gain from undertaking this
              qualification?</label
            >
            <textarea
              name="expectations"
              id="expectations"
              rows="5"
              class="form-control"
            ></textarea>
          </div>
        </div>
      </div>

      <div class="my-5"></div>

      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h5>Part B</h5>
          </div>
          <div class="form-group">
            <label for="position"
              >Please write a brief description of your current position.</label
            >
            <textarea
              name="position"
              id="position"
              rows="5"
              class="form-control"
            ></textarea>
          </div>
          <div class="form-group pt-3">
            <label for="employed"
              >Provide your last 3 job titles and how long you were employed in
              each position.</label
            >
            <table class="table">
              <tbody>
                <tr>
                  <td class="border-0 p-1">
                    <input
                      type="text"
                      name="employed[]"
                      class="form-control w-100"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="border-0 p-1">
                    <input
                      type="text"
                      name="employed[]"
                      class="form-control w-100"
                    />
                  </td>
                </tr>
                <tr>
                  <td class="border-0 p-1">
                    <input
                      type="text"
                      name="employed[]"
                      class="form-control w-100"
                    />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="my-5"></div>

      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label for="training1"
              >Have you acquired any formal training in any of the
              qualifications you wish to enrol into?</label
            >
            <div class="d-block">
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="training1"
                  id="radio11"
                  value="Yes"
                /><label class="form-check-label" for="radio11">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="training1"
                  id="radio12"
                  value="No"
                /><label class="form-check-label" for="radio12">No</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="trainin2">Do you wish to apply for RPL?</label>
            <div class="d-block">
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="training2"
                  id="radio21"
                  value="Yes"
                /><label class="form-check-label" for="radio21">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="training2"
                  id="radio22"
                  value="No"
                /><label class="form-check-label" for="radio22">No</label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="my-5"></div>

      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label
              >Explain why it is important to read all signs in the workplace.
            </label>
            <textarea
              class="form-control"
              name="explain_importance_of_read_signs"
              placeholder="Explain here..."
            ></textarea>
          </div>
        </div>
      </div>

      <div class="my-5"></div>

      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label
              >Following information will help us to determine, you’re learning
              and styles and if we are able to deliver courses that meet your
              learning styles.
            </label>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="support1"
                value="Power Points explained to me during classes"
                id="support11"
              /><label class="form-check-label" for="support11"
                >Power Points explained to me during classes
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="support1"
                value="Pictures and diagrams "
                id="support12"
              /><label class="form-check-label" for="support12"
                >Pictures and diagrams
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="support1"
                value="Group discussions with others "
                id="support13"
              /><label class="form-check-label" for="support13"
                >Group discussions with others
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="support1"
                value="Conducting my own research "
                id="support14"
              /><label class="form-check-label" for="support14"
                >Conducting my own research
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="support1"
                value="Listening to the lectures/ trainers "
                id="support15"
              /><label class="form-check-label" for="support15"
                >Listening to the lectures/ trainers
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="support1"
                value="Practical application of skills and knowledge in a workplace or similar or watching videos "
                id="support16"
              /><label class="form-check-label" for="support16"
                >Practical application of skills and knowledge in a workplace or
                similar or watching videos
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="support1"
                value="Working through real examples such as a case study or scenario "
                id="support17"
              /><label class="form-check-label" for="support17"
                >Working through real examples such as a case study or scenario
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                name="support1"
                id="support18"
              /><label class="form-check-label" for="support18">Other </label>
            </div>
          </div>
        </div>
      </div>

      <div class="my-5">
        <button class="btn btn-primary" type="submit">
          Save &amp; Procced to next step
        </button>
      </div>
    </div>
  </form>
</template>
<script>
import { reactive } from "vue";

export default {
  setup(props, context) {
    const formData = reactive({
      isValidForm: true,
    });

    function onFormSubmitHandler(e) {
      const items = Object.fromEntries(new FormData(e.target).entries());
      formValidate(items);

      if (formData.isValidForm) {
        context.emit("onClickEvent", items);
      }
    }

    function formValidate(items) {
      for (const item in items) {
        if (items[item] == "") {
          var el = document.createElement("span");
          el.innerText = "This field is required";
          el.classList.add("text-danger");
          var target = document.getElementById(item);
          if (target != null) {
            formData.isValidForm = false;
            target.classList.add("is-invalid");
            target.parentNode.insertBefore(el, target.nextSibling);
          }
        } else {
          formData.isValidForm = true;
        }
      }

      for (const item in items) {
        if (items[item] == "") {
          document.getElementById(item).scrollIntoView({ behavior: "smooth" });
          break;
        }
      }
    }

    return {
      onFormSubmitHandler,
    };
  },
};
</script>
<style lang="">
</style>