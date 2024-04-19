// Initialize country selectize dropdown
initializeSelectize('state_id', { placeholder: "Select State" });
initializeSelectize('city_id', { placeholder: "Select City" });
// Initialize country selectize dropdown
initializeSelectize('country_id', { placeholder: "Select Country" }, CountryApiUrl, {}, 'id', 'name', selected_country_id).onchange(function (country_id) {
  // Handle onchange event for country selectize dropdown
  // Clear options of state selectize dropdown
  // Reset variables
  initializeSelectize('state_id').clearOptions().then(function () {
    // Initialize state selectize dropdown
    initializeSelectize('state_id', { placeholder: "Select State" }, StateApiUrl, { country_id: country_id }, 'id', 'name', selected_state_id).onchange(function (state_id) {
      // Handle onchange event for state selectize dropdown
      // Clear options of city selectize dropdown
      initializeSelectize('city_id').clearOptions().then(function () {
        // Initialize city selectize dropdown
        initializeSelectize('city_id', { placeholder: "Select City" }, CityApiUrl, { state_id: state_id }, 'id', 'name', selected_city_id);
        selected_country_id = null;
        selected_state_id = null;
        selected_city_id = null;
      });
    });
  });
});