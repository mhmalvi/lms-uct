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
                  v-model="state.form.name"
                />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    return {}
}
</script>
