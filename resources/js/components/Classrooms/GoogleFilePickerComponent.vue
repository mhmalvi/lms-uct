<template>
  <div>
    <button
      class="btn btn-primary btn-sm"
      @click="driveIconClicked"
      type="button"
    >
      Upload files
    </button>
  </div>
</template>

<script>
import { reactive, emit } from "vue";

export default {
  emits: ["filesSelected"],
  setup(props, context) {
    // google picker api
    const picker = reactive({
      pickerApiLoaded: false,
      developerKey: "AIzaSyBEciWqvUJJU-d5h-fVPS17-1mFGWHNcgA",
      clientId:
        "946141516138-sfp26mpcpqknevi1ahf35o1ef4egm37n.apps.googleusercontent.com",
      scope: "https://www.googleapis.com/auth/drive.readonly",
      oauthToken: null,
    });

    let picker_instance = null;

    const driveIconClicked = async () => {
      await gapi.load("auth2", () => {
        gapi.auth2.authorize(
          {
            client_id: picker.clientId,
            scope: picker.scope,
            immediate: false,
          },
          handleAuthResult
        );
      });
      gapi.load("picker", () => {
        picker.pickerApiLoaded = true;
        createPicker();
      });
    };

    const handleAuthResult = (authResult) => {
      if (authResult && !authResult.error) {
        picker.oauthToken = authResult.access_token;
        createPicker();
      }
    };

    const createPicker = () => {
      if (picker.pickerApiLoaded && picker.oauthToken) {
        picker_instance = new google.picker.PickerBuilder()
          .enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
          .addView(google.picker.ViewId.DOCS)
          .addView(new google.picker.DocsUploadView())
          .setOAuthToken(picker.oauthToken)
          .setDeveloperKey(picker.developerKey)
          .setCallback(pickerCallback)
          .build();
        picker_instance.setVisible(true);
      }
    };

    const pickerCallback = (data) => {
      if (data[google.picker.Response.ACTION] === google.picker.Action.PICKED) {
        // Array of Picked Files
        picker_instance.setVisible(false);

        context.emit("filesSelected", data.docs);
      }
    };

    return {
      picker,
      driveIconClicked,
    };
  },
};
</script>
