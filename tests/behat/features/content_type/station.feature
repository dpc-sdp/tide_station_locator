@p1
Feature: Station content type is available and follow URL format.

  Ensure that station content type exists and the URL is following a pattern.

  @api @nosuggest
  Scenario: The station content type exists.
    Given I am logged in as a user with the "Administrator" role
    When I visit "/node/add/station"
    And save screenshot
    Then I should see text matching "Create Station"
    Then I see field "Title"
    And I should see an "input#edit-title-0-value.required" element

    Then I see field "Station code"
    And I should see an "input#edit-field-station-code-0-value" element
    And I should see an "input#edit-field-station-code-0-value.required" element

    Then I see field "Street address"
    And I should see an "input#edit-field-street-address-0-value" element
    And I should see an "input#edit-field-street-address-0-value.required" element

    Then I see field "State"
    And I should see an "input#edit-field-state-0-target-id" element
    And I should see an "input#edit-field-state-0-target-id.required" element

    Then I see field "Postcode"
    And I should see an "input#edit-field-postcode-0-value" element
    And I should see an "input#edit-field-postcode-0-value.required" element

    Then I see field "Suburb"
    And I should see an "input#edit-field-suburb-0-value" element
    And I should see an "input#edit-field-suburb-0-value.required" element

    Then I see field "Google Maps URL"
    And I should see an "input#edit-field-google-maps-url-0-uri" element
    And I should see an "input#edit-field-google-maps-url-0-uri.required" element

    Then I should see text matching "Phone"
    And I should see an "input#edit-field-phone-0-uri" element
    And I should not see an "input#edit-field-phone-0-uri.required" element
    And I should see an "input#edit-field-phone-0-title" element
    And I should not see an "input#edit-field-phone-0-title.required" element

    Then I see field "Fax"
    And I should see an "input#edit-field-fax-0-value" element
    And I should not see an "input#edit-field-fax-0-value.required" element

    Then I should see text matching "Email"
    And I should see an "input#edit-field-email-0-uri" element
    And I should see an "input#edit-field-email-0-uri.required" element
    And I should see an "input#edit-field-email-0-title" element
    And I should not see an "input#edit-field-email-0-title.required" element

    Then I see field "Opening hours"
    And I should see an "input#edit-field-opening-hours-0-value" element
    And I should see an "input#edit-field-opening-hours-0-value.required" element

    Then I see field "Opening hours notice"
    And I should see an "textarea#edit-field-opening-hours-notice-0-value" element
    And I should not see an "textarea#edit-field-opening-hours-notice-0-value.required" element

    Then I should see text matching "Prosecution Unit phone"
    And I should see an "input#edit-field-prosecution-unit-phone-0-uri" element
    And I should not see an "input#edit-field-prosecution-unit-phone-0-uri.required" element
    And I should see an "input#edit-field-prosecution-unit-phone-0-title" element
    And I should not see an "input#edit-field-prosecution-unit-phone-0-title.required" element

    Then I see field "Prosecution Unit fax"
    And I should see an "input#edit-field-prosecution-unit-fax-0-value" element
    And I should not see an "input#edit-field-prosecution-unit-fax-0-value.required" element

    Then I should see text matching "Prosecution Unit email"
    And I should see an "input#edit-field-prosecution-unit-email-0-uri" element
    And I should not see an "input#edit-field-prosecution-unit-email-0-uri.required" element
    And I should see an "input#edit-field-prosecution-unit-email-0-title" element
    And I should not see an "input#edit-field-prosecution-unit-email-0-title.required" element

    Then I see field "Prosecution Unit notice"
    And I should see an "textarea#edit-field-prosecution-unit-notice-0-value" element
    And I should not see an "textarea#edit-field-prosecution-unit-notice-0-value.required" element
    And I should see an "input#edit-field-prosecution-unit-notice-add-more" element

    Then I should see text matching "Case conference phone"
    And I should see an "input#edit-field-case-conference-phone-0-uri" element
    And I should not see an "input#edit-field-case-conference-phone-0-uri.required" element
    And I should see an "input#edit-field-case-conference-phone-0-title" element
    And I should not see an "input#edit-field-case-conference-phone-0-title.required" element

    Then I should see text matching "Case conference email"
    And I should see an "input#edit-field-case-conference-email-0-uri" element
    And I should not see an "input#edit-field-case-conference-email-0-uri.required" element
    And I should see an "input#edit-field-case-conference-email-0-title" element
    And I should not see an "input#edit-field-case-conference-email-0-title.required" element

    Then I see field "Specialty services or facilities"
    And I should see an "input#edit-field-specialty-services-or-faci-0-target-id" element
    And I should not see an "input#edit-field-specialty-services-or-faci-0-target-id.required" element
    And I should see an "input#edit-field-specialty-services-or-faci-add-more" element

    Then I see field "Accessibility"
    And I should see an "input#edit-field-accessibility-0-target-id" element
    And I should not see an "input#edit-field-accessibility-0-target-id.required" element
    And I should see an "input#edit-field-accessibility-add-more" element

    Then I should see text matching "Geolocation"
    And I should see an "input#edit-field-geolocation-0-value-lat" element
    And I should see an "input#edit-field-geolocation-0-value-lat.required" element
    And I should see an "input#edit-field-geolocation-0-value-lon" element
    And I should see an "input#edit-field-geolocation-0-value-lon.required" element

    And I should see text matching "Primary Site"
    And I should see text matching "Site"

  @api @nosuggest
  Scenario: The station URL should be /site-<site-tid>/<police-station-name> format
    Given sites terms:
      | parent          | tid   | name      |
      | 0               | 10000 | Test Site |
    Given station content:
      | title        | field_station_code | field_street_address | moderation_state | field_node_site  |
      | Test Station | code               | Dummy address        | published        | Test Site        |
    Given I am an anonymous user
    When I visit "/site-10000/test-station"
    Then I should not see text matching "Not Found"
    Then I should see text matching "Test Station"
