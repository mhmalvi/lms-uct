<template>
  <div>
    <div class="container my-5">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <img src="/images/uct_logo.png" alt="UCT Logo" width="100" />
          <h2 class="d-flex align-items-center flex-wrap ml-3">
            Unique College of Technology UCT Pty Ltd (91358)
          </h2>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-8 mx-auto">
          <form>
            <div class="form-group row">
              <div class="col-6">
                <label for="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  placeholder="Name"
                />
              </div>
              <div class="col-6">
                <label for="date">Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="date"
                  placeholder="Date"
                />
              </div>
            </div>

            <div class="form-group">
              <label for="courses">Course/UoC</label>
              <select id="courses" class="form-control">
                <option value="">Select a course...</option>

                <option value="Course 1">Course 1</option>
                <option value="Course 2">Course 2</option>
                <option value="Course 3">Course 3</option>
              </select>
            </div>

            <div class="form-group">
              <h3 class="text-center">
                Language Literacy and Numeracy Indication
              </h3>

              <p>
                This document is designed to provide us with some idea as to
                your literacy and numeracy skills to ensure that you will be
                able to meet the English Language requirements for the First Aid
                training. All questions must be attempted.
              </p>

              <p>
                There is no pass mark, but rather the process advises us of your
                English Language and numeracy skills and knowledge, this
                provides us with an indication of the degree of support you may
                require and if we can provide this.
              </p>
            </div>

            <div class="form-group">
              <h3 class="text-center">ENGLISH LITERACY EXAM</h3>

              <p>
                Read the following passage and answers the questions from
                information in the passage.
              </p>

              <p>
                There was a little detective agency in Africa; it was at the
                foot of a large mountain. These were its assets: a tiny white
                vatwo desks, two chairs, a telephone, and an old typewriter.
                Then there was a teapot, in which the lady detective brewed
                redbush tea. There were three mugs, one for the detective, one
                for the secretary and one for a client. This agency was in a
                beautiful little town.
              </p>

              <p>
                When you walked out of the front door you could see an acacia
                tree, throne tree and the edge of the desert. As you walked down
                the front stairs onto the red gravely road an old Ford truck was
                parked in the driveway.
              </p>
            </div>

            <div class="form-group">
              <label>What country do you find the agency?</label>
              <input type="text" class="form-control" />
            </div>

            <div class="form-group">
              <label>List 5 of the assets the agency had?</label>
              <textarea class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label>Who were the mugs for?</label>
              <textarea class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label>What type of tea was brewed by the lady detective?</label>
              <textarea class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label>Name the plants you see outside the front door?</label>
              <textarea class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label
                >You have arrived at the local shopping centre and notice that
                the floor is wet however no sign has been placed in the area.
                Circle the appropriate sign that should be placed in this
                area.</label
              >

              <div class="row">
                <div class="col-4">
                  <label>
                    <input type="radio" class="input-form-check-input" />
                    <img src="/images/enrolments/1.png" alt="Option 1" />
                  </label>
                </div>

                <div class="col-4">
                  <label>
                    <input type="radio" class="input-form-check-input" />
                    <img src="/images/enrolments/2.png" alt="Option 2" />
                  </label>
                </div>

                <div class="col-4">
                  <label>
                    <input type="radio" class="input-form-check-input" />
                    <img src="/images/enrolments/3.png" alt="Option 3" />
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label
                >It is important not to use the lift in the event of a fire.
                Circle the sign that indicates this practice.</label
              >

              <div class="row">
                <div class="col-4">
                  <label>
                    <input type="radio" class="input-form-check-input" />
                    <img src="/images/enrolments/21.png" alt="Option 1" />
                  </label>
                </div>

                <div class="col-4">
                  <label>
                    <input type="radio" class="input-form-check-input" />
                    <img src="/images/enrolments/22.png" alt="Option 2" />
                  </label>
                </div>

                <div class="col-4">
                  <label>
                    <input type="radio" class="input-form-check-input" />
                    <img src="/images/enrolments/23.png" alt="Option 3" />
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>
                Explain why it is important to read all signs in the workplace.
              </label>

              <textarea class="form-control">Explain here...</textarea>
            </div>

            <h5>NUMERACY EXAM</h5>
            <div class="form-group">
              <label
                >You are earning $19 per hour. You have worked 37 hours last
                week. What is the amount prior to tax that you would expect to
                be paid?</label
              >
              <input type="text" class="form-control" placeholder="$ XX" />
            </div>

            <div class="form-group">
              <label
                >You have a 25mg tablet and you need give your client usually
                takes 75mg. How many tablets would you need to give to the
                client?</label
              >

              <input
                type="input"
                class="form-control"
                placeholder="X tablets"
              />
            </div>

            <div class="form-group">
              <label
                >You are organising a bus trip with clients today and the bus
                seats 25 clients. On your list are 37 clients. How many clients
                must you take off that list?</label
              >
              <input type="text" class="form-control" placeholder="X clients" />
            </div>

            <div class="form-group">
              <label
                >You have 4 staff and 52 clients to care for. Each staff member
                will have how many residents?</label
              >
              <input
                type="text"
                class="form-control"
                placeholder="X residents"
              />
            </div>

            <div class="form-group">
              <label
                >You have to give a client 2 Panadol; each Panadol tablet is
                500mg. How many milligrams of Panadol are you giving?</label
              >
              <input type="text" class="form-control" placeholder="X mg" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive } from "vue";

export default {
  setup() {
    const state = reactive({
      form: {},
    });
    return {
      state,
    };
  },
};
</script>
